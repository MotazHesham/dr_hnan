@if ($requestService->contract)
    <a class="btn btn-warning btn-lg mb-2" href="{{ $requestService->contract->getUrl() }}" target="_blank">
        تحميل العقد <i class="fas fa-cloud-download-alt"></i>
    </a>
    @if ($requestService->contract_accept)
        <div>
            تم الموافقة من قبل العميل
            <i class="far fa-check-circle " style="font-size:20px;color:green"></i>
        </div>
    @else
        @if ($user_type == 'client')
            <form method="GET" action="{{ route('client.request-services.confirm_contract', $requestService->id) }}">
                <div class="row">
                    <div class="col-md-6">
                        <label>{{ trans('cruds.requestService.fields.start_date') }}</label>
                        <input type="text" class="form-control" disabled value="{{ $requestService->start_date }}">
                    </div>
                    <div class="col-md-6">
                        <label>{{ trans('cruds.requestService.fields.end_date') }}</label>
                        <input type="text" class="form-control" disabled value="{{ $requestService->end_date }}">
                    </div>
                    <div class="col-md-6">
                        <label>{{ trans('cruds.requestService.fields.cost_1') }}</label>
                        <input type="text" class="form-control" disabled value="{{ $requestService->cost_1 }}">
                    </div>
                    <div class="col-md-6">
                        <label>{{ trans('cruds.requestService.fields.cost_2') }}</label>
                        <input type="text" class="form-control" disabled value="{{ $requestService->cost_2 }}">
                    </div>
                </div>
                <div class="mt-2">
                    <div class="form-group">
                        <label for="accept">أوافق علي كل بنود العقد والشروط والأحكام</label>
                        <input type="checkbox" name="accept" required id="accept">
                    </div>
                    <button class="btn rounded-pill  btn-info btn-block"  type="submit">
                        الموافقة علي العقد
                    </button>
                </div>
            </div>
        @elseif($user_type == 'staff')
            <div>
                في أنتظار موافقة العميل
                <i class="far fa-clock" style="font-size:20px;color:rgb(0, 174, 255)"></i>
            </div>
        @endif
    @endif
@else
    @if ($user_type == 'staff')
        <h5 class="mb-4">أرسال العقد للعميل</h5>
        <form method="POST" action="{{ route('admin.request-services.update', [$requestService->id]) }}"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">

                <div class="form-group col-md-6">
                    <label class="required" for="cost_1">{{ trans('cruds.requestService.fields.cost_1') }}</label>
                    <input class="form-control {{ $errors->has('cost_1') ? 'is-invalid' : '' }}" type="number"
                        name="cost_1" id="cost_1" value="{{ old('cost_1', '') }}" required>
                    @if ($errors->has('cost_1'))
                        <div class="invalid-feedback">
                            {{ $errors->first('cost_1') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.requestService.fields.cost_1_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="cost_2">{{ trans('cruds.requestService.fields.cost_2') }}</label>
                    <input class="form-control {{ $errors->has('cost_2') ? 'is-invalid' : '' }}" type="number"
                        name="cost_2" id="cost_2" value="{{ old('cost_2', '') }}" required>
                    @if ($errors->has('cost_2'))
                        <div class="invalid-feedback">
                            {{ $errors->first('cost_2') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.requestService.fields.cost_2_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label class="required"
                        for="start_date">{{ trans('cruds.requestService.fields.start_date') }}</label>
                    <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}"
                        type="text" name="start_date" id="start_date" value="{{ old('start_date', '') }}" required>
                    @if ($errors->has('start_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('start_date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.requestService.fields.start_date_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="end_date">{{ trans('cruds.requestService.fields.end_date') }}</label>
                    <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text"
                        name="end_date" id="end_date" value="{{ old('end_date', '') }}" required>
                    @if ($errors->has('end_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('end_date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.requestService.fields.end_date_helper') }}</span>
                </div>
            </div>
            <div class="form-group">
                <label class="required" for="contract">{{ trans('cruds.requestService.fields.contract') }}</label>
                <div class="needsclick dropzone {{ $errors->has('contract') ? 'is-invalid' : '' }}"
                    id="contract-dropzone">
                </div>
                @if ($errors->has('contract'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contract') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.requestService.fields.contract_helper') }}</span>
            </div>
            <div class="form-group"> 
                <button class="btn btn-info btn-block rounded-pill" type="submit">
                    {{ trans('global.send') }}
                </button>
            </div>
        </form>
    @elseif($user_type == 'client')
        في أنتظار أرسال العقد
        <i class="far fa-clock" style="font-size:20px;color:rgb(0, 174, 255)"></i>
    @endif
@endif


@section('scripts')
    @parent
    <script>
        Dropzone.options.contractDropzone = {
            url: '{{ route('admin.request-services.storeMedia') }}',
            maxFilesize: 5, // MB
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5
            },
            success: function(file, response) {
                $('form').find('input[name="contract"]').remove()
                $('form').append('<input type="hidden" name="contract" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="contract"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($requestService) && $requestService->contract)
                    var file = {!! json_encode($requestService->contract) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="contract" value="' + file.file_name + '">')
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
