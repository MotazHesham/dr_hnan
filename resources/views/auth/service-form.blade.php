<div class="modal-content" style="direction: rtl;">
    <div class="modal-header"> 
        <h5>{{ $service->name ?? '' }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
    </div>
    <div class="modal-body"> 
        @foreach($formSections as $formSection)
            <h5 class="mb-4 text-center">{{ $formSection->form_section_name }}</h5>
            <div class="row"> 
                @foreach(json_decode($formSection->fields) as $key => $field)
                    <div class="form-group col-md-4">
                        <label>{{ $field }}</label>
                        <input class="form-control" type="text" name="fields[{{$field}}]"> 
                    </div>
                @endforeach
                @if($formSection->form_has_file == 'yes')
                    <div class="form-group col-md-4">
                        <label>{{ $formSection->file_name }}</label>
                        <input class="form-control" type="file" name="form_files[{{$formSection->file_name}}]"> 
                    </div>
                @endif
            </div>
            <hr>
        @endforeach 
        <div class="form-group">
            <button class="btn btn-success btn-block" type="submit">
                طلب الخدمة
            </button>
        </div>  
    </div>
</div>