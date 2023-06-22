@extends('layouts.consultant')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.requestService.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("consultant.request-services.store") }}" enctype="multipart/form-data">
            @csrf 
            <div class="form-group">
                <label class="required" for="service_id">{{ trans('cruds.requestService.fields.service') }}</label>
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
                <span class="help-block">{{ trans('cruds.requestService.fields.service_helper') }}</span>
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