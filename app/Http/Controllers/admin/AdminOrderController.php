<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\OrderDetails;
use App\Models\SearchesOrderModel;
use App\Models\User;

class AdminOrderController extends Controller
{
	 public function admin_order_list()
	 {

        $list = OrderModel::get();
        foreach ($list as $key => $value) {
        $order_item = OrderDetails::where('order_id',$value->id)->get();
        }
        return view('admin.orders.order-list',compact('list','order_item'));
   
	 }
	 public function admin_order_delete(OrderModel $order)
    {
        $order->delete();
        return back()->with('delete','Deleted Successfully');
    }
    public function admin_orders_view($id)
    {
        $order_payment = OrderModel::where('id',$id)->first();
        $order_details =OrderDetails::where('order_id',$id)->get();
        $user_details = User::where('id',$order_payment->user_id)->first();
        // dd($order_payment,$order_details,$user_details);
        return view('admin.orders.order-view')->with(compact('order_payment','order_details','user_details'));
    }
    
     public function admin_searches_order_list()
     {

        $list = SearchesOrderModel::get();
        foreach ($list as $key => $value) {

            // $user_details = User::where('id',$value->user_id)->first();
        }
      
        return view('admin.searches-orders.searches-order-list')->with(compact('list'));
   
     }
      public function admin_searches_orders_view($id)
    {
        $order_payment = SearchesOrderModel::where('id',$id)->first();
        $user_details = User::where('id',$order_payment->user_id)->first();
        // dd($order_payment,$order_details,$user_details);
        return view('admin.orders.searches-order-view')->with(compact('order_payment'));
    }
}

