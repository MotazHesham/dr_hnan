<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyJoiningRequest;
use App\Http\Requests\StoreJoiningRequest;
use App\Http\Requests\UpdateJoiningRequest;
use App\Models\Joining;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class JoiningController extends Controller
{
    use MediaUploadingTrait;

    public function update_is_sent_email(Request $request){
        $joining = Joining::findOrFail($request->id);
        $joining->is_sent_email = $request->status;
        $joining->save(); 
        return 1;
    } 

    public function index(Request $request)
    {
        abort_if(Gate::denies('joining_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Joining::query()->select(sprintf('%s.*', (new Joining)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'joining_show';
                $editGate      = 'joining_edit';
                $deleteGate    = 'joining_delete';
                $crudRoutePart = 'joinings';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('phone_number', function ($row) {
                return $row->phone_number ? $row->phone_number : '';
            });
            $table->editColumn('gender', function ($row) {
                return $row->gender ? Joining::GENDER_SELECT[$row->gender] : '';
            });
            $table->editColumn('nationality', function ($row) {
                return $row->nationality ? Joining::NATIONALITY_SELECT[$row->nationality] : '';
            });
            $table->editColumn('qualification', function ($row) {
                return $row->qualification ? Joining::QUALIFICATION_SELECT[$row->qualification] : '';
            });
            $table->editColumn('experience_years', function ($row) {
                return $row->experience_years ? $row->experience_years : '';
            });
            $table->editColumn('cv', function ($row) {
                return $row->cv ? '<a href="' . $row->cv->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            }); 
            $table->editColumn('is_sent_email', function ($row) {
                return '
                <label class="c-switch c-switch-pill c-switch-success">
                    <input onchange="update_is_sent_email(this)" value="' . $row->id . '" type="checkbox" class="c-switch-input" '. ($row->is_sent_email ? "checked" : null) .' }}>
                    <span class="c-switch-slider"></span>
                </label>';
            });

            $table->rawColumns(['actions', 'placeholder', 'cv', 'is_sent_email']);

            return $table->make(true);
        }

        return view('admin.joinings.index');
    }

    public function create()
    {
        abort_if(Gate::denies('joining_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.joinings.create');
    }

    public function store(StoreJoiningRequest $request)
    {
        $joining = Joining::create($request->all());

        if ($request->input('cv', false)) {
            $joining->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $joining->id]);
        }

        return redirect()->route('admin.joinings.index');
    }

    public function edit(Joining $joining)
    {
        abort_if(Gate::denies('joining_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.joinings.edit', compact('joining'));
    }

    public function update(UpdateJoiningRequest $request, Joining $joining)
    {
        $joining->update($request->all());

        if ($request->input('cv', false)) {
            if (! $joining->cv || $request->input('cv') !== $joining->cv->file_name) {
                if ($joining->cv) {
                    $joining->cv->delete();
                }
                $joining->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
            }
        } elseif ($joining->cv) {
            $joining->cv->delete();
        }

        return redirect()->route('admin.joinings.index');
    }

    public function show(Joining $joining)
    {
        abort_if(Gate::denies('joining_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.joinings.show', compact('joining'));
    }

    public function destroy(Joining $joining)
    {
        abort_if(Gate::denies('joining_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $joining->delete();

        return back();
    }

    public function massDestroy(MassDestroyJoiningRequest $request)
    {
        $joinings = Joining::find(request('ids'));

        foreach ($joinings as $joining) {
            $joining->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('joining_create') && Gate::denies('joining_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Joining();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
