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
        return response()->json(['status'=>200]);
    }
}
