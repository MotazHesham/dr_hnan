@extends('layouts.admin')
@section('content')
    @can('joining_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.joinings.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.joining.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.joining.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Joining">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.joining.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.joining.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.joining.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.joining.fields.phone_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.joining.fields.gender') }}
                        </th>
                        <th>
                            {{ trans('cruds.joining.fields.nationality') }}
                        </th>
                        <th>
                            {{ trans('cruds.joining.fields.qualification') }}
                        </th>
                        <th>
                            {{ trans('cruds.joining.fields.experience_years') }}
                        </th>
                        <th>
                            {{ trans('cruds.joining.fields.cv') }}
                        </th>
                        <th>
                            {{ trans('cruds.joining.fields.is_sent_email') }}
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
        
        
        function update_is_sent_email(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            } 
            $.post('{{ route('admin.joinings.update_is_sent_email') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showFrontendAlert('success',"{{ trans('global.success') }}");
                }else{
                    showFrontendAlert('error',"{{ trans('global.error') }}");
                }
            });
        }

    </script>
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('joining_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.joinings.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).data(), function(entry) {
                            return entry.id
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.joinings.index') }}",
                columns: [{
                        data: 'placeholder',
                        name: 'placeholder'
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number'
                    },
                    {
                        data: 'gender',
                        name: 'gender'
                    },
                    {
                        data: 'nationality',
                        name: 'nationality'
                    },
                    {
                        data: 'qualification',
                        name: 'qualification'
                    },
                    {
                        data: 'experience_years',
                        name: 'experience_years'
                    },
                    {
                        data: 'cv',
                        name: 'cv',
                        sortable: false,
                        searchable: false
                    },
                    {
                        data: 'is_sent_email',
                        name: 'is_sent_email'
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
                pageLength: 25,
            };
            let table = $('.datatable-Joining').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });
    </script>
@endsection
