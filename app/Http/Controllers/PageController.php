<?php

namespace App\Http\Controllers;
use Validator;
use  App\Models\Product;
use  App\Models\Category;
use  App\Models\Color;
use  App\Models\Size;
use  App\Models\ProductAttr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function show_product_detail(Request $request,$id){
        $list=ProductAttr::join('products', 'products.id', '=', 'product_attributes.id_product')
        ->leftJoin('color', 'color.id', '=', 'product_attributes.id_color')
        ->leftJoin('size', 'size.id', '=', 'product_attributes.id_size')
        ->where('product_attributes.id_product', '=', $id)->get();
        $color = $list->unique('id_color');
        $size = $list->unique('id_size');
        // $pro =Product::find($id);
        $pro=Product::where('id','=',$id)->get();
        // dd( $product );
        return view('page.product_detail',compact('list','color','size','pro'));  
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

    public function category_detail(Request $request,$id){
        $list=Category::join('products', 'products.category_id', '=', 'category.id')
        ->join('product_attributes', 'product_attributes.id_product', '=', 'products.id')
        ->leftJoin('color', 'color.id', '=', 'product_attributes.id_color')
        ->leftJoin('size', 'size.id', '=', 'product_attributes.id_size')
        ->where('category.id', '=', $id)->get();
        $pro = $list->unique('id_product');
        $color = $list->unique('id_color');
        $size = $list->unique('id_size');
        return view('page.category',compact('pro','color','size','id'));
    }
    public function category_filter(Request $request){
        $size= $request->size ?? '' ;
        $data = ['category.id' =>  $request->id_category];
        $filter = 'name';
        $type = 'asc';
        
        // dd($filter);
        if($request->ajax()){
            if($request->filled('id_color')){ 
                $data = array_merge($data,['product_attributes.id_color' => $request->id_color]);
            }
            if($request->filled('id_size') ){
                $data = array_merge($data,['product_attributes.id_size' => $request->id_size]);
            }
            if($request->filled('from')){
                $data = array_merge($data,[['products.price','>=',$request->from]]);
            }
            if($request->filled('to')){
                $data = array_merge($data,[['products.price','<',$request->to]]);
            }
            if($request->filled('filter')){
              
                if($request->filter == 'sort_by_newness'){
                    $filter='created_at';
                }
                if($request->filter == 'price_low_to_high'){
                    $filter='price';
                    $type = 'asc';
                }
                if($request->filter == 'price_high_to_low'){
                    $filter='price';
                    $type = 'desc';
                }
               
            }
        }
        // DB::enableQueryLog();
        $list=Category::join('products', 'products.category_id', '=', 'category.id')
        ->join('product_attributes', 'product_attributes.id_product', '=', 'products.id')
        ->leftJoin('color', 'color.id', '=', 'product_attributes.id_color')
        ->leftJoin('size', 'size.id', '=', 'product_attributes.id_size')
        // ->where(['category.id' =>  $request->id_category])
        ->where($data)
        ->orderBy("products.$filter","$type")
        ->get();
        // dd(DB::getQueryLog($list));
        $pro = $list->unique('id_product');
        return view('page.category_ajax',compact('pro'));
       
    }
}
