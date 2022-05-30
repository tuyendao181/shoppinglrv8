<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use  App\Models\Blog;
use Validator;
class BlogController extends Controller
{
    public function list_blog(Request $request){
        $list=Blog::list_Blog();
        return view('admin.blog.list_blog',compact('list'));
    }
    public function add_blog(Request $request){
    
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'content'       => 'required',
            'description'   => 'required',
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
           
            Blog::add_Blog($filenamemain);
            $list=Blog::list_Blog();
            return view('admin.blog.list_blog_ajax',compact('list'));
            
       }
    }
    public function edit_blog(Request $request){
        $id=$request->id;
        $result=Blog::Find_Blog($id);
        return response()->json($result);
    }
    public function update_blog(Request $request){
        $id = $request->id;
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'content'       => 'required',
            'description'   => 'required',
            'avatar'        => 'image|mimes:jpeg,png,jpg,gif,svg',
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
            Blog::Update_Blog($id,$filenamemain);
            $list=Blog::list_Blog();
            return view('admin.blog.list_blog_ajax',compact('list'));
       }
       
    }

   public function delete_blog(Request $request){
        $id=$request->id;
        Blog::delete_Blog($id);
        return response()->json(['status'=>200 ]);
    }
}
