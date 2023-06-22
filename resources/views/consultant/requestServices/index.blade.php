@extends('layouts.consultant')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('consultant.request-services.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.requestService.title_singular') }}
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.requestService.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-RequestService">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.requestService.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.requestService.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.requestService.fields.service') }}
                        </th>
                        <th>
                            {{ trans('cruds.requestService.fields.contract') }}
                        </th>
                        <th>
                            {{ trans('cruds.requestService.fields.stages') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons) 

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('consultant.request-services.index') }}",
                columns: [{
                        data: 'placeholder',
                        name: 'placeholder'
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'user_name',
                        name: 'user.name'
                    },
                    {
                        data: 'service_name',
                        name: 'service.name'
                    },
                    {
                        data: 'contract',
                        name: 'contract',
                        sortable: false,
                        searchable: false
                    },
                    {
                        data: 'stages',
                        name: 'stages'
                    },
                    {
                        data: 'actions',
                        name: '{{ trans('global.actions') }}'
                    }
                ],
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            };
            let table = $('.datatable-RequestService').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });
    </script>
@endsection
