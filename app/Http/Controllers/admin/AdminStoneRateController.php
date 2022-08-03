<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StoneRateModel;

class AdminStoneRateController extends Controller
{
    function stone_rate_list()
    {
        $rate = StoneRateModel::get();
        return view('admin.stone-rate.stone_rate-list',compact('rate'));
    }
    function stone_rate_add()
    {
        return view('admin.stone-rate.stone_rate-add');
    }
    function stone_rate_edit($id)
    {
        $rate = StoneRateModel::where('id',$id)->first();
        return view('admin.stone-rate.stone_rate-edit',compact('rate'));
    }
    function stone_rate_add_edit_data(Request $request,StoneRateModel $rate)
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
