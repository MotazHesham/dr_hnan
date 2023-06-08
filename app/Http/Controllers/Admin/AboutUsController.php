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

    public function edit(AboutUs $aboutUs)
    {
        abort_if(Gate::denies('about_us_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.aboutUss.edit', compact('aboutUs'));
    }

    public function update(UpdateAboutUsRequest $request, AboutUs $aboutUs)
    {
        $aboutUs->update($request->all());

        if ($request->input('logo', false)) {
            if (! $aboutUs->logo || $request->input('logo') !== $aboutUs->logo->file_name) {
                if ($aboutUs->logo) {
                    $aboutUs->logo->delete();
                }
                $aboutUs->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($aboutUs->logo) {
            $aboutUs->logo->delete();
        }

        if ($request->input('cv', false)) {
            if (! $aboutUs->cv || $request->input('cv') !== $aboutUs->cv->file_name) {
                if ($aboutUs->cv) {
                    $aboutUs->cv->delete();
                }
                $aboutUs->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
            }
        } elseif ($aboutUs->cv) {
            $aboutUs->cv->delete();
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
