<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Auth;
use  App\Models\Cart;
use  App\Models\Orders;
use  App\Models\OrderDetail;

class CheckoutController extends Controller
{
    public function getCheckout(Request $request){
        return view('page.checkout');
    }
    public function postCheckout(Request $request,Cart $cart){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
       ]);
       if ($validator->fails()) {
             return response()->json(["err" => $validator -> errors()->toArray(),'status'=>999 ]);
       }
       else{
          
            $idc=Auth::User()->id;
		    if($order=Orders::create([
		    	'name'=> $request->name,
		    	'phone'=> $request->phone,
		    	'email'=> $request->email,
		    	'address'=> $request->address,
		    	'customer_id'=> $idc,
		    	'total'=> $cart->get_total_price()
		    ])
		    ){

		    	$order_id = $order->id;
		        foreach($cart->items as $item){

		    		$price = $item['price'];
		    		$product_id = $item['id'];
		    		$qty=$item['quantity'];	
                    $color = $item['color'];
                    $size = $item['size'];

		    		OrderDetail::create([
		    			'order_id'=>$order_id,	
		    			'quantity'=>$qty,
		    			'price'=>$price	,
		    			'product_id'=>$product_id,
                        'color'=>$color,
                        'size'=>$size
		    		]);				

		    	}

		    }

		    session(['cart'=>'']);
            return response()->json(['status'=>'ok']);
       }
  
    }
}
