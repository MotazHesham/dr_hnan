<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Staff
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->user_type == 'staff'){ 
            return $next($request);
        }elseif(Auth::user()->user_type == 'consultant'){
            return redirect()->route('consultant.home');
        }elseif(Auth::user()->user_type == 'client'){
            return redirect()->route('client.home');
        }else{
            Auth::logout();
            return redirect()->route('frontend.home');
        }
    }
}
