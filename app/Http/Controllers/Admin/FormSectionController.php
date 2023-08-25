<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFormSectionRequest;
use App\Http\Requests\StoreFormSectionRequest;
use App\Http\Requests\UpdateFormSectionRequest;
use App\Models\FormSection;
use App\Models\Service;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FormSectionController extends Controller
{
    public function index()
    { 
        $formSections = FormSection::with(['service'])->get();

        return view('admin.formSections.index', compact('formSections'));
    }

    public function create()
    { 

        $services = Service::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.formSections.create', compact('services'));
    }

    public function store(StoreFormSectionRequest $request)
    {
        $validatedrequest = $request->all();
        $validatedrequest['fields'] = json_encode($request->fields);
        $formSection = FormSection::create($validatedrequest);

        return redirect()->route('admin.services.show',$formSection->service_id);
    }

    public function editAjax(Request $request)
    {  
        $formSection = FormSection::findOrFail($request->id);
        $formSection->load('service');

        return view('admin.services.relationships.editFormSection', compact('formSection'));
    }

    public function form(Request $request)
    {  
        $service = Service::findOrFail($request->service_id);
        $formSections = FormSection::where('service_id',$request->service_id)->get(); 
        return view('auth.service-form', compact('formSections','service'));
    }

    public function update(UpdateFormSectionRequest $request, FormSection $formSection)
    {
        $validatedrequest = $request->all();
        $fields = array(); 
        if($request->has('prev_fields')){ 
            foreach($request->prev_fields as $raw){
                $fields[] = $raw;
            }
        }
        if($request->has('fields')){ 
            foreach($request->fields as $raw2){
                $fields[] = $raw2;
            }
        }
        $validatedrequest['fields'] = json_encode($fields);
        $formSection->update($validatedrequest);

        return redirect()->route('admin.services.show',$formSection->service_id);
    }

    public function show(FormSection $formSection)
    { 

        $formSection->load('service');

        return view('admin.formSections.show', compact('formSection'));
    }

    public function destroy(FormSection $formSection)
    { 

        $formSection->delete();

        return back();
    }

    public function massDestroy(MassDestroyFormSectionRequest $request)
    {
        $formSections = FormSection::find(request('ids'));

        foreach ($formSections as $formSection) {
            $formSection->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}