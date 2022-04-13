<?php

namespace App\Http\Controllers;
use  App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Validator;
use  App\Models\Product;
use  App\Models\Color;
use  App\Models\Size;
use  App\Models\ProductAttr;

class HomeController extends Controller
{
    //
    public function index(){

        $list=ProductAttr::join('products', 'products.id', '=', 'product_attributes.id_product')
        ->leftJoin('color', 'color.id', '=', 'product_attributes.id_color')
        ->leftJoin('size', 'size.id', '=', 'product_attributes.id_size')
        ->get();
        $data= $list -> unique('id_product');
       
        return view('page.home',compact('data'));  
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

}
