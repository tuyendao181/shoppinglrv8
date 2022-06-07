<?php

namespace App\Http\Controllers;
use  Validator;
use  App\Models\Product;
use  App\Helper\Pagination;
use  App\Models\Category;
use  App\Models\Color;
use  App\Models\Size;
use  App\Models\Blog;
use  App\Models\Comment;
use  App\Models\Orders;
use  App\Models\OrderDetail;
use  Auth;
use  App\Helper;
use  App\Models\ProductAttr;
use  Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;

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
        $comment = Comment::leftjoin('account','account.id','=','comment.customer_id')
        ->where('comment.product_id','=',$id)
        ->get();

        $lq=ProductAttr::join('products', 'products.id', '=', 'product_attributes.id_product')
        ->where('products.category_id','=',$pro[0]['category_id'])
        ->get();
        $data= $lq -> unique('id_product');

        return view('page.product_detail',compact('list','color','size','pro','comment','data'));  
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

    public function category_detail(Request $request,$id,Pagination $p){
        $list=Product::
        leftJoin('category', 'category.id', '=', 'products.category_id')
        -> leftJoin('product_attributes', 'products.id', '=', 'product_attributes.id_product')
        ->leftJoin('color', 'color.id', '=', 'product_attributes.id_color')
        ->leftJoin('size', 'size.id', '=', 'product_attributes.id_size')
        ->where('category.id', '=', $id)
        ->get();

        $category = Category::where('id','=',$id)->get();
        $pro = $list->unique('id_product');
        $arr = [];
        $count = count($pro);
        $i=0;
        $pagi= $p->pagi(8,1,$count);
        foreach ($pro as $key => $value){
            $arr[$i] = $value;
            $i++;
         }
        $arr_temp=[];
        $total = $p->total_page;
        $start = $pagi['start'];
        $end = $pagi['limit'];
         for($start;$start < $end;$start++){
            if(isset($arr[$start])){
                $arr_temp[$start]=$arr[$start];
             }
         }
       
        $color = $list->unique('id_color');
        $size = $list->unique('id_size');
     
        return view('page.category',compact('arr_temp','color','size','id','total','category'));
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
    public function category_paginate(Request $request ,Pagination $p){
        $curent = $request ->index;
        $id =  $request ->id;
        $list=Product::
        leftJoin('category', 'category.id', '=', 'products.category_id')
        -> leftJoin('product_attributes', 'products.id', '=', 'product_attributes.id_product')
        ->leftJoin('color', 'color.id', '=', 'product_attributes.id_color')
        ->leftJoin('size', 'size.id', '=', 'product_attributes.id_size')
        ->where('category.id', '=', $id)
        ->get();
        $pro = $list->unique('id_product');
        $arr = [];
        $count = count($pro);
        $i=0;
        $pagi= $p->pagi(8,$curent,$count);
        foreach ($pro as $key => $value){
            $arr[$i] = $value;
            $i++;
        }
        $arr_temp=[];
        $total = $p->total_page;
        $start = $pagi['start'];
        $end = $pagi['limit'];
         for($start;$start < $end;$start++){
             if(isset($arr[$start])){
                $arr_temp[$start]=$arr[$start];
             }
         }
        $color = $list->unique('id_color');
        $size = $list->unique('id_size');
     
        return view('page.category_paginate',compact('arr_temp','color','size','id','total'));
    }

    public function blog_detail(Request $request,$id){
        $data =  Blog::Find_Blog($id);
        $result =  Blog::limit(6)->get();
        return view('page.blog_detail',compact('data','result'));
    }

    public function comment_product(Request $request){
        $validator = Validator::make($request->all(), [
            'content' => 'required',
       ]);
       if ($validator->fails()) {
             return response()->json(["err" => $validator -> errors()->toArray(),'status'=>0 ]);
       }
       else{
            Comment::create([
                'content'=> $request->content,
                'product_id'=> $request->id,
                'customer_id'=> Auth::user()->id
            ]);
            $comment = Comment::leftjoin('account','account.id','=','comment.customer_id')
            ->where('comment.product_id','=',$request->id)
            ->get();
            return response()->json(["data"=>$comment,'status'=>200 ]);

       }
  
           
           
           
    }
    public function history_detail(Request $request){
        if(Auth::check()){
            $idc = Auth::User()->id;
            $pro=Orders::
              select('products.name','orders_detail.color','orders_detail.size','orders_detail.price','orders_detail.quantity','orders_detail.created_at')
            ->leftJoin('orders_detail', 'orders.id', '=', 'orders_detail.order_id')
            ->leftJoin('product_attributes','product_attributes.id_atrr','=','orders_detail.product_id')
            ->leftJoin('account','account.id','=','orders.customer_id')
            ->leftJoin('products','products.id','=','product_attributes.id_product')
            ->where('orders.customer_id','=',$idc)
            ->orderBy('orders_detail.created_at','desc')
            ->get();
        }else{
            $pro='';
        }
        return view('page.history',compact('pro'));
    }
    public function blog(Request $request){
        $blog = Blog::all();
       return view('page.blog',compact('blog'));
    }
}
