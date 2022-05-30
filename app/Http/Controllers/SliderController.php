<?php

namespace App\Http\Controllers;
use  App\Models\Slider;
use Illuminate\Http\Request;
use Validator;
class SliderController extends Controller
{
    public function list_slider(Request $request){
        $list=Slider::list_Slider();
        return view('admin.slider.list_slider',compact('list'));
    }
    public function add_slider(Request $request){
        $validator = Validator::make($request->all(), [
            'heading'       => 'required',
            'description'   => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'avatar' => 'required',
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
           
            Slider::add_Slider($filenamemain);
            $list=Slider::list_Slider();
            return view('admin.slider.list_slider_ajax',compact('list'));
            
       }
    }
    public function edit_slider(Request $request){
        $id=$request->id;
        $result=Slider::Find_Slider($id);
        return response()->json($result);
    }
    public function update_slider(Request $request){
        $id = $request->id;
        $validator = Validator::make($request->all(), [
            'heading'       => 'required',
            'description'   => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg',
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
                $filenamemain = $request->img_old;
            }
            Slider::Update_Slider($id,$filenamemain);
            $list=Slider::list_Slider();
            return view('admin.slider.list_slider_ajax',compact('list'));
       }
       
    }

   public function delete_slider(Request $request){
        $id=$request->id;
        Slider::delete_Slider($id);
        return response()->json(['status'=>200 ]);
    }
}
