<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\OldMapModel;
use App\Models\NewMapModel;
use App\Models\TotalSearchesModel;
use soundex;
use Auth;
use DateTime;

class IndexController extends Controller
{
    public function about_us()
    {
    	return view('about-us');
    }

    public function contact_us()
    {
    	return view('contact-us');
    }

    public function faqs()
    {
    	return view('faqs');
    }

    public function home()
    {
    	return view('index');
    }

    public function log_in()
    {
    	return view('login');
    }

    public function new_map()
    {
    $newside = NewMapModel::get();
    	return view('new-map')->with(compact('newside'));
    }

    public function old_maps()
    {
      $oldside = OldMapModel::get();
    	return view('old-maps')->with(compact('oldside'));
    }

    public function cart()
    {
      return view('cart');
    }

    public function result(Request $request)
    {
       
         $data = '';
         $id= Auth::id();
         $date = $request->input('burial_date');
         $last_name = $request->input('last_name');
        $burial=\Carbon\Carbon::parse($date)->format('m/d/Y');
        $burial_date=\Carbon\Carbon::parse($burial)->format('n/j/Y');
            if(isset($burial_date)  && $last_name != '' ) {
              $data = DB::table('grave_product')->where('Burial', 'LIKE', '%'. $burial_date. '%')->where('LastName', 'LIKE', '%'. $last_name. '%')->get();
              // dd($data);
               $search_used = TotalSearchesModel::select('search_left')->where('user_id',$id)->first();
               $left = $search_used->search_left - 1;
               $searches_left = TotalSearchesModel::where('user_id',$id)->first();
               // dd($searches_left);
               $searches_left->search_left = $left;
               $searches_left->update();
              }
    	return view('result')->with(compact('data'));
    }

    public function result2(Request $request)
    {
     
        $data = '';
        $id= Auth::id();
        $last_name = $request->last_name;
        
            if($last_name != '' ) {
              $data = DB::table('grave_product')->where('LastName', 'LIKE', '%'. $last_name. '%')->get();
               $search_used = TotalSearchesModel::select('search_left')->where('user_id',$id)->first();
               $left = $search_used->search_left - 1;
               $searches_left = TotalSearchesModel::where('user_id',$id)->first();
               // dd($searches_left);
               $searches_left->search_left = $left;
               $searches_left->update();
              }

    	return view('result2')->with(compact('data'));
    }

    public function result3(Request $request)
    {
      
         $data = '';
         $id= Auth::id();
          $date = $request->input('burial_date');
        $burial=\Carbon\Carbon::parse($date)->format('m/d/Y');
        $burial_date=\Carbon\Carbon::parse($burial)->format('n/j/Y');
            if($date != '') {
              $data = DB::table('grave_product')->where('Burial', 'LIKE', '%'. $burial_date. '%')->get();
              $search_used = TotalSearchesModel::select('search_left')->where('user_id',$id)->first();
               $left = $search_used->search_left - 1;
               $searches_left = TotalSearchesModel::where('user_id',$id)->first();
               // dd($searches_left);
               $searches_left->search_left = $left;
               $searches_left->update();  
              }
    	return view('result3')->with(compact('data'));
    }

    public function search()
    {
    	return view('search');
    }

    public function log_up()
    {
    	return view('sign_up');
    }

    public function role_set()
    {
       return view('roleset');
    }
    
    public function checkout()
    {
       return view('checkout');
    }
    
    public function payment_method()
    {
       return view('payment_method');
    }
}

