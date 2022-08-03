<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\TotalSearchesModel;
use Auth;

class SearchLeftMiddleware
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
          if(Auth::check() && Auth::id() != ''){
            $searches_left = TotalSearchesModel::where('user_id',Auth::id())->where('search_left','>' ,0)->first();
                    if($searches_left == ''){
                     return redirect()->route('payment_method');
                    }
        }
        else{
            return redirect()->route('login');
        }
       
        return $next($request);
    }
}
