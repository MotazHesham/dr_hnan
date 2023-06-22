<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyConsultantRequest;
use App\Http\Requests\StoreConsultantRequest;
use App\Http\Requests\UpdateConsultantRequest;
use App\Models\Consultant;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ConsultantsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('consultant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $consultants = Consultant::with(['media'])->get();

        return view('admin.consultants.index', compact('consultants'));
    }

    public function create()
    {
        abort_if(Gate::denies('consultant_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.consultants.create');
    }

    public function store(StoreConsultantRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => bcrypt($request->password),
            'user_type' => 'consultant',
        ]);

        $consultant = Consultant::create([
            'short_description' => $request->short_description,
            'description' => $request->description,
            'user_id' => $user->id
        ]);

        if ($request->input('photo', false)) {
            $consultant->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $consultant->id]);
        }

        return redirect()->route('admin.consultants.index');
    }

    public function edit(Consultant $consultant)
    {
        abort_if(Gate::denies('consultant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.consultants.edit', compact('consultant'));
    }

    public function update(UpdateConsultantRequest $request, Consultant $consultant)
    {
        $consultant->update([
            'short_description' => $request->short_description,
            'description' => $request->description,
        ]);

        if ($request->input('photo', false)) {
            if (! $consultant->photo || $request->input('photo') !== $consultant->photo->file_name) {
                if ($consultant->photo) {
                    $consultant->photo->delete();
                }
                $consultant->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($consultant->photo) {
            $consultant->photo->delete();
        }

        $user = User::find($request->user_id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password == null ? $user->password : bcrypt($request->password), 
            'phone_number' => $request->phone_number,  
        ]);

        return redirect()->route('admin.consultants.index');
    }

    public function show(Consultant $consultant)
    {
        abort_if(Gate::denies('consultant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.consultants.show', compact('consultant'));
    }

    public function destroy(Consultant $consultant)
    {
        abort_if(Gate::denies('consultant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $consultant->delete();

        return back();
    }

    public function massDestroy(MassDestroyConsultantRequest $request)
    {
        $consultants = Consultant::find(request('ids'));

        foreach ($consultants as $consultant) {
            $consultant->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('consultant_create') && Gate::denies('consultant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Consultant();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
