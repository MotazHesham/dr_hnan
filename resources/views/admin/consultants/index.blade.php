@extends('layouts.admin')
@section('content')
@can('consultant_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.consultants.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.consultant.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.consultant.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Consultant">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.consultant.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.consultant.fields.specialization') }}
                        </th>
                        <th>
                            {{ trans('cruds.consultant.fields.short_description') }}
                        </th>
                        <th>
                            {{ trans('cruds.consultant.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.consultant.fields.photo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($consultants as $key => $consultant)
                        <tr data-entry-id="{{ $consultant->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $consultant->id ?? '' }}
                            </td>
                            <td>
                                {{ $consultant->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $consultant->user->email ?? '' }}
                            </td>
                            <td>
                                {{ $consultant->specialization ?? '' }}
                            </td>
                            <td>
                                {{ $consultant->short_description ?? '' }}
                            </td>
                            <td>
                                {{ $consultant->description ?? '' }}
                            </td>
                            <td>
                                @if($consultant->photo)
                                    <a href="{{ $consultant->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $consultant->photo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('consultant_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.consultants.show', $consultant->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('consultant_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.consultants.edit', $consultant->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('consultant_delete')
                                    <form action="{{ route('admin.consultants.destroy', $consultant->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('consultant_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.consultants.massDestroy') }}",
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
    pageLength: 25,
  });
  let table = $('.datatable-Consultant:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection