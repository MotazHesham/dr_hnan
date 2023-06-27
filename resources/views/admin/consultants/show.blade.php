@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.consultant.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.consultants.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.consultant.fields.id') }}
                        </th>
                        <td>
                            {{ $consultant->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.consultant.fields.name') }}
                        </th>
                        <td>
                            {{ $consultant->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.consultant.fields.specialization') }}
                        </th>
                        <td>
                            {{ $consultant->specialization }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.consultant.fields.short_description') }}
                        </th>
                        <td>
                            {{ $consultant->short_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.consultant.fields.description') }}
                        </th>
                        <td>
                            {{ $consultant->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.consultant.fields.photo') }}
                        </th>
                        <td>
                            @if($consultant->photo)
                                <a href="{{ $consultant->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $consultant->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.consultants.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection