<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Color;
use  App\Models\Size;
use  App\Models\Product;
use  App\Models\ProductAttr;
use Validator;
class ProductAttrController extends Controller
{
    //

    public function list_color(Request $request){
        $list=Color::list_color();
        return view('admin.product_attr.list_color',compact('list'));
   }
   public function add_color(Request $request){
    $validator = Validator::make($request->all(), [
        'name_color' => 'required|unique:Color',
   ]);
   if ($validator->fails()) {
         return response()->json(["err" => $validator -> errors()->toArray(),'status'=>0 ]);
   }
   else{
        Color::add_Color();
        $list=Color::list_color();
        return view('admin.product_attr.list_color_ajax',compact('list'));   
    }
   }

    public function delete_color(Request $request){
        $id=$request->id;
        Color::delete_Color($id);
        return response()->json(['status'=>200 ]);
   }

    public function list_size(Request $request){
        $list=Size::list_Size();
        return view('admin.product_attr.list_size',compact('list'));
    }

    public function add_size(Request $request){
        $validator = Validator::make($request->all(), [
            'name_size' => 'required|unique:size',
        ]);
        if ($validator->fails()) {
            return response()->json(["err" => $validator -> errors()->toArray(),'status'=>0 ]);
        }
         else{
            Size::add_Size();
            $list=Size::list_Size();
            return view('admin.product_attr.list_size_ajax',compact('list'));   
        }
   }

   public function delete_size(Request $request){
        $id=$request->id;
        Size::delete_Size($id);
        return response()->json(['status'=>200 ]);
   }

   public function list_attr(){
        $list=Product::list_Product();
        return view('admin.product_attr.list_product_attr',compact('list'));
   }
   public function show_attr(Request $request,$id){
        $list=ProductAttr::join('products', 'products.id', '=', 'product_attributes.id_product')
        ->leftJoin('color', 'color.id', '=', 'product_attributes.id_color')
        ->leftJoin('size', 'size.id', '=', 'product_attributes.id_size')
        ->where('product_attributes.id_product', '=', $id)->get();

        $color  = Color::list_color();
        $size   = Size::list_Size();
        $idpro  = $id ;
        
        return view('admin.product_attr.show_attr',compact('list','color','size','idpro')); 
   }
   public function add_attr(Request $request){
    
    $validator = Validator::make($request->all(), [
        'color' => 'required',
        'size' => 'required',
        'image' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
       
   ]);
   if ($validator->fails()) {  
         return response()->json(["err" => $validator -> errors()->toArray(),'status'=>0 ]);
   }
   else{
        if ($request->hasFile('image') != "") {
            $file = $request->file('image');
            #c1 lay ten file
            // $filename = $file->getClientOriginalName(); 

            #đôi tên file vì server
            $filename = time().'.'.$file ->extension();
            # Location
            $pathname = 'uploads/' . date("Y") . '/' . date("m") . '/';

            if (!is_dir($pathname)) {
                mkdir($pathname, 0777, true);
            }
            # Upload file
            $file->move($pathname, $filename);   
            $filenamemain = date("Y") . '/' . date("m") . '/' .$filename;
        }
        else{
            $filenamemain ='';
        }
     
        $check=ProductAttr::where('id_product',$request->product)->where('id_color',$request->color)->where('id_size',$request->size)->first();
        if($check == null){
            $update = ProductAttr::add_ProductAttr($filenamemain);
            $idpro  = $request->product ;
            $list=ProductAttr::join('products', 'products.id', '=', 'product_attributes.id_product')
            ->leftJoin('color', 'color.id', '=', 'product_attributes.id_color')
            ->leftJoin('size', 'size.id', '=', 'product_attributes.id_size')
            ->where('product_attributes.id_product', '=',$idpro)->get();
    
            $color  = Color::list_color();
            $size   = Size::list_Size();
          
            return view('admin.product_attr.show_attr_ajax',compact('list','color','size','idpro'));
        }
        else{
            return response()->json(["err" =>"Attribute already exists",'status'=>0 ]);
        }
       
         
   }
}

   public function delete_attr(Request $request){
    $id=$request->id;
    ProductAttr::delete_ProductAttr($id);
    return response()->json(['status'=>200 ]);
   }



}
