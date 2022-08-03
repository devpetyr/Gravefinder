<?php

namespace App\Http\Controllers\admin;

use App\Models\BannerModel;
use App\Models\OrderModel;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBannerController extends Controller
{
    function dashboard()
    {
        $orders = OrderModel::select('created_at')->where('is_active',1)->where('is_deleted',0)->get();
    $emt[] = '';
        // $empsalaries = OrderModel:: whereMonth('salary_date', $date->month)->get();
    $month01 = OrderModel::select('created_at')->whereMonth('created_at', '=', '1')->get();
    $month1 = count($month01);
    $month02 = OrderModel::select('created_at')->whereMonth('created_at', '=', '2')->get();
    $month2 = count($month02);
    $month03 = OrderModel::select('created_at')->whereMonth('created_at', '=', '3')->get();
    $month3 = count($month03);
    $month04 = OrderModel::select('created_at')->whereMonth('created_at', '=', '4')->get();
    $month4 = count($month04);
    $month05 = OrderModel::select('created_at')->whereMonth('created_at', '=', '5')->get();
    $month5 = count($month05);
    $month06 = OrderModel::select('created_at')->whereMonth('created_at', '=', '6')->get();
    $month6 = count($month06);
    $month07 = OrderModel::select('created_at')->whereMonth('created_at', '=', '7')->get();
    $month7 = count($month07);
    $month08 = OrderModel::select('created_at')->whereMonth('created_at', '=', '8')->get();
    $month8 = count($month08);
    $month09 = OrderModel::select('created_at')->whereMonth('created_at', '=', '9')->get();
    $month9 = count($month09);
    $month010 = OrderModel::select('created_at')->whereMonth('created_at', '=', '10')->get();
    $month10 = count($month010);
    $month011 = OrderModel::select('created_at')->whereMonth('created_at', '=', '11')->get();
    $month11 = count($month011);
    $month012 = OrderModel::select('created_at')->whereMonth('created_at', '=', '12')->get();
    $month12 = count($month012);
  
        return view('admin.dashboard')->with(compact('orders','month1','month2','month3','month4','month5','month6','month7','month8','month9','month10','month11','month12'));
    }

/**Banner functions starts*/
    function banner()
    {
        $banner = BannerModel::get();
        return view('admin.banners.banner-list',compact('banner'));
    }
    function banner_add()
    {
        return view('admin.banners.banner-add');
    }
    function banner_edit($id)
    {
        $banner = BannerModel::where('id',$id)->first();
        return view('admin.banners.banner-edit',compact('banner'));
    }
    function banner_delete(BannerModel $banner)
    {
        $banner->delete();
        return back()->with('delete','Deleted Successfully');
    }
    function banner_add_edit_data(Request $request,BannerModel $banner)
    {
        $create = 1;
        (isset($banner->id) and $banner->id>0)?$create=0:$create=1;
        if($request->hasFile('images'))
        {
            $imageName = time().'.'.$request->images->getClientOriginalExtension();
            $request->images->move(public_path('/uploads/banners'), $imageName);
            $banner->images = $imageName;
        }
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->status = $request->status;
        $banner->save();
        if($create == 0)
        {
            return back()->with('update','Updated Successfully');
        }
        else
        {
            return back()->with('success','Added Successfully');
        }
    }
/**Banner functions ends*/


}
