<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySampleRequest;
use App\Http\Requests\StoreSampleRequest;
use App\Http\Requests\UpdateSampleRequest;
use App\Models\Sample;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SamplesController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('sample_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Sample::query()->select(sprintf('%s.*', (new Sample)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'sample_show';
                $editGate      = 'sample_edit';
                $deleteGate    = 'sample_delete';
                $crudRoutePart = 'samples';

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
            $table->editColumn('file', function ($row) {
                return $row->file ? '<a href="' . $row->file->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('active', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->active ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'file', 'active']);

            return $table->make(true);
        }

        return view('admin.samples.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sample_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.samples.create');
    }

    public function store(StoreSampleRequest $request)
    {
        $sample = Sample::create($request->all());

        if ($request->input('file', false)) {
            $sample->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $sample->id]);
        }

        return redirect()->route('admin.samples.index');
    }

    public function edit(Sample $sample)
    {
        abort_if(Gate::denies('sample_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.samples.edit', compact('sample'));
    }

    public function update(UpdateSampleRequest $request, Sample $sample)
    {
        $sample->update($request->all());

        if ($request->input('file', false)) {
            if (! $sample->file || $request->input('file') !== $sample->file->file_name) {
                if ($sample->file) {
                    $sample->file->delete();
                }
                $sample->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
            }
        } elseif ($sample->file) {
            $sample->file->delete();
        }

        return redirect()->route('admin.samples.index');
    }

    public function show(Sample $sample)
    {
        abort_if(Gate::denies('sample_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.samples.show', compact('sample'));
    }

    public function destroy(Sample $sample)
    {
        abort_if(Gate::denies('sample_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sample->delete();

        return back();
    }

    public function massDestroy(MassDestroySampleRequest $request)
    {
        $samples = Sample::find(request('ids'));

        foreach ($samples as $sample) {
            $sample->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('sample_create') && Gate::denies('sample_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Sample();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
