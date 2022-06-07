<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Product;
use  App\Models\Category;

use Validator;
class ProductController extends Controller
{
    public function show_product(){
        $result=Category::list_Category();
        // $result=Product::list_Product();
        return response()->json($result);
        // return view('admin.product.list_product',compact('list'));
   }
  
   public function list_product(){
        $list=Product::list_Product();
        return view('admin.product.list_product',compact('list'));
   }

   public function add_product(Request $request){

     $validator = Validator::make($request->all(), [
          'name' => 'required',
          'price' => 'required',
          'price_sale' => 'required',
          'price_sale' => 'required',
          'description'=>'required',
          // 'email' => 'required|email',
         
     ]);

     // dd($request->all());
     if ($validator->fails()) {
          // validate fails
               // return $validator -> errors()->all();
              //  dd($validator);
              //  return redirect()->back() ->withErrors($validator);
             
           return response()->json(["err" => $validator -> errors()->toArray(),'status'=>0 ]);
     }
     else{

        
           $update = Product::add_Product();
             
           $list=Product::list_Product();
           return view('admin.product.list_ajax_product',compact('list'));

     }

    
        
  }
  public function delete_product(Request $request){
     $id=$request->id;
     Product::delete_Product($id);
     $list=Product::list_Product();
     return view('admin.product.list_ajax_product',compact('list'));
  }

  public function search_product(Request $request){
     $keyword=$request->keyword;
     $out=Product::Search_Product($keyword);
     $output='';
    
   
     foreach($out as $item_list){

         $output .= '
         <tr class="table-row table-row--chris fl_'.$item_list->id.'">
         <td class="table-row__td">
           <input id="" type="checkbox" class="table__select-row">
         </td>
         <td class="table-row__td">
         
          
           <div class="table-row__info">
             <p class="table-row__name">'.$item_list->name.'</p>
             <!-- <span class="table-row__small">CFO</span> -->
           </div>
         </td>
         <td data-column="Policy" class="table-row__td">
           <div class="">
             <p class="table-row__policy">'.$item_list->price.'</p>
             <!-- <span class="table-row__small">Basic Policy</span> -->
           </div>                
         </td>
         <td data-column="Policy" class="table-row__td">
           <div class="">
             <p class="table-row__policy">'.$item_list->sale_price.'</p>
             <!-- <span class="table-row__small">Basic Policy</span> -->
           </div>                
         </td>
         <td data-column="Destination" class="table-row__td" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width:200px">
           '.$item_list->descriptions.'
         </td>
        
         <td data-column="Progress " id="'.$item_list->id.'" class="table-row__td">
          
            '.($item_list->status == 0 
            ? 
            ' <p class="table-row__progress status--green status--red status">
                    <a href="#" id="'.$item_list->id.'" class="click_active">Active</a>
               </p>'
            :
               '<p class="table-row__progress status--red status">
               <a href="#" id="'.$item_list->id.'" class="click_reject">Reject</a>
               </p> '
            
            ).'
           
         
       
         </td>
       
         <td data-column="Policy" class="table-row__td">
           <div class="">
             <p class="table-row__policy">'.$item_list->created_at.'</p>
             <!-- <span class="table-row__small">Basic Policy</span> -->
           </div>                
         </td>
         <td data-column="Policy" class="table-row__td">
           <div class="">
             <p class="table-row__policy">'.$item_list->updated_at.'</p>
             <!-- <span class="table-row__small">Basic Policy</span> -->
           </div>                
         </td>
         
       
         <td class="table-row__td">
           <a class="fancybox" href="#inline1" id="click_show_edit" data-id="'.$item_list->id.'">
                 <svg  version="1.1" class="table-row__edit" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve" data-toggle="tooltip" data-placement="bottom" title="Edit"><g>	<g>		<path d="M496.063,62.299l-46.396-46.4c-21.2-21.199-55.69-21.198-76.888,0l-18.16,18.161l123.284,123.294l18.16-18.161    C517.311,117.944,517.314,83.55,496.063,62.299z" style="fill: rgb(1, 185, 209);"></path>	</g></g><g>	<g>
               <path d="M22.012,376.747L0.251,494.268c-0.899,4.857,0.649,9.846,4.142,13.339c3.497,3.497,8.487,5.042,13.338,4.143    l117.512-21.763L22.012,376.747z" style="fill: rgb(1, 185, 209);"></path>	</g></g><g>	<g>		<polygon points="333.407,55.274 38.198,350.506 161.482,473.799 456.691,178.568   " style="fill: rgb(1, 185, 209);"></polygon>	</g></g><g></g><g></g><g></g>
               <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
           </a>
             <svg data-toggle="tooltip" data-placement="bottom" title="Delete" version="1.1" id="'.$item_list->id.'"  class="table-row__bin click_delete" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g>	<g>		<path d="M436,60h-90V45c0-24.813-20.187-45-45-45h-90c-24.813,0-45,20.187-45,45v15H76c-24.813,0-45,20.187-45,45v30    c0,8.284,6.716,15,15,15h16.183L88.57,470.945c0.003,0.043,0.007,0.086,0.011,0.129C90.703,494.406,109.97,512,133.396,512    h245.207c23.427,0,42.693-17.594,44.815-40.926c0.004-0.043,0.008-0.086,0.011-0.129L449.817,150H466c8.284,0,15-6.716,15-15v-30    C481,80.187,460.813,60,436,60z M196,45c0-8.271,6.729-15,15-15h90c8.271,0,15,6.729,15,15v15H196V45z M393.537,468.408    c-0.729,7.753-7.142,13.592-14.934,13.592H133.396c-7.792,0-14.204-5.839-14.934-13.592L92.284,150h327.432L393.537,468.408z     M451,120h-15H76H61v-15c0-8.271,6.729-15,15-15h105h150h105c8.271,0,15,6.729,15,15V120z" style="fill: rgb(158, 171, 180);"></path>	</g></g><g>	<g>		<path d="M256,180c-8.284,0-15,6.716-15,15v212c0,8.284,6.716,15,15,15s15-6.716,15-15V195C271,186.716,264.284,180,256,180z" style="fill: rgb(158, 171, 180);"></path>	</g></g><g>	<g>		<path d="M346,180c-8.284,0-15,6.716-15,15v212c0,8.284,6.716,15,15,15s15-6.716,15-15V195C361,186.716,354.284,180,346,180z" style="fill: rgb(158, 171, 180);"></path>	</g></g><g>	<g>		<path d="M166,180c-8.284,0-15,6.716-15,15v212c0,8.284,6.716,15,15,15s15-6.716,15-15V195C181,186.716,174.284,180,166,180z" style="fill: rgb(158, 171, 180);"></path>	</g></g><g></g><g></g><g></g><g></g><g></g><g></g>
           <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
             </svg>                
         </td>
        
         ';
     }
     return response()->json($output);

 }


 public function active_product(Request $request ){
     $id=$request->id;
     Product::active_Product($id);
     $list=Product::list_Product();
     return view('admin.product.list_ajax_product',compact('list'));
   
}
public function reject_product(Request $request ){
     $id=$request->id;
     Product::reject_Product($id);
     $list=Product::list_Product();
     return view('admin.product.list_ajax_product',compact('list'));

}
public function edit_product(Request $request){
     $id=$request->id;
     $cate=Category::list_Category();
     $result=Product::Find_Product($id);
     return response()->json(['data' => $result, 'category' =>  $cate]);
     
}
public function update_product(Request $request){
     $id = $request->id;
     // dd($request->all());
     $validator = Validator::make($request->all(), [
          'name' => 'required',
          'price' => 'required|digits_between:1,5',
          'price_sale' => 'required',
          'price_sale' => 'required',
          'description'=>'required',
          // 'email' => 'required|email',
         
    ]);
    if ($validator->fails()) {
         // validate fails
              // return $validator -> errors()->all();
             //  dd($validator);
             //  return redirect()->back() ->withErrors($validator);
            
          return response()->json(["err" => $validator -> errors()->toArray(),'status'=>0 ]);
    }
    else{

       $update = Product::Update_Product($id);
       $list=Product::list_Product();
       return view('admin.product.list_ajax_product',compact('list'));
    }

}

}
