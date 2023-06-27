<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRequestServiceRequest;
use App\Http\Requests\StoreRequestServiceRequest;
use App\Http\Requests\UpdateRequestServiceRequest;
use App\Models\RequestService;
use App\Models\Service;
use App\Models\User;
use App\Models\UserAlert;
use Gate;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RequestServiceController extends Controller
{
    use MediaUploadingTrait;

    public function update_status($id,$status){
        $requestService = RequestService::findOrFail($id);
        if($status == 'accept'){
            $requestService->stages = 'contract';
        }
        $requestService->status = $status;
        $requestService->save();
        alert('تم بنجاح');
        return redirect()->route('admin.request-services.index');
    }

    public function index(Request $request)
    {
        abort_if(Gate::denies('request_service_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = RequestService::with(['user', 'service'])->select(sprintf('%s.*', (new RequestService)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'request_service_show';
                $editGate      = 'request_service_edit';
                $deleteGate    = 'request_service_delete';
                $crudRoutePart = 'request-services';

                return view('admin.requestServices.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->addColumn('service_name', function ($row) {
                return $row->service ? $row->service->name : '';
            });

            $table->editColumn('contract', function ($row) {
                if($row->contract){ 
                    $contract = '<a href="' . $row->contract->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>';
                }else{
                    if($row->status == 'accept'){
                        $contract = '<a class="btn btn-xs btn-info" href="'. route("admin.request-services.show",$row->id) .'"> أرسال العقد </a>  ';
                    }else{
                        $contract = '';
                    }
                }
                return $contract;
            });
            $table->editColumn('contract_accept', function ($row) {
                if($row->status != 'accept'){
                    $status = '';
                }elseif($row->contract_accept){
                    $status = '<i class="far fa-check-circle " style="font-size:20px;color:green"></i>';
                }elseif($row->contract){ 
                    $status = 'في أنتظار الموافقة';
                }else{ 
                    $status = '';
                }
                return  $status;
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? RequestService::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user', 'service', 'contract', 'contract_accept']);

            return $table->make(true);
        }

        return view('admin.requestServices.index');
    }

    public function create()
    {
        abort_if(Gate::denies('request_service_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $services = Service::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.requestServices.create', compact('services', 'users'));
    }

    public function store(StoreRequestServiceRequest $request)
    {
        $requestService = RequestService::create($request->all());

        if ($request->input('contract', false)) {
            $requestService->addMedia(storage_path('tmp/uploads/' . basename($request->input('contract'))))->toMediaCollection('contract');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $requestService->id]);
        }

        return redirect()->route('admin.request-services.index');
    }

    public function edit(RequestService $requestService)
    { 

        $requestService->load('user', 'service');

        return view('admin.requestServices.edit', compact('requestService'));
    }

    public function update(UpdateRequestServiceRequest $request, RequestService $requestService)
    {
        $requestService->update($request->all());

        $alert_body = '';
        if ($request->input('contract', false)) {
            if (!$requestService->contract || $request->input('contract') !== $requestService->contract->file_name) {
                if ($requestService->contract) {
                    $requestService->contract->delete();
                }
                $requestService->addMedia(storage_path('tmp/uploads/' . basename($request->input('contract'))))->toMediaCollection('contract');
            }
            $alert_body = 'تم أرسال العقد للعميل بنجاح وفي أنتظار قبول الشروط والأحكام';
            $userAlert = UserAlert::create([
                'alert_text' => 'تم أرسال العقد للخدمة المطلوبة رقم #'.$requestService->id.' وفي أنتطار القبول وأرسال الدفعة الأولي',
                'alert_link' => route('client.request-services.show',$requestService->id),
            ]);
            $userAlert->users()->sync([$requestService->user_id]);
        } elseif ($requestService->contract) {
            $requestService->contract->delete();
        }

        alert('تم بنجاح',$alert_body,'success'); 
        return redirect()->route('admin.request-services.show',$requestService->id);
    }

    public function update_stages(Request $request)
    {
        $requestService = RequestService::findOrFail($request->id); 
        $alert_body = ''; 
        if($request->stages == 'working'){
            $requestService->update($request->all()); 
            $alert_body = 'تم التحويل إلي المستشار لبدء التنفيذ';
            alert('تم بنجاح',$alert_body,'success'); 
        }elseif($request->stages == 'delivered'){
            if(!$request->has('finished_files_from_admin')){ 
                alert('الملفات النهائية مطلوبة','','error');
                return redirect()->route('admin.request-services.show',$requestService->id);
            }

            $requestService->update($request->all()); 
            
            foreach ($request->input('finished_files_from_admin', []) as $file) {
                $requestService->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('finished_files_from_admin');
            }
            $alert_body = 'تم أرسال الملفات النهائية للعميل';
            alert('تم بنجاح',$alert_body,'success'); 
        }elseif($request->stages == 'done'){
            if(!$request->has('certificates')){ 
                alert('شهادة الأنجاز مطلوبة','','error');
                return redirect()->route('admin.request-services.show',$requestService->id);
            }

            $requestService->update($request->all()); 
            
            foreach ($request->input('certificates', []) as $file) {
                $requestService->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('certificates');
            }
            $alert_body = 'تم أرسال شهادة الأنجاز للعميل';
            alert('تم بنجاح',$alert_body,'success'); 
        }else{
            alert('error','','error');
        }
        return redirect()->route('admin.request-services.show',$requestService->id);
    }

    public function show(RequestService $requestService)
    {
        abort_if(Gate::denies('request_service_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestService->load('user', 'service');

        return view('admin.requestServices.show', compact('requestService'));
    }

    public function destroy(RequestService $requestService)
    {
        abort_if(Gate::denies('request_service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestService->delete();

        return back();
    }

    public function massDestroy(MassDestroyRequestServiceRequest $request)
    {
        $requestServices = RequestService::find(request('ids'));

        foreach ($requestServices as $requestService) {
            $requestService->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('request_service_create') && Gate::denies('request_service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new RequestService();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
