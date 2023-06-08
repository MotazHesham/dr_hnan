@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.quotation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.quotations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="the_company">{{ trans('cruds.quotation.fields.the_company') }}</label>
                <input class="form-control {{ $errors->has('the_company') ? 'is-invalid' : '' }}" type="text" name="the_company" id="the_company" value="{{ old('the_company', '') }}" required>
                @if($errors->has('the_company'))
                    <div class="invalid-feedback">
                        {{ $errors->first('the_company') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quotation.fields.the_company_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.quotation.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quotation.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.quotation.fields.position') }}</label>
                <select class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" name="position" id="position" required>
                    <option value disabled {{ old('position', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Quotation::POSITION_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('position', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('position'))
                    <div class="invalid-feedback">
                        {{ $errors->first('position') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quotation.fields.position_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone_number">{{ trans('cruds.quotation.fields.phone_number') }}</label>
                <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', '') }}" required>
                @if($errors->has('phone_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quotation.fields.phone_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.quotation.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quotation.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="service_id">{{ trans('cruds.quotation.fields.service') }}</label>
                <select class="form-control select2 {{ $errors->has('service') ? 'is-invalid' : '' }}" name="service_id" id="service_id" required>
                    @foreach($services as $id => $entry)
                        <option value="{{ $id }}" {{ old('service_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('service'))
                    <div class="invalid-feedback">
                        {{ $errors->first('service') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quotation.fields.service_helper') }}</span>
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