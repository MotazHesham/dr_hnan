@if ($stage_working_color == 'info')

    @if($user_type == 'consultant' && $requestService->done_time == null)
        <form method="POST" action="{{ route('consultant.request-services.update_stages') }}" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"> 
            @csrf
            <input type="hidden" name="id" value="{{$requestService->id}}">
            <input type="hidden" name="stages" value="cost_2_pending">
            <button class="btn btn-danger rounded-pill" type="submit"  >الأنتهاء من العمل</button>
        </form>
    @endif 

    @if($user_type != 'staff')
    <div class="type-message" style="margin:15px 0">
        <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data" id="store-comment">
            @csrf
            <input type="hidden" name="request_service_id" value="{{ $requestService->id }}">
            <div style="display: flex;">
                <input type="text" name="comment" id="comment" class="form-control" placeholder="Type a message"/>
                <button class="btn btn-light" type="button" onclick="toggle_dropfiles()">
                    <i class="fas fa-link" aria-hidden="true"></i>
                </button>
                <button class="btn btn-info" type="submit">
                    <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                </button>
            </div>
            <div class="form-group hide-dropzone" id="message-files"> 
                <div style="display: flex; justify-content: center;">
                    <div class="spinner-border text-primary" role="status" id="upload-files-spinner" style="display: none">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <div class="needsclick dropzone {{ $errors->has('files') ? 'is-invalid' : '' }}" id="files-dropzone" style="padding:0px;min-height:100px">
                </div> 
            </div>
        </form>

    </div>
    @endif
@endif
<div class="message-box">
    <div class="messages">
        @foreach (\App\Models\Comment::with('user')->where('request_service_id', $requestService->id)->orderBy('created_at', 'desc')->get() as $comment)
            <div class="@if($user_type == 'staff')
                            @if($comment->user_id == $requestService->consultant_id)
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
                        @if(count($comment->files))
                            <div>
                                @foreach($comment->files as $key => $media)
                                    @if($media->mime_type == 'image/jpeg')
                                        <a href="{{ $media->getUrl() }}" target="_blank">
                                            <img src="{{ $media->getUrl('preview') }}" style="border-radius: 15px;" alt="">
                                        </a>
                                    @else
                                        <div style="margin:5px">
                                            <a href="{{ $media->getUrl() }}" target="_blank"> 
                                                {{ substr($media->file_name, strpos($media->file_name, "_") + 1) }}  
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
        function toggle_dropfiles(){ 
            $('#message-files').toggleClass('hide-dropzone'); 
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
@endsection
