<?php

namespace App\Http\Controllers;
use  App\Models\ProductAttr;
use  App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller 
{
    public function getCart(Request $request,Cart $cart){
        return view('page.list_cart',compact('cart'));
    }
    public function postCart(Request $request,Cart $cart){
        $product=ProductAttr::join('products', 'products.id', '=', 'product_attributes.id_product')
        ->leftJoin('color', 'color.id', '=', 'product_attributes.id_color')
        ->leftJoin('size', 'size.id', '=', 'product_attributes.id_size')
        ->where('id_product',$request->id_pro)->where('id_color',$request->color)->where('id_size',$request->size)->first();
        $cart -> addItem($product,$request->qtn);
        $data['items']=$cart->items;
        $data['count']=$cart->count;
        $data['totalPrice']=$cart->totalPrice;
        return response()->json(['status'=>200,'data'=> $data]);
    }
    public function putCart(Request $request,Cart $cart){
        $cart -> updateItem($request->id,$request->qtn);
        $data['item']=$cart->items[$request->id];
        $data['totalPrice']=$cart->totalPrice;
        return response()->json(['status'=> 200,'data'=> $data]);
    }
    public function deleteCart(Request $request,Cart $cart){
        $cart->removeItem($request->id);
        $data['totalPrice']=$cart->totalPrice;
        $data['count']=$cart->count;
        return response()->json(['status'=> 200 ,'data'=>$data]);
    }
}
