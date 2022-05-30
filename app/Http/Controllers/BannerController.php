<?php

namespace App\Http\Controllers;
use  App\Models\Banner;
use Validator;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function list_banner(Request $request){
        $list=Banner::list_Banner();
        return view('admin.banner.list_banner',compact('list'));
    }
    public function add_banner(Request $request){
        $validator = Validator::make($request->all(), [
            'avatar'        => 'image|mimes:jpeg,png,jpg,gif,svg',
            'avatar'        => 'required',
       ]);
       if ($validator->fails()) {
             return response()->json(["err" => $validator -> errors()->toArray(),'status'=>0 ]);
       }
       else{
  
            if ($request->hasFile('avatar') != "") {
                 $file = $request->file('avatar');
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
           
            Banner::add_Banner($filenamemain);
            $list=Banner::list_Banner();
            return view('admin.banner.list_banner_ajax',compact('list'));
            
       }
    }
    public function delete_banner(Request $request){
        $id=$request->id;
        Banner::delete_Banner($id);
        return response()->json(['status'=>200 ]);
    }
}
