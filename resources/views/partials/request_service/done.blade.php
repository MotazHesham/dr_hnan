@if ($stage_cost_1_pending_color == 'success')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ trans('cruds.requestService.fields.finished_files') }}</div>
                <div class="card-body"> 
                    @foreach ($requestService->finished_files_from_admin as $key => $media)
                        <a href="{{ $media->getUrl() }}" target="_blank" class="btn btn-light mb-2">
                            {{ $media->file_name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">شهادة الأنجاز</div>
                <div class="card-body">
                    @foreach ($requestService->certificates as $key => $media)
                        <a href="{{ $media->getUrl() }}" target="_blank" class="btn btn-warning mb-2">
                            {{ $media->file_name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif