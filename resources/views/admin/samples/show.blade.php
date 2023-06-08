@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sample.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.samples.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sample.fields.id') }}
                        </th>
                        <td>
                            {{ $sample->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sample.fields.name') }}
                        </th>
                        <td>
                            {{ $sample->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sample.fields.file') }}
                        </th>
                        <td>
                            @if($sample->file)
                                <a href="{{ $sample->file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sample.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $sample->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.samples.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection