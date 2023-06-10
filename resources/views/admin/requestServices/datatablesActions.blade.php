
@if($row->status == 'pending')
    <a class="btn btn-xs btn-success" href="{{ route('admin.' . $crudRoutePart . '.update_status',['id'=> $row->id,'status'=>'accept']) }}">
        قبول
    </a>
    <a class="btn btn-xs btn-warning" href="{{ route('admin.' . $crudRoutePart . '.update_status',['id'=> $row->id,'status'=>'refused']) }}">
        رفض
    </a> 
@endif
@can($viewGate)
    <a class="btn btn-xs btn-primary" href="{{ route('admin.' . $crudRoutePart . '.show', $row->id) }}">
        {{ trans('global.view') }}
    </a>
@endcan 
@if(!$row->contract_accept)
    @can($deleteGate)
        <form action="{{ route('admin.' . $crudRoutePart . '.destroy', $row->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
        </form>
    @endcan
@endif