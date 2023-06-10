<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdateAboutUsRequest;
use App\Models\AboutUs;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AboutUsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('about_us_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $aboutUss = AboutUs::with(['media'])->get(); 
        return view('admin.aboutUss.index', compact('aboutUss'));
    }

    public function edit(AboutUs $aboutUss)
    {
        abort_if(Gate::denies('about_us_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden'); 
        return view('admin.aboutUss.edit', compact('aboutUss'));
    }

    public function update(UpdateAboutUsRequest $request, AboutUs $aboutUss)
    {
        $aboutUss->update($request->all());

        if ($request->input('logo', false)) {
            if (! $aboutUss->logo || $request->input('logo') !== $aboutUss->logo->file_name) {
                if ($aboutUss->logo) {
                    $aboutUss->logo->delete();
                }
                $aboutUss->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($aboutUss->logo) {
            $aboutUss->logo->delete();
        }

        if ($request->input('cv', false)) {
            if (! $aboutUss->cv || $request->input('cv') !== $aboutUss->cv->file_name) {
                if ($aboutUss->cv) {
                    $aboutUss->cv->delete();
                }
                $aboutUss->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
            }
        } elseif ($aboutUss->cv) {
            $aboutUss->cv->delete();
        }

        return redirect()->route('admin.about-uss.index');
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('about_us_create') && Gate::denies('about_us_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AboutUs();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
