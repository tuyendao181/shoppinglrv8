<?php

namespace App\Http\Controllers;
use  App\Models\Product;
use  App\Models\Account;
use  App\Models\Orders;
use  App\Models\orders_detail;
use  App\Models\product_attributes;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(Request $request){
        $data=[];
        $data['pro']    = Product::all()->count();
        $data['order']  = Orders::all()->count();
        $data['account']= Account::all()->count();
        $order = Orders::paginate(5);
      
        // if($request->ajax()){
        //     dd($order);
        //     $html = view('admin.list_paginate_order',compact('order'))->render();
        //     return response()->json(['html' => $html]);
        // }
        return view('admin.dashboard',compact('data','order'));
    }
    public function orderDetail(Request $request){
       $id = $request ->id;
       $order = Orders::join('orders_detail', 'orders.id', '=', 'orders_detail.order_id')
       ->join('product_attributes','product_attributes.id_atrr','=','orders_detail.product_id')
       ->join('products','products.id','=','product_attributes.id_product')
       ->where('orders.id','=',$id)
       ->get();
       return response()->json(['data' => $order]);
    }

}
