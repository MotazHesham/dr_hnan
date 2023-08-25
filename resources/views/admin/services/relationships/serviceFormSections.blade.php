    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                {{ trans('global.add') }} {{ trans('cruds.formSection.title_singular') }}
            </button>
        </div>
    </div> 

<div class="card">
    <div class="card-header">
        {{ trans('cruds.formSection.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-serviceFormSections">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.formSection.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.formSection.fields.form_section_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.formSection.fields.fields') }}
                        </th>
                        <th>
                            {{ trans('cruds.formSection.fields.form_has_file') }}
                        </th>
                        <th>
                            {{ trans('cruds.formSection.fields.file_name') }}
                        </th> 
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($formSections as $key => $formSection)
                        <tr data-entry-id="{{ $formSection->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $formSection->id ?? '' }}
                            </td>
                            <td>
                                {{ $formSection->form_section_name ?? '' }}
                            </td>
                            <td>
                                @if($formSection->fields != null )
                                    @foreach(json_decode($formSection->fields) as $field)
                                        {{ $field }}
                                        <br>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                {{ App\Models\FormSection::FORM_HAS_FILE_RADIO[$formSection->form_has_file] ?? '' }}
                            </td>
                            <td>
                                {{ $formSection->file_name ?? '' }}
                            </td> 
                            <td>  
                                <button class="btn btn-xs btn-info" onclick="editFormSection('{{$formSection->id}}')">
                                    {{ trans('global.edit') }}
                                </button> 
                                <form action="{{ route('admin.form-sections.destroy', $formSection->id) }}"
                                    method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                    style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger"
                                        value="{{ trans('global.delete') }}">
                                </form> 

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
    @parent
    <script>

        function editFormSection(id) { 
            $.ajax({
                url: '{{ route("admin.form-sections.editAjax") }}',
                type: 'POST',
                data:{ id:id , _token: '{{ csrf_token() }}' },
                success: function(data) {
                    $('#AjaxModal .modal-dialog').html(null);
                    $('#AjaxModal').modal('show');
                    $('#AjaxModal .modal-dialog').html(data);
                }, 
            });
        }

        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('form_section_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.form-sections.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).nodes(), function(entry) {
                            return $(entry).data('entry-id')
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

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            });
            let table = $('.datatable-serviceFormSections:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
