@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                {{ trans('global.show') }} {{ trans('cruds.client.title') }}
            </div>
        
            <div class="card-body">
                <div class="form-group">
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('admin.clients.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>
                                    {{ trans('cruds.user.fields.id') }}
                                </th>
                                <td>
                                    {{ $client->id }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.user.fields.name') }}
                                </th>
                                <td>
                                    {{ $client->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.user.fields.email') }}
                                </th>
                                <td>
                                    {{ $client->email }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.user.fields.phone_number') }}
                                </th>
                                <td>
                                    {{ $client->phone_number }}
                                </td>
                            </tr> 
                            <tr>
                                <th>
                                    {{ trans('cruds.user.fields.email_verified_at') }}
                                </th>
                                <td>
                                    {{ $client->email_verified_at }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('admin.clients.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                {{ trans('global.relatedData') }}
            </div>
            <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="#user_request_services" role="tab" data-toggle="tab">
                        {{ trans('cruds.requestService.title') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#user_user_alerts" role="tab" data-toggle="tab">
                        {{ trans('cruds.userAlert.title') }}
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane" role="tabpanel" id="user_request_services">
                    @includeIf('admin.users.relationships.userRequestServices', ['requestServices' => $client->userRequestServices])
                </div>
                <div class="tab-pane" role="tabpanel" id="user_user_alerts">
                    @includeIf('admin.users.relationships.userUserAlerts', ['userAlerts' => $client->userUserAlerts])
                </div>
            </div>
        </div>
    </div>
</div>



@endsection