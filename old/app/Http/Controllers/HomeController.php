<?php

namespace App\Http\Controllers;

use App\Mail\PriceOrder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;

class HomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function price(Request $request){
        $data=array(
            'fname'=>$request->fname,
            'umail'=>$request->umail,
            'email'=>$request->email,
            'manager'=>$request->manager,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'service'=>$request->service,


        );

        Mail::to('info@hdac.sa')->send(new PriceOrder($data));
        return back()->with('success','تم إرسال طلبك بنجاح');
    }
}
