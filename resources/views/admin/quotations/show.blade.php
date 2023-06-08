@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.quotation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.quotations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.quotation.fields.id') }}
                        </th>
                        <td>
                            {{ $quotation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotation.fields.the_company') }}
                        </th>
                        <td>
                            {{ $quotation->the_company }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotation.fields.name') }}
                        </th>
                        <td>
                            {{ $quotation->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotation.fields.position') }}
                        </th>
                        <td>
                            {{ App\Models\Quotation::POSITION_SELECT[$quotation->position] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotation.fields.phone_number') }}
                        </th>
                        <td>
                            {{ $quotation->phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotation.fields.email') }}
                        </th>
                        <td>
                            {{ $quotation->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotation.fields.service') }}
                        </th>
                        <td>
                            {{ $quotation->service->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.quotations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection