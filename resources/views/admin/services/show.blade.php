@extends('layouts.admin')
@section('content')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Section</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.form-sections.store') }}" method="POST">
                    @csrf 
                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="required" for="form_section_name">{{ trans('cruds.formSection.fields.form_section_name') }}</label>
                            <input class="form-control {{ $errors->has('form_section_name') ? 'is-invalid' : '' }}" type="text" name="form_section_name" id="form_section_name" value="{{ old('form_section_name', '') }}" required>
                            @if($errors->has('form_section_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('form_section_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.formSection.fields.form_section_name_helper') }}</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="required">{{ trans('cruds.formSection.fields.form_has_file') }}</label>
                            @foreach(App\Models\FormSection::FORM_HAS_FILE_RADIO as $key => $label)
                                <div class="form-check {{ $errors->has('form_has_file') ? 'is-invalid' : '' }}">
                                    <input required class="form-check-input" type="radio" id="form_has_file_{{ $key }}" name="form_has_file" value="{{ $key }}" {{ old('form_has_file', '') === (string) $key ? 'checked' : '' }}>
                                    <label class="form-check-label" for="form_has_file_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('form_has_file'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('form_has_file') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.formSection.fields.form_has_file_helper') }}</span>
                        </div> 
                        <div class="form-group col-md-6">
                            <label for="file_name">{{ trans('cruds.formSection.fields.file_name') }}</label>
                            <input class="form-control {{ $errors->has('file_name') ? 'is-invalid' : '' }}" type="text" name="file_name" id="file_name" value="{{ old('file_name', '') }}" required>
                            @if($errors->has('file_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('file_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.formSection.fields.file_name_helper') }}</span>
                        </div>
                    </div>
                    <div id="fields">
                        {{-- fields --}}
                    </div>
                    <button class="btn btn-info" type="button" onclick="add_field()">Add Field</button>
                    <hr>
                    <button class="btn btn-success">Save</button>
                </form>
            </div>
            
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                {{ trans('global.show') }} {{ trans('cruds.service.title') }}
            </div>
        
            <div class="card-body">
                <div class="form-group">
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('admin.services.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>
                                    {{ trans('cruds.service.fields.id') }}
                                </th>
                                <td>
                                    {{ $service->id }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.service.fields.form_section_name') }}
                                </th>
                                <td>
                                    {{ $service->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.service.fields.description') }}
                                </th>
                                <td>
                                    {{ $service->description }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('admin.services.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                {{ trans('cruds.formSection.title') }}
            </div>
            <div class="card-body">
                @includeIf('admin.services.relationships.serviceFormSections', ['formSections' => $service->serviceFormSections])
            </div>
        </div>
    </div>
</div> 
@endsection
@section('scripts')
    <script>
        var field_id = 1;
        function add_field(){ 
            console.log('test');
            var field =  '<div class="row">'; 
            field += '<div class="col-md-2">';
            field += '<button type="button" onclick="delete_this_row(this)" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>';
            field += '</div>';
            field += '<div class="col-md-10">';
            field += '<input type="text" id="fields-'+field_id+'" placeholder="field name" name="fields[]" class="form-control"/>'; 
            field += '</div>'; 
            field += '</div>'; 
            $('body #fields').append(field);

            field_id++; 
        }  
        function delete_this_row(em){
            $(em).closest('.row').remove();
        }
    </script>
@endsection