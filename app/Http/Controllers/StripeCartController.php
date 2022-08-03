<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StripeCartModel;
use App\Models\OrderModel;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\Crypt;
use Stripe;
use Auth;
use Session;
use Carbon\Carbon;
use App\Mail\MailOrder;
use Mail;

class StripeCartController extends Controller
{
    public function stripeCart($price)
    {
        $price = Crypt::decryptString($price);
    return view('stripe_cart_payment')->with(compact('price'));	
    }

    public function stripe_cart_payment(Request $request)
    {
    	Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
       $charge =  Stripe\Charge::create ([
                "amount" => $request->pricehere * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment." 
        ]);

       $convertp = serialize($charge);
       $last4 = $charge->source->last4;
            $users = new StripeCartModel();
            $users->card_id =$charge->id;
            $users->user_id =Auth::id();
            $users->payment =$request->pricehere;
            $users->balance_transaction=$charge->balance_transaction;
            $users->payment_method =$charge->payment_method;
            $users->receipt_url = $charge->receipt_url;
            $users->card_last_four = $last4;
            $users->all_data = $convertp;
            $users->save();

          if(session('cart')){
            $products = session('cart');
            
              }

            $order = new OrderModel();
            $order->user_id =Auth::id();
            $order->invoice_number = time().rand(100,900);
            $order->payment_method = 'stripe';
            $order->card_id =$charge->id;
            $order->receipt_url = $charge->receipt_url;
            $order->total_amount =$request->pricehere;
            $order->balance_transaction=$charge->balance_transaction;
            $order->payment_id =$charge->payment_method;
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
        // Session::flash('success', 'Payment successful & Your Order had been Placed!');
           Session::forget('cart');
        return redirect()->route('search')->with('message','Payment successful & Your Order had been Placed!');
    }
}
