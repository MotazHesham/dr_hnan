<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller; 
use App\Models\RequestService;
use App\Models\Service;  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class RequestServiceController extends Controller
{ 

    public function confirm_contract($id){
        $requestService = RequestService::findOrFail($id);
        $requestService->contract_accept = 1;
        $requestService->save();
        alert('تم بنجاح');
        return redirect()->route('client.request-services.index');
    }

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $query = RequestService::with(['user', 'service'])->whereHas('user',function($query){
                $query->where('id',Auth::id());
            })->select(sprintf('%s.*', (new RequestService)->table));
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
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->addColumn('service_name', function ($row) {
                return $row->service ? $row->service->name : '';
            });

            $table->editColumn('contract', function ($row) {
                return $row->contract ? '<a href="' . $row->contract->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('contract_accept', function ($row) {
                if($row->status != 'accept'){
                    $status = '';
                }elseif($row->contract_accept){
                    $status = '<i class="far fa-check-circle " style="font-size:20px;color:green"></i>';
                }elseif($row->contract){  
                    $status = '<a class="btn btn-xs btn-success" href="'. route("client.request-services.confirm_contract",$row->id) .'"> الموافقة علي العقد </a>  ';
                }else{
                    $status = 'لم يتم أرسال العقد بعد';
                }
                return  $status;
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? RequestService::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user', 'service', 'contract', 'contract_accept']);

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
