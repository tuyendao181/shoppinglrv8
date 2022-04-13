<?php

namespace App\Http\Controllers;
use Validator;
use  App\Models\Product;
use  App\Models\Color;
use  App\Models\Size;
use  App\Models\ProductAttr;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show_product_detail(Request $request,$id){
        $list=ProductAttr::join('products', 'products.id', '=', 'product_attributes.id_product')
        ->leftJoin('color', 'color.id', '=', 'product_attributes.id_color')
        ->leftJoin('size', 'size.id', '=', 'product_attributes.id_size')
        ->where('product_attributes.id_product', '=', $id)->get();
        $color = $list->unique('id_color');
        $size = $list->unique('id_size');
        return view('page.product_detail',compact('list','color','size'));  
    }
    public function check_product(Request $request){
        $list=ProductAttr::where('id_product', '=', $request->id_product)
        ->where('id_color', '=', $request->id_color)
        ->where('id_size', '=', $request->id_size)
        ->first();
        
        if($list != null){
            $data= $list->id_atrr;
            return response()->json(["val" => $data,'status' => 200]);
        }
        else{
            return response()->json(["err" => 'error','status' => 0]);
        }
     
    }
}
