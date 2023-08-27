<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="AjaxModalLabel">Edit From Section</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form method="POST" action="{{ route('admin.form-sections.update', [$formSection->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="form_section_name">{{ trans('cruds.formSection.fields.form_section_name') }}</label>
                    <input class="form-control {{ $errors->has('form_section_name') ? 'is-invalid' : '' }}" type="text"
                        name="form_section_name" id="form_section_name"
                        value="{{ old('form_section_name', $formSection->form_section_name) }}">
                    @if ($errors->has('form_section_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('form_section_name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.formSection.fields.form_section_name_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label>{{ trans('cruds.formSection.fields.form_has_file') }}</label>
                    @foreach (App\Models\FormSection::FORM_HAS_FILE_RADIO as $key => $label)
                        <div class="form-check {{ $errors->has('form_has_file') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="form_has_file_{{ $key }}"
                                name="form_has_file" value="{{ $key }}"
                                {{ old('form_has_file', $formSection->form_has_file) === (string) $key ? 'checked' : '' }}>
                            <label class="form-check-label" for="form_has_file_{{ $key }}">{{ $label }}</label>
                        </div>
                    @endforeach
                    @if ($errors->has('form_has_file'))
                        <div class="invalid-feedback">
                            {{ $errors->first('form_has_file') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.formSection.fields.form_has_file_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="file_name">{{ trans('cruds.formSection.fields.file_name') }}</label>
                    <input class="form-control {{ $errors->has('file_name') ? 'is-invalid' : '' }}" type="text" name="file_name"
                        id="file_name" value="{{ old('file_name', $formSection->file_name) }}">
                    @if ($errors->has('file_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('file_name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.formSection.fields.file_name_helper') }}</span>
                </div>  
                <div class="form-group col-md-12">
                    <div id="fields">
                        @if($formSection->fields != null )
                            @foreach(json_decode($formSection->fields) as $key => $field)
                                <div class="row">
                                    <div class="col-md-2">
                                        <button type="button" onclick="delete_this_row(this)" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" id="fields-{{ $key }}" placeholder="field name" name="prev_fields[]" value="{{ $field }}" class="form-control"/>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <button class="btn btn-info" type="button" onclick="add_field()">Add Field</button>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form> 
    </div>
</div>