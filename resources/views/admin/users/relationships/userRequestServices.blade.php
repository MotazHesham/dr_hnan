@can('request_service_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.request-services.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.requestService.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.requestService.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-userRequestServices">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.requestService.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.requestService.fields.service') }}
                        </th>
                        <th>
                            {{ trans('cruds.requestService.fields.contract') }}
                        </th>
                        <th>
                            {{ trans('cruds.requestService.fields.contract_accept') }}
                        </th>
                        <th>
                            {{ trans('cruds.requestService.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($requestServices as $key => $requestService)
                        <tr data-entry-id="{{ $requestService->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $requestService->id ?? '' }}
                            </td>
                            <td>
                                {{ $requestService->service->name ?? '' }}
                            </td>
                            <td>
                                @if($requestService->contract)
                                    <a href="{{ $requestService->contract->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                <span style="display:none">{{ $requestService->contract_accept ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $requestService->contract_accept ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ App\Models\RequestService::STATUS_SELECT[$requestService->status] ?? '' }}
                            </td>
                            <td>
                                @can('request_service_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.request-services.show', $requestService->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('request_service_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.request-services.edit', $requestService->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('request_service_delete')
                                    <form action="{{ route('admin.request-services.destroy', $requestService->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

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
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('request_service_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.request-services.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-userRequestServices:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection