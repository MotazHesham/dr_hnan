@if ($stage_cost_1_pending_color == 'info')
    @if ($user_type == 'client')
        <div class="row">
            @if($requestService->cost_1_file)   
                <div class="col-md-4">
                    <i class="far fa-clock" style="font-size:20px;color:rgb(0, 174, 255)"></i>
                    في أنتظار مراجعة الأيصال من الأدارة  
                </div>
            @endif
            <form class="col" method="POST" action="{{ route('client.request-services.update_cost_1') }}" enctype="multipart/form-data"> 
                @csrf
                <input type="hidden" name="id" value="{{$requestService->id}}" id="">
                <div class="form-group">
                    <label for="cost_1_file" class="required">
                        {{ trans('cruds.requestService.fields.cost_1_file') }}  
                        
                        @if($requestService->cost_1_file)   
                            <a class="btn btn-warning " href="{{ $requestService->cost_1_file->getUrl() }}" target="_blank">
                                عرض الأيصال <i class="fas fa-cloud-download-alt"></i>
                            </a>
                        @endif
                    </label>
                    <div class="needsclick dropzone {{ $errors->has('cost_1_file') ? 'is-invalid' : '' }}"
                        id="cost_1_file-dropzone">
                    </div>
                    @if ($errors->has('cost_1_file'))
                        <div class="invalid-feedback">
                            {{ $errors->first('cost_1_file') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.requestService.fields.cost_1_file_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-info btn-block rounded-pill" type="submit">
                        {{ trans('global.send') }}
                    </button>
                </div>
            </form> 
        </div>
    @elseif($user_type == 'staff')
        @if($requestService->cost_1_file) 
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-warning  mb-2" href="{{ $requestService->cost_1_file->getUrl() }}" target="_blank">
                        {{ trans('cruds.requestService.fields.cost_1_file') }} <i class="fas fa-cloud-download-alt"></i>
                    </a>
                </div>
                <div class="col-md-6">
                    <form method="POST" action="{{ route('admin.request-services.update_stages') }}" enctype="multipart/form-data"> 
                        @csrf
                        <input type="hidden" name="id" value="{{$requestService->id}}">
                        <input type="hidden" name="stages" value="working">
                        <div class="form-group">
                            <label for="consultant_id" class="required">اختر المستشار لتولي مهام الخدمة </label>
                            <select class="form-control" name="consultant_id" id="consultant_id" required>
                                <option value="" disabled selected hidden>اختر المستشار</option>
                                @foreach (\App\Models\User::where('user_type','consultant')->get()->pluck('name','id') as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="review_file_1">تم مراجعة أيصال سداد الدفعة الأولي</label>
                            <input type="checkbox" name="accept" required id="review_file_1">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger btn-block rounded-pill" type="submit">
                                أرسال لمرحلة التنفيذ
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @else 
            <div>
                في أنتظار أرسال أيصال بسداد الدفعة الأولي
                <i class="far fa-clock" style="font-size:20px;color:rgb(0, 174, 255)"></i>
            </div>
        @endif
    @endif
@elseif($stage_cost_1_pending_color == 'success') 
    @if($requestService->cost_1_file)   
        <a class="btn btn-warning  mb-2" href="{{ $requestService->cost_1_file->getUrl() }}" target="_blank">
            {{ trans('cruds.requestService.fields.cost_1_file') }} <i class="fas fa-cloud-download-alt"></i>
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
        Dropzone.options.cost1FileDropzone = {
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
                $('form').find('input[name="cost_1_file"]').remove()
                $('form').append('<input type="hidden" name="cost_1_file" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="cost_1_file"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($requestService) && $requestService->cost_1_file)
                    var file = {!! json_encode($requestService->cost_1_file) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="cost_1_file" value="' + file.file_name + '">')
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
@endsection
