<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ProductsModel;
use App\Models\StoneRateModel;
use App\Models\StripeModel;
use App\Models\OrderModel;
use App\Models\OrderDetails;
use App\Models\PaypalModel;
use App\Models\TotalSearchesModel;
use App\Models\SearchesOrderModel;
use Session;
use Stripe;
use Auth;
class ProductandCartController extends Controller
{
     public function addToCart(Request $request)
    {
      $id = $request->id;
      $price = StoneRateModel::select('rate')->first();
        $product = DB::table('grave_product')->where('PersonID',$id)->first();
        $cart = session()->get('cart', []);
        // if(isset($cart[$id])) {
        //     $cart[$id]['quantity']++;
        // } else {
        
            $cart[$id] = [
                "id" => $product->PersonID,
                "name" => $product->FirstName. " " . $product->LastName,
                "pic" => $request->pic,
                "price" => $price->rate,
            ];
        // }
        session()->put('cart', $cart);
          $message = 'Add to Cart Successfully';
          $count = count(session()->get('cart')).' Item';

          return response()->json(['message' => $message,'cart_count'=>$count]);
        // return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request, $id)
    {
    	
        if($id) {
        	// dd($request->id, $id);
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
             $message = 'Remove From Cart Successfully!';
        }




        return redirect()->back()->with('warning','Remove From Cart Successfully');
    }

         public function stripePost(Request $request)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
       $charge =  Stripe\Charge::create ([
                "amount" => $request->pricehere * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment." 
        ]);
       // dd($charge);
       $convertp = serialize($charge);
       $last4 = $charge->source->last4;
            $users = new StripeModel();
            $users->card_id =$charge->id;
            $users->user_id =Auth::id();
            $users->payment =$request->pricehere;
            $users->balance_transaction=$charge->balance_transaction;
            $users->payment_method =$charge->payment_method;
            $users->receipt_url = $charge->receipt_url;
            $users->card_last_four = $last4;
            $users->all_data = $convertp;
            $users->save();


             $order = new SearchesOrderModel();
            $order->user_id =Auth::id();
            $order->invoice_number = time().rand(100,900);
            $order->payment_method = 'stripe';
            $order->card_id =$charge->id;
            $order->receipt_url = $charge->receipt_url;
            $order->amount =$request->pricehere;
            $order->balance_transaction=$charge->balance_transaction;
            $order->payment_id =$charge->payment_method;
            $order->save();


            $find  = TotalSearchesModel::where('user_id',Auth::id())->first();
            $left = 3;
            if($find == ''){
            $searches = new TotalSearchesModel();
            $searches->user_id =Auth::id();
            $searches->total_searches = 3;
            $searches->search_left = 3;
            $searches->save();

            }

            elseif($find->user_id == Auth::id()){
              $searches = TotalSearchesModel::where('user_id',Auth::id())->first();
              $searches->search_left = $left;
              $searches->update();
            }
          
        return redirect()->route('search')->with('message','Payment Successful, Enjoy your 3 searches!');
    } 
    public function paypal()
    {
        return view('paypal-checkout');
    }

     public function paypal_payment(Request $request)
    {
       $users = new PaypalModel();
            $users->user_id =Auth::id();
            $users->payment=$request->total_price;
            $users->order_id=$request->data['orderID'];
            $users->payment_id =$request->data['paymentID'];
            $users->save();


             $order = new SearchesOrderModel();
            $order->user_id =Auth::id();
            $order->invoice_number = time().rand(100,900);
            $order->payment_method = 'paypal';
            $order->amount =$request->total_price;
            $order->order_id =$request->data['orderID'];
            $order->payer_id =$request->data['paymentID'];
            $order->save();

            $find  = TotalSearchesModel::where('user_id',Auth::id())->first();
            $left = 3;
            if($find == ''){
            $searches = new TotalSearchesModel();
            $searches->user_id =Auth::id();
            $searches->total_searches = 3;
            $searches->search_left = 3;
            $searches->save();

            }

            elseif($find->user_id == Auth::id()){
              $searches = TotalSearchesModel::where('user_id',Auth::id())->first();
              $searches->search_left = $left;
              $searches->update();
            }
            Session::flash('message', 'Payment Successful, Enjoy your 3 searches!');
            $message = 'Payment Successful!';
         return response()->json(['message' => $message]);
    }

    public function my_orders()
    {
     $orders = OrderModel::with('orderdetail')->where('user_id',Auth::id())->get();
      return view('my_orders')->with(compact('orders'));
    }

}
