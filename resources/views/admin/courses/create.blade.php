@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.course.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.courses.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.course.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.course.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="trainer">{{ trans('cruds.course.fields.trainer') }}</label>
                <input class="form-control {{ $errors->has('trainer') ? 'is-invalid' : '' }}" type="text" name="trainer" id="trainer" value="{{ old('trainer', '') }}" required>
                @if($errors->has('trainer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('trainer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.trainer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_at">{{ trans('cruds.course.fields.start_at') }}</label>
                <input class="form-control date {{ $errors->has('start_at') ? 'is-invalid' : '' }}" type="text" name="start_at" id="start_at" value="{{ old('start_at') }}" required>
                @if($errors->has('start_at'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_at') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.start_at_helper') }}</span>
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