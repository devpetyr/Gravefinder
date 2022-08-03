<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\TotalSearchesModel;
use Auth;
class RolesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::id() != ''){
            if(isset(Auth::user()->user_role)){
                if(Auth::user()->user_role == 0 ){
                    return redirect()->route('admin_dashboard');
                }
       
                if(Auth::user()->user_role == 1){
                    $searches_left = TotalSearchesModel::where('user_id',Auth::id())->where('search_left','>' ,0)->first();
                    // dd($searches_left);
                    if($searches_left == ''){
                     return redirect()->route('payment_method');
                    }
                    else{
                     return redirect()->route('search');
                    }
                 }
       
            }
        }
        else{
            dd(Auth::id(),'middleware 32');
        }
     return $next($request);
    }

}
