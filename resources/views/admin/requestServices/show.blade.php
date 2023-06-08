@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.requestService.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.request-services.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.requestService.fields.id') }}
                        </th>
                        <td>
                            {{ $requestService->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestService.fields.user') }}
                        </th>
                        <td>
                            {{ $requestService->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestService.fields.service') }}
                        </th>
                        <td>
                            {{ $requestService->service->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestService.fields.contract') }}
                        </th>
                        <td>
                            @if($requestService->contract)
                                <a href="{{ $requestService->contract->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestService.fields.contract_accept') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $requestService->contract_accept ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestService.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\RequestService::STATUS_SELECT[$requestService->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.request-services.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection