<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaypalCartModel;
use App\Models\OrderModel;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use App\Mail\MailOrder;
use Mail;
use Stripe;
use Auth;
use Session;

class PaypalCartController extends Controller
{
    public function paypal_cart($price)
    {
        $price = Crypt::decryptString($price);
    	return view('paypal_cart_payment')->with(compact('price'));
    }

    public function paypal_cart_payment(Request $request)
    {
    	$users = new PaypalCartModel();
            $users->user_id =Auth::id();
            $users->payment=$request->total_price;
            $users->order_id=$request->data['orderID'];
            $users->payment_id =$request->data['paymentID'];
            $users->save();



            if(session('cart')){
            $products = session('cart');
              }

            $order = new OrderModel();
            $order->user_id =Auth::id();
            $order->invoice_number = time().rand(100,900);
            $order->payment_method = 'paypal';
            $order->total_amount =$request->total_price;
            $order->order_id =$request->data['orderID'];
            $order->payer_id =$request->data['paymentID'];
            $order->number_of_products = count($products);
            $order->save();
                
                foreach ($products as $key => $value) {
                $latest_order = OrderModel::latest()->first();
                $ord_details = new OrderDetails();
                $ord_details->order_id =$latest_order->id;
                $ord_details->price =$value['price'];
                $ord_details->product_id =$value['id'];
                $ord_details->pic_id =$value['pic'];
                $ord_details->item=$value['name'];
                // dd($users);
                $ord_details->save();
            }
             $latest =  OrderModel::latest('id')->first();
             $details = ['invoice_number' => $latest->invoice_number,'order_id' => $latest_order->id, 'payment_method' => 'paypal', 'user_email' => Auth::user()->email, 'total_amount' => $value['price'], 'number_of_products' => count($products)];
        Mail::to('blossampgrc094@gmail.com')->send(new MailOrder($details));
            Session::flash('message', 'Payment successful & Your Order had been Placed!');
            Session::forget('cart');
            $message = 'Payment Successful!';
         return response()->json(['message' => $message]);
    }
}