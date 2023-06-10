@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.joining.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.joinings.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.joining.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        id="name" value="{{ old('name', '') }}" required>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.joining.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="email">{{ trans('cruds.joining.fields.email') }}</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                        name="email" id="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.joining.fields.email_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="phone_number">{{ trans('cruds.joining.fields.phone_number') }}</label>
                    <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text"
                        name="phone_number" id="phone_number" value="{{ old('phone_number', '') }}" required>
                    @if ($errors->has('phone_number'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone_number') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.joining.fields.phone_number_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required">{{ trans('cruds.joining.fields.gender') }}</label>
                    <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender"
                        id="gender" required>
                        <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>
                            {{ trans('global.pleaseSelect') }}</option>
                        @foreach (App\Models\Joining::GENDER_SELECT as $key => $label)
                            <option value="{{ $key }}"
                                {{ old('gender', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('gender'))
                        <div class="invalid-feedback">
                            {{ $errors->first('gender') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.joining.fields.gender_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required">{{ trans('cruds.joining.fields.nationality') }}</label>
                    <select class="form-control {{ $errors->has('nationality') ? 'is-invalid' : '' }}" name="nationality"
                        id="nationality" required>
                        <option value disabled {{ old('nationality', null) === null ? 'selected' : '' }}>
                            {{ trans('global.pleaseSelect') }}</option>
                        @foreach (App\Models\Joining::NATIONALITY_SELECT as $key => $label)
                            <option value="{{ $key }}"
                                {{ old('nationality', '') === (string) $key ? 'selected' : '' }}>{{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('nationality'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nationality') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.joining.fields.nationality_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required">{{ trans('cruds.joining.fields.qualification') }}</label>
                    <select class="form-control {{ $errors->has('qualification') ? 'is-invalid' : '' }}"
                        name="qualification" id="qualification" required>
                        <option value disabled {{ old('qualification', null) === null ? 'selected' : '' }}>
                            {{ trans('global.pleaseSelect') }}</option>
                        @foreach (App\Models\Joining::QUALIFICATION_SELECT as $key => $label)
                            <option value="{{ $key }}"
                                {{ old('qualification', '') === (string) $key ? 'selected' : '' }}>{{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('qualification'))
                        <div class="invalid-feedback">
                            {{ $errors->first('qualification') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.joining.fields.qualification_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required"
                        for="experience_years">{{ trans('cruds.joining.fields.experience_years') }}</label>
                    <input class="form-control {{ $errors->has('experience_years') ? 'is-invalid' : '' }}" type="number"
                        name="experience_years" id="experience_years" value="{{ old('experience_years', '') }}"
                        step="1" required>
                    @if ($errors->has('experience_years'))
                        <div class="invalid-feedback">
                            {{ $errors->first('experience_years') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.joining.fields.experience_years_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="cv">{{ trans('cruds.joining.fields.cv') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('cv') ? 'is-invalid' : '' }}" id="cv-dropzone">
                    </div>
                    @if ($errors->has('cv'))
                        <div class="invalid-feedback">
                            {{ $errors->first('cv') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.joining.fields.cv_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        Dropzone.options.cvDropzone = {
            url: '{{ route('admin.joinings.storeMedia') }}',
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
                $('form').find('input[name="cv"]').remove()
                $('form').append('<input type="hidden" name="cv" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="cv"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($joining) && $joining->cv)
                    var file = {!! json_encode($joining->cv) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="cv" value="' + file.file_name + '">')
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
