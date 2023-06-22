<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Comment;
use App\Models\RequestService;
use App\Models\Service;  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class RequestServiceController extends Controller
{ 
    use MediaUploadingTrait;

    public function confirm_contract($id){
        $requestService = RequestService::findOrFail($id);
        $requestService->contract_accept = 1;
        $requestService->stages = 'cost_1_pending';
        $requestService->save();
        alert('تم بنجاح');
        return redirect()->route('client.request-services.show',$requestService->id);
    }

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $query = RequestService::with(['consultant', 'service'])->where('user_id',Auth::id())->select(sprintf('%s.*', (new RequestService)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) { 
                $crudRoutePart = 'request-services';

                return view('client.requestServices.datatablesActions', compact( 
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('consultant_name', function ($row) {
                return $row->consultant ? $row->consultant->name : '';
            });

            $table->addColumn('service_name', function ($row) {
                return $row->service ? $row->service->name : '';
            });

            $table->editColumn('contract', function ($row) {
                return $row->contract ? '<a href="' . $row->contract->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            }); 
            $table->editColumn('status', function ($row) {
                return $row->status ? RequestService::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'consultant', 'service', 'contract', 'contract_accept']);

            return $table->make(true);
        }

        return view('client.requestServices.index');
    }

    public function create()
    { 

        $services = Service::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('client.requestServices.create', compact('services'));
    }

    public function store(Request $request)
    { 
        RequestService::create([
            'user_id' => Auth::id(),
            'service_id' => $request->service_id,
        ]); 

        alert('تم بنجاح','تم أرسال الطلب سيتم الرد قريبا','success');
        return redirect()->route('client.request-services.index');
    }  
    
    public function update_cost_1(Request $request)
    {
        $requestService = RequestService::find($request->id);  
        $requestService->update($request->all());

        $alert_body = '';
        if ($request->input('cost_1_file', false)) {
            if (! $requestService->cost_1_file || $request->input('cost_1_file') !== $requestService->cost_1_file->file_name) {
                if ($requestService->cost_1_file) {
                    $requestService->cost_1_file->delete();
                }
                $requestService->addMedia(storage_path('tmp/uploads/' . basename($request->input('cost_1_file'))))->toMediaCollection('cost_1_file');
            } 
            $alert_body = 'تم أرسال الأيصال وسيتم المراجعة من الأدارة والرد قريبا';
        } elseif ($requestService->cost_1_file) {
            $requestService->cost_1_file->delete();
        } 

        alert('تم بنجاح',$alert_body,'success');
        return redirect()->route('client.request-services.show',$requestService->id);
    }
    public function update_cost_2(Request $request)
    {
        $requestService = RequestService::find($request->id);  
        $requestService->update($request->all());

        $alert_body = '';
        if ($request->input('cost_2_file', false)) {
            if (! $requestService->cost_2_file || $request->input('cost_2_file') !== $requestService->cost_2_file->file_name) {
                if ($requestService->cost_2_file) {
                    $requestService->cost_2_file->delete();
                }
                $requestService->addMedia(storage_path('tmp/uploads/' . basename($request->input('cost_2_file'))))->toMediaCollection('cost_2_file');
            } 
            $alert_body = 'تم أرسال الأيصال وسيتم المراجعة من الأدارة والرد قريبا';
        } elseif ($requestService->cost_2_file) {
            $requestService->cost_2_file->delete();
        } 

        alert('تم بنجاح',$alert_body,'success');
        return redirect()->route('client.request-services.show',$requestService->id);
    }

    public function show(RequestService $requestService)
    {  
        $requestService->load('user', 'service');

        return view('client.requestServices.show', compact('requestService'));
    }

    public function destroy(RequestService $requestService)
    { 

        $requestService->delete();

        return back();
    }  
}
