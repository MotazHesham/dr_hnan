@if ($stage_cost_2_pending_color == 'info')
    @if ($user_type == 'client')
        <div class="row">
            @if ($requestService->cost_2_file)
                <div class="col-md-4">
                    <i class="far fa-clock" style="font-size:20px;color:rgb(0, 174, 255)"></i>
                    في أنتظار مراجعة الأيصال من الأدارة
                </div>
            @endif
            <form class="col" method="POST" action="{{ route('client.request-services.update_cost_2') }}"
                enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{ $requestService->id }}" id="">
                @csrf
                <div class="form-group">
                    <label for="cost_2_file" class="required">
                        @if ($requestService->cost_2_file)
                            <a class="btn btn-warning " href="{{ $requestService->cost_2_file->getUrl() }}"
                                target="_blank">
                                عرض الأيصال <i class="fas fa-cloud-download-alt"></i>
                            </a>
                        @else
                            تم الأنتهاء من العمل وفي أنتظار
                        @endif

                        {{ trans('cruds.requestService.fields.cost_2_file') }}

                    </label>
                    <div class="needsclick dropzone {{ $errors->has('cost_2_file') ? 'is-invalid' : '' }}"
                        id="cost_2_file-dropzone">
                    </div>
                    @if ($errors->has('cost_2_file'))
                        <div class="invalid-feedback">
                            {{ $errors->first('cost_2_file') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.requestService.fields.cost_2_file_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-info btn-block rounded-pill" type="submit">
                        {{ trans('global.send') }}
                    </button>
                </div>
            </form>
        </div>
    @elseif($user_type == 'staff')
        <div class="card">
            <div class="card-header">{{ trans('cruds.requestService.fields.finished_files') }}</div>
            <div class="card-body">
                <div class=" mb-4">
                    @foreach ($requestService->finished_files as $key => $media)
                        <a href="{{ $media->getUrl() }}" target="_blank" class="btn btn-light">
                            {{ $media->file_name }}
                        </a>
                    @endforeach
                </div> 
            </div>
        </div>
        @if ($requestService->cost_2_file)
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-warning  mb-2" href="{{ $requestService->cost_2_file->getUrl() }}"
                        target="_blank">
                        {{ trans('cruds.requestService.fields.cost_2_file') }} <i
                            class="fas fa-cloud-download-alt"></i>
                    </a>
                </div>
                <div class="col-md-6">
                    <form method="POST" action="{{ route('admin.request-services.update_stages') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $requestService->id }}">
                        <input type="hidden" name="stages" value="delivered">
                        <div class="form-group">
                            <label class="required"
                                for="finished_files_from_admin">{{ trans('cruds.requestService.fields.finished_files_from_admin') }}</label>
                            <div class="needsclick dropzone {{ $errors->has('finished_files_from_admin') ? 'is-invalid' : '' }}"
                                id="finished_files_from_admin-dropzone">
                            </div>
                            @if ($errors->has('finished_files_from_admin'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('finished_files_from_admin') }}
                                </div>
                            @endif
                            <span
                                class="help-block">{{ trans('cruds.requestService.fields.finished_files_from_admin_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="review_file_2">تم مراجعة أيصال سداد الدفعة الثانية</label>
                            <input type="checkbox" name="accept" required id="review_file_2">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger btn-block rounded-pill" type="submit">
                                {{ trans('global.send') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div>
                تم الأنتهاء من العمل وفي أنتظار أرسال أيصال بسداد الدفعة الثانية
                <i class="far fa-clock" style="font-size:20px;color:rgb(0, 174, 255)"></i>
            </div>
        @endif
    @elseif($user_type == 'consultant')
        @if ($requestService->cost_2_file)
            <div>
                يتم مراجعة التحويل من الأدارة
                <i class="far fa-clock" style="font-size:20px;color:rgb(0, 174, 255)"></i>
            </div>
        @else
            <div>
                تم الأنتهاء من العمل وفي أنتظار أرسال أيصال بسداد الدفعة الثانية
                <i class="far fa-clock" style="font-size:20px;color:rgb(0, 174, 255)"></i>
            </div>
        @endif
    @endif
@elseif($stage_cost_2_pending_color == 'success')
    @if ($requestService->cost_2_file)
        <a class="btn btn-warning  mb-2" href="{{ $requestService->cost_2_file->getUrl() }}" target="_blank">
            {{ trans('cruds.requestService.fields.cost_2_file') }} <i class="fas fa-cloud-download-alt"></i>
        </a>
    @endif
    <div>
        تم المراجعة من قبل الأدارة
        <i class="far fa-check-circle " style="font-size:20px;color:green"></i>
    </div>
@endif


@section('scripts')
    @parent
    <script>
        Dropzone.options.cost2FileDropzone = {
            url: '{{ route('client.request-services.storeMedia') }}',
            maxFilesize: 2, // MB
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2
            },
            success: function(file, response) {
                $('form').find('input[name="cost_2_file"]').remove()
                $('form').append('<input type="hidden" name="cost_2_file" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="cost_2_file"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($requestService) && $requestService->cost_2_file)
                    var file = {!! json_encode($requestService->cost_2_file) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="cost_2_file" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>

    <script>
        var uploadedFinishedFilesFromAdminMap = {}
        Dropzone.options.finishedFilesFromAdminDropzone = {
            url: '{{ route('admin.request-services.storeMedia') }}',
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="finished_files_from_admin[]" value="' + response.name +
                    '">')
                uploadedFinishedFilesFromAdminMap[file.name] = response.name
            },
            removedfile: function(file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedFinishedFilesFromAdminMap[file.name]
                }
                $('form').find('input[name="finished_files_from_admin[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($requestService) && $requestService->finished_files_from_admin)
                    var files =
                        {!! json_encode($requestService->finished_files_from_admin) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="finished_files_from_admin[]" value="' + file
                            .file_name + '">')
                    }
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection
