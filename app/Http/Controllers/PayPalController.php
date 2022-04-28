<?php

namespace App\Http\Controllers;
use Validator;
use Auth;
use  App\Models\Cart;
use  App\Models\Orders;
use  App\Models\OrderDetail;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
class PayPalController extends Controller
{
    //
    public function createTransaction()
    {
        return view('transaction');
    }

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request, Cart $cart)
    {

        $validator = Validator::make($request->all(), [
			'name' => 'required',
			'address' => 'required',
			'phone' => 'required',
			'email' => 'required',
		]);

        if ($validator->fails()) {
			return response()->json(["err" => $validator->errors()->toArray(), 'status' => 999]);
		}else{

            $idc = Auth::User()->id;
            $data['name']=$request->name;
			$data['phone'] = $request->phone;
			$data['email'] = $request->email;
			$data['address'] = $request->address;
			$data['customer_id'] = $idc;
			$data['customer_id'] = $cart->get_total_price();
            session(['order' => $data]);

            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('successTransaction'),
                    "cancel_url" => route('cancelTransaction'),
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => $cart->get_total_price(),
                        ]
                    ]
                ]
            ]);

            if (isset($response['id']) && $response['id'] != null) {
                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return response()->json($links['href']);
                        // dd();
                        // return redirect()->away($links['href']);
                    }
                }
                return redirect()
                    ->route('getCheckout')
                    ->with('error', 'Something went wrong.');
            } else {
                return redirect()
                    ->route('getCheckout')
                    ->with('error', $response['message'] ?? 'Something went wrong.');
            }
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request,Cart $cart)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $data=session('order');
            //theem order 
            if ($order = Orders::create([
				'name' => $data['name'],
				'phone' => $data['phone'],
				'email' => $data['email'],
				'address' => $data['address'],
				'customer_id' => $data['customer_id'],
				'total' => $cart->get_total_price(),
                'payment'=> 1,
			])){
                $order_id = $order->id;
				foreach ($cart->items as $key => $item) {
					$price = $item['price'];
					$product_id = $key;
					$qty = $item['quantity'];
					$color = $item['color'];
					$size = $item['size'];
					$orderdetail=OrderDetail::create([
						'order_id' => $order_id,
						'quantity' => $qty,
						'price' => $price,
						'product_id' => $product_id,
						'color' => $color,
						'size' => $size
					]);
				}
            } 
            $data=$cart;
			session(['payment' => 1]);
			session(['orderdetail' => $data]);
			session(['cart' => '']);
            return redirect()
                ->route('getOrderdetail')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('getCheckout')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('getCheckout')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
}
