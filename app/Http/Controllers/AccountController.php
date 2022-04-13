<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
use Validator;

class AccountController extends Controller
{
    public function list_account(){
        $list_account=User::List_Account();

        // return response()->json([
        //     'name' => 'ac',
        //     'state' => 'CA',
        // ]);
        return view('admin.account.list_account',compact('list_account'));
    }
    public function unactive_account(Request $request){
        $id=$request->id;
        User::Unactive_account($id);
        $list_account=User::List_Account();
        return view('admin.account.list_account_ajax',compact('list_account'));

    }
    public function active_account(Request $request){
        $id=$request->id;
        User::Active_account($id);
        $list_account=User::List_Account();
        return view('admin.account.list_account_ajax',compact('list_account'));
    }

    public function admin_account(Request $request,User $user){
    
    //    dd( $request->id);
        $id=$request->id;
        $user->Admin_account($id);
        $list_account=User::List_Account();
        // $list_account=$user->Tim_Account($id);
        return view('admin.account.list_account_ajax',compact('list_account'));
        // return response()->json(["data" => $list_account, "mess" => "Change permissions successfully"]);
        // return redirect()->route('list_account');
    }
    public function user_account(Request $request,User $user){
        $id=$request->id;
        $user->User_account($id);
        $list_account=User::List_Account();
        return view('admin.account.list_account_ajax',compact('list_account'));
        // $list_account=$user->Tim_Account($id);
        // return response()->json(["data" => $list_account, "mess" => "Change permissions successfully"]);
        // return redirect()->route('list_account');
    }
    public function delete_account(Request $request){
        $id=$request->id;
        User::Delete_account($id);
        $list_account=User::List_Account();
        return view('admin.account.list_account_ajax',compact('list_account'));

    }

    public function search_account(Request $request){
        $keyword=$request->keyword;
        $out=User::Search_account($keyword);
        $output='';
        foreach($out as $item_list){

            $output .= '
            <tr class="table-row table-row--chris fl_'.$item_list->id.'">
            <td class="table-row__td">
                <input id="" type="checkbox" class="table__select-row">
            </td>
            <td class="table-row__td">
                <div class="table-row__img"></div>
                <div class="table-row__info">
                <p class="table-row__name">'.$item_list->name.'</p>
                <!-- <span class="table-row__small">CFO</span> -->
                </div>
            </td>
            <td data-column="Policy" class="table-row__td">
                <div class="">
                <p class="table-row__policy">'.$item_list->email.'</p>
                <!-- <span class="table-row__small">Basic Policy</span> -->
                </div>                
            </td>
            <td data-column="Destination" class="table-row__td">
              '.$item_list->phone.'
            </td>
            <td data-column="Policy status "   class="table-row__td flex_dt">
            '.($item_list->role == 0  
               ?  
                   '<p class="table-row__p-status status--blue status " >
                   <a href="#" id="{{$item_list->id}}" class="click_user status--blue">User</a>
                   </p>'
              
               :
                   '<p class="table-row__p-status status--green  status "  >
                       <a href="#" id="{{$item_list->id}}" class="click_admin status--green ">Admin</a>
                   </p>'
                

             ).'
             
            </td>
            <td data-column="Progress " id="{{$item_list->id}}" class="table-row__td">
                '.($item_list->status == 0
                ?
                       ' <p class="table-row__progress status--green status--red status">
                       <a href="#" id="'.$item_list->id.'" class="click_active">Active</a>
                       </p>'
                :
                       ' <p class="table-row__progress status--red status">
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
            </td>
                    <td class="table-row__td">
                    
                    <svg   id="'.$item_list->id.'" version="1.1" class="table-row__edit" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve" data-toggle="tooltip" data-placement="bottom" title="Edit"><g>	<g>		<path d="M496.063,62.299l-46.396-46.4c-21.2-21.199-55.69-21.198-76.888,0l-18.16,18.161l123.284,123.294l18.16-18.161    C517.311,117.944,517.314,83.55,496.063,62.299z" style="fill: rgb(1, 185, 209);"></path>	</g></g><g>	<g>
                    <path d="M22.012,376.747L0.251,494.268c-0.899,4.857,0.649,9.846,4.142,13.339c3.497,3.497,8.487,5.042,13.338,4.143    l117.512-21.763L22.012,376.747z" style="fill: rgb(1, 185, 209);"></path>	</g></g><g>	<g>		<polygon points="333.407,55.274 38.198,350.506 161.482,473.799 456.691,178.568   " style="fill: rgb(1, 185, 209);"></polygon>	</g></g><g></g><g></g><g></g>
                    <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                    
                    <svg data-toggle="tooltip" data-placement="bottom" title="Delete" version="1.1" id="'.$item_list->id.'"  class="table-row__bin click_delete" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g>	<g>		<path d="M436,60h-90V45c0-24.813-20.187-45-45-45h-90c-24.813,0-45,20.187-45,45v15H76c-24.813,0-45,20.187-45,45v30    c0,8.284,6.716,15,15,15h16.183L88.57,470.945c0.003,0.043,0.007,0.086,0.011,0.129C90.703,494.406,109.97,512,133.396,512    h245.207c23.427,0,42.693-17.594,44.815-40.926c0.004-0.043,0.008-0.086,0.011-0.129L449.817,150H466c8.284,0,15-6.716,15-15v-30    C481,80.187,460.813,60,436,60z M196,45c0-8.271,6.729-15,15-15h90c8.271,0,15,6.729,15,15v15H196V45z M393.537,468.408    c-0.729,7.753-7.142,13.592-14.934,13.592H133.396c-7.792,0-14.204-5.839-14.934-13.592L92.284,150h327.432L393.537,468.408z     M451,120h-15H76H61v-15c0-8.271,6.729-15,15-15h105h150h105c8.271,0,15,6.729,15,15V120z" style="fill: rgb(158, 171, 180);"></path>	</g></g><g>	<g>		<path d="M256,180c-8.284,0-15,6.716-15,15v212c0,8.284,6.716,15,15,15s15-6.716,15-15V195C271,186.716,264.284,180,256,180z" style="fill: rgb(158, 171, 180);"></path>	</g></g><g>	<g>		<path d="M346,180c-8.284,0-15,6.716-15,15v212c0,8.284,6.716,15,15,15s15-6.716,15-15V195C361,186.716,354.284,180,346,180z" style="fill: rgb(158, 171, 180);"></path>	</g></g><g>	<g>		<path d="M166,180c-8.284,0-15,6.716-15,15v212c0,8.284,6.716,15,15,15s15-6.716,15-15V195C181,186.716,174.284,180,166,180z" style="fill: rgb(158, 171, 180);"></path>	</g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                    <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                    </svg>                
                    </td>
            </tr>
            ';
        }
        return response()->json($output);
   
    }
   
    public function edit_account(Request $request){
        $id = $request->id;
        $ruler =User::Tim_Account($id);
        return response()->json($ruler);

   
    }
    public function update_account(Request $request){
        $id = $request->id;
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required',
            // 'email' => 'required|email',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg',
       ]);
       if ($validator->fails()) {
            // validate fails
                 // return $validator -> errors()->all();
                //  dd($validator);
                //  return redirect()->back() ->withErrors($validator);
               
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
            
        
            $update = User::Update_Account($id,$filenamemain);
        
            $list_account=User::List_Account();
            return view('admin.account.list_account_ajax',compact('list_account'));
            
       }


      
        
    }
}
