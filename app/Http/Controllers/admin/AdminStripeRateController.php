<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RateModel;

class AdminStripeRateController extends Controller
{
	 function rate_list()
    {
        $rate = RateModel::get();
        return view('admin.rate.rate-list',compact('rate'));
    }
    function rate_add()
    {
        return view('admin.rate.rate-add');
    }
    function rate_edit($id)
    {
        $rate = RateModel::where('id',$id)->first();
        return view('admin.rate.rate-edit',compact('rate'));
    }
  
    function rate_add_edit_data(Request $request,RateModel $rate)
    {
        $create = 1;
        (isset($rate->id) and $rate->id>0)?$create=0:$create=1;
        $rate->rate = $request->rate;
        $rate->save();
        if($create == 0)
        {
            return back()->with('update','Updated Successfully');
        }
        else
        {
            return back()->with('success','Added Successfully');
        }
    }
}
