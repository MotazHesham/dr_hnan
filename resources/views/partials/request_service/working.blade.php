@if ($stage_working_color == 'info' || $stage_working_color == 'success')

    @if ($stage_delivered_color == 'info' || $stage_delivered_color == 'success')
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#finished_files_from_admin">
            {{ trans('cruds.requestService.fields.finished_files_from_admin') }}
        </button>
        @if ($user_type == 'staff' && $stage_done_color != 'success')
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#certificate_files">
                أنهاء العمل وأرسال شهادة الأنجاز
            </button>
        @endif
        <!-- Modal -->
        <div class="modal fade" id="certificate_files" tabindex="-1" role="dialog"
            aria-labelledby="certificate_filesLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="certificate_filesLabel">شهادة الأنجاز</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form method="POST" action="{{ route('admin.request-services.update_stages') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $requestService->id }}">
                            <input type="hidden" name="stages" value="done">
                            <div class="form-group">
                                <label class="required" for="certificates">شهادة الأنجاز</label>
                                <div class="needsclick dropzone {{ $errors->has('certificates') ? 'is-invalid' : '' }}"
                                    id="certificates-dropzone">
                                </div>
                                @if ($errors->has('certificates'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('certificates') }}
                                    </div>
                                @endif 
                            </div>
                            <div class="form-group">
                                <label for="review_file_2">تم الأنتهاء من فترة التعديل</label>
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
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="finished_files_from_admin" tabindex="-1" role="dialog"
            aria-labelledby="finished_files_from_adminLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="finished_files_from_adminLabel">الأنتهاء من العمل</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @foreach ($requestService->finished_files_from_admin as $key => $media)
                            <a href="{{ $media->getUrl() }}" target="_blank" class="btn btn-light">
                                {{ $media->file_name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($user_type == 'consultant' && $requestService->done_time == null)

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#finish_work">
            الأنتهاء من العمل
        </button>

        <!-- Modal -->
        <div class="modal fade" id="finish_work" tabindex="-1" role="dialog" aria-labelledby="finish_workLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="finish_workLabel">الأنتهاء من العمل</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('consultant.request-services.update_stages') }}"
                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
                            @csrf
                            <input type="hidden" name="id" value="{{ $requestService->id }}">
                            <input type="hidden" name="stages" value="cost_2_pending">
                            <div class="form-group">
                                <label class="required"
                                    for="finished_files">{{ trans('cruds.requestService.fields.finished_files') }}</label>
                                <div class="needsclick dropzone {{ $errors->has('finished_files') ? 'is-invalid' : '' }}"
                                    id="finished_files-dropzone">
                                </div>
                                @if ($errors->has('finished_files'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('finished_files') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.requestService.fields.finished_files_helper') }}</span>
                            </div>
                            <button type="submit" class="btn btn-danger">الأرسال</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($user_type != 'staff' && $stage_done_color != 'success')
        <div class="type-message" style="margin:15px 0">
            <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data"
                id="store-comment">
                @csrf
                <input type="hidden" name="request_service_id" value="{{ $requestService->id }}">
                <div style="display: flex;">
                    <input type="text" name="comment" id="comment" class="form-control"
                        placeholder="Type a message" />
                    <button class="btn btn-light" type="button" onclick="toggle_dropfiles()">
                        <i class="fas fa-link" aria-hidden="true"></i>
                    </button>
                    <button class="btn btn-info" type="submit">
                        <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="form-group hide-dropzone" id="message-files">
                    <div style="display: flex; justify-content: center;">
                        <div class="spinner-border text-primary" role="status" id="upload-files-spinner"
                            style="display: none">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <div class="needsclick dropzone {{ $errors->has('files') ? 'is-invalid' : '' }}"
                        id="files-dropzone" style="padding:0px;min-height:100px">
                    </div>
                </div>
            </form>

        </div>
    @endif
@endif
<div class="message-box">
    <div class="messages">
        @foreach (\App\Models\Comment::with('user')->where('request_service_id', $requestService->id)->orderBy('created_at', 'desc')->get() as $comment)
            <div
                class="     @if ($user_type == 'staff') 
                                @if ($comment->user_id == $requestService->consultant_id)
                                    outgoing_msg_extra 
                                @else 
                                    incoming_msg 
                                @endif
                            @else
                                @if ($comment->user_id != Auth::id()) 
                                    incoming_msg 
                                @else 
                                    outgoing_msg 
                                @endif
                            @endif">
                <div>
                    <b>{{ $comment->user ? $comment->user->name : '' }}</b>
                    <p>
                        <?php echo $comment->comment; ?>
                        @if (count($comment->files))
                            <div>
                                @foreach ($comment->files as $key => $media)
                                    @if ($media->mime_type == 'image/jpeg')
                                        <a href="{{ $media->getUrl() }}" target="_blank">
                                            <img src="{{ $media->getUrl('preview') }}" style="border-radius: 15px;"
                                                alt="">
                                        </a>
                                    @else
                                        <div style="margin:5px">
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ substr($media->file_name, strpos($media->file_name, '_') + 1) }}
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>

@section('scripts')
    @parent
    <script>
        function toggle_dropfiles() {
            $('#message-files').toggleClass('hide-dropzone');
        }

        var uploadedFinishedFilesMap = {}
        Dropzone.options.finishedFilesDropzone = {
            url: '{{ route('consultant.request-services.storeMedia') }}',
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="finished_files[]" value="' + response.name + '">')
                uploadedFinishedFilesMap[file.name] = response.name
            },
            removedfile: function(file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedFinishedFilesMap[file.name]
                }
                $('form').find('input[name="finished_files[]"][value="' + name + '"]').remove()
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

        var uploadedFilesMap = {}
        Dropzone.options.filesDropzone = {
            url: '{{ route('comments.storeMedia') }}',
            maxFilesize: 5, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="files[]" value="' + response.name + '">')
                uploadedFilesMap[file.name] = response.name
            },
            removedfile: function(file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedFilesMap[file.name]
                }
                $('form').find('input[name="files[]"][value="' + name + '"]').remove()
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
        var uploadedCertificatesMap = {}
        Dropzone.options.certificatesDropzone = {
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
                $('form').append('<input type="hidden" name="certificates[]" value="' + response.name + '">')
                uploadedCertificatesMap[file.name] = response.name
            },
            removedfile: function(file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedCertificatesMap[file.name]
                }
                $('form').find('input[name="certificates[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($requestService) && $requestService->certificates)
                    var files =
                        {!! json_encode($requestService->certificates) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="certificates[]" value="' + file.file_name +
                            '">')
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
