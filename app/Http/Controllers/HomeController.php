<?php

namespace App\Http\Controllers;
use  App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Validator;
use  App\Models\Product;
use  App\Models\Category;
use  App\Models\Color;
use  App\Models\Slider;
use  App\Models\Size;
use  App\Models\Banner;
use  App\Models\Blog;
use  App\Models\ProductAttr;

class HomeController extends Controller
{
    //
    public function index(){

        $list=ProductAttr::join('products', 'products.id', '=', 'product_attributes.id_product')
        ->get();
        $data= $list -> unique('id_product');

        $new=ProductAttr::join('products', 'products.id', '=', 'product_attributes.id_product') 
        ->orderBy('product_attributes.created_at', 'desc')
        ->get();
        $data_new = $new -> unique('id_product');

        $i=0;
        $arr_new = [];
        foreach($data_new as $val){
            if($i < 8){
                $arr_new[$i] = $val ;
                $i++;
            }
        }

        $sale=ProductAttr::join('products', 'products.id', '=', 'product_attributes.id_product') 
        ->orderBy('products.price', 'asc')
        ->get();
        $sale_price = $sale -> unique('id_product');
        $arr_price=[];
        $p=0;
        foreach($sale_price as $val){
            if($p < 8){
                $arr_price[$p] = $val ;
                $p++;
            }
        }
      

        $list_category = Category::where('status',0)->limit(3)->get();
        $slider = Slider::list_Slider();
        $banner = Banner::limit(4)->get();

        $blog = Blog::get();
        return view('page.home',compact('data','list_category','slider','banner','blog','arr_new','arr_price'));  
    }
    public function postregister(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'email' => 'required|email|unique:account|' 
       ]);
       if ($validator->fails()) {
            // validate fails
                 // return $validator -> errors()->all();
                //  dd($validator);
                 return redirect()->back() ->withErrors($validator);
               
            //  return response()->json(["err" => $validator -> errors()->toArray(),'status'=>0 ]);
       }
       else{
            $test =User::Register();
          
            return redirect()->route('login');
       }

    }
    public function register(){
    
        return view('formregister');  
    }
    public function login(){
     return view('formlogin');
		
    }
    public function postlogin(){
        $data=['email'=> request('email'),'password'=> request('password')];
		$remember= request('remember') ? true : false;
		$check=Auth::attempt($data);
		if($check){
			return redirect()->route('home');
		}
        else{
            return redirect()->back()->with('error','Error!! Account login password failed.');
        }
	

    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

}
