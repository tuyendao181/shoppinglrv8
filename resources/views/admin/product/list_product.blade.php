@extends('admin.master_admin')
@section('content')


<div class="container-fluid">
<div id="toastt"></div>

  <div class="row row--top-40">
    <div class="col-md-12">
     
    </div>
  </div>
  <div class="row row--top-20">
    <div class="col-md-12">
      <div class="wap_search" style="display: flex;justify-content: space-between;align-items: center;">
        <form class="form-inline">
              <div class="input-group " style="border: 1px solid #ced4da;">
                <input id="tl-search" class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" style="border: none;">
                <!-- <div class="input-group-append" style="background:#fff; color: rgba(0,0,0,.5);">
                  <button class="btn btn-navbar btn-search" type="submit"  style="color: rgba(0,0,0,.5);">
                    <i class="fas fa-search"></i>
                  </button>
                </div> -->
              </div>
            </form>
       
          <div class="btn_add_fl" id="btn_add_fl"> <a class="fancybox" href="#inline1"style="    
                                                                                color: rgb(213 21 16);
                                                                                text-decoration: none;
                                                                                background-color: #daf3f8;
                                                                                font-weight: 700;
                                                                                padding:10px;
                                                                                border-radius: 12px;"
       >Add Product</a></div>
        </div>


        <div id="inline1" style="width:800px;display: none;">
          <h3 style=" text-align: center;
                      background-color: #007bff;
                      border-radius: 5px;
                      padding: 5px;
                      color: #ffffff;">
           Add Product</h3>
          <div class="mess_add" >
         
         </div>
          <form method="post" id="upload-image-form" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name Product</label>
                  <input type="text" class="form-control" id="name_product" name="name" placeholder="Enter name product">
                </div>
                <span class="text-danger error-text name_error"></span>
              
                <div class="form-group">
                  <label for="exampleInputEmail1">Price</label>
                  <input type="number" class="form-control" id="price_product" name="price" placeholder="Enter price">
                </div>
                <span class="text-danger error-text price_error"></span>
              
                <div class="form-group">
                  <label for="exampleInputEmail1">Price sale</label>
                  <input type="number" class="form-control" id="sale_product" name="price_sale" placeholder="Enter price sale">
                </div>
                <span class="text-danger error-text price_sale_error"></span>
              
                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea style="width: 100%;border: 1px solid #ced4da;
    border-radius: 0.25rem;
    box-shadow: inset 0 0 0 transparent;outline: none;padding: 6px 12px;" rows="9" cols="0" form="upload-image-form" id="description_category" name="description" placeholder="Enter description "> </textarea>
                  <!-- <input type="text" class="form-control" id="description_category" name="description" placeholder="Enter name category"> -->
                </div>
                <span class="text-danger error-text description_error"></span>
                <div class="form-group">
                  <label for="exampleInputFile">Category</label>
                  <select id="select_category" name="category_id" style="min-width: 140px;padding: 5px; border: 1px solid #ced4da; border-radius: 0.25rem;outline: none;" >
                                
                </select>
              </div>
  
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary add_product">Submit</button>
              </div>
            </form>
         
      </div>


      <div id="inline2" style="width:800px;display: none;">
        <h3 style=" text-align: center;
                    background-color: #007bff;
                    border-radius: 5px;
                    padding: 5px;
                    color: #ffffff;">
         Edit Product</h3>
        <div class="mess_add" >
       
       </div>
        <form method="post" id="upload-image-form_e" enctype="multipart/form-data">
            <div class="card-body">
              <input type="hidden" id="eId" name="id" value="">
              <div class="form-group">
                <label for="exampleInputEmail1">Name Product</label>
                <input type="text" class="form-control" id="name_product_e" name="name" placeholder="Enter name product">
              </div>
              <span class="text-danger error-text name_error"></span>
            
              <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input type="number" class="form-control" id="price_product_e" name="price" placeholder="Enter price">
              </div>
              <span class="text-danger error-text price_error"></span>
            
              <div class="form-group">
                <label for="exampleInputEmail1">Price sale</label>
                <input type="number" class="form-control" id="sale_product_e" name="price_sale" placeholder="Enter price sale">
              </div>
              <span class="text-danger error-text price_sale_error"></span>
            
              <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <textarea style="width: 100%;border: 1px solid #ced4da;
  border-radius: 0.25rem;
  box-shadow: inset 0 0 0 transparent;outline: none;padding: 6px 12px;" rows="9" cols="0" form="upload-image-form_e" id="description_product_e" name="description" placeholder="Enter description "> </textarea>
                <!-- <input type="text" class="form-control" id="description_category" name="description" placeholder="Enter name category"> -->
              </div>
              <span class="text-danger error-text description_error"></span>
              <div class="form-group">
                <label for="exampleInputFile">Category</label>
                <select id="select_category2"  name="category_id" style="min-width: 140px;padding: 5px; border: 1px solid #ced4da; border-radius: 0.25rem;outline: none;" >
                              
              </select>
            </div>

            
            

            

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary add_edit_product">Submit</button>
            </div>
          </form>
       
    </div>

      <div class="table-container">
        <table class="table">
          <div class="mess">
           
          </div>
          <thead class="table__thead">
            <tr>
              <th class="table__th"><input id="selectAll" type="checkbox" class="table__select-row"></th>
              <th class="table__th">Name</th>
              <th class="table__th">Price</th>
              <th class="table__th">Sale price</th>
              <th class="table__th">Descriptions</th>
              <th class="table__th">Status</th>
              <th class="table__th">Created at</th>
              <th class="table__th">Updated at</th>
              <th class="table__th"></th>
            </tr>
          </thead>
          <tbody class="table__tbody" id="tb_list">
         

            @foreach($list as $item_list)

            <tr class="table-row table-row--chris fl_{{$item_list->id}}">
              <td class="table-row__td">
                <input id="" type="checkbox" class="table__select-row">
              </td>
              <td class="table-row__td">
                
                <div class="table-row__info">
                  <p class="table-row__name">{{$item_list->name}}</p>
                  <!-- <span class="table-row__small">CFO</span> -->
                </div>
              </td>
              <td data-column="Policy" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">{{$item_list->price}}</p>
                  <!-- <span class="table-row__small">Basic Policy</span> -->
                </div>                
              </td>
              <td data-column="Policy" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">{{$item_list->sale_price}}</p>
                  <!-- <span class="table-row__small">Basic Policy</span> -->
                </div>                
              </td>
              <td data-column="Destination" class="table-row__td">
                {{$item_list->descriptions}}
              </td>
             
              <td data-column="Progress " id="{{$item_list->id}}" class="table-row__td">
                 @if($item_list->status == 0) 
                 <p class="table-row__progress status--green status--red status">
                   <a href="#" id="{{$item_list->id}}" class="click_active">Active</a>
                </p>
                @else
                <p class="table-row__progress status--red status">
                  <a href="#" id="{{$item_list->id}}" class="click_reject">Reject</a>
                </p> 
                @endif
            
              </td>

              <td data-column="Policy" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">{{$item_list->created_at}}</p>
                  <!-- <span class="table-row__small">Basic Policy</span> -->
                </div>                
              </td>
              <td data-column="Policy" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">{{$item_list->updated_at}}</p>
                  <!-- <span class="table-row__small">Basic Policy</span> -->
                </div>                
              </td>
              
            
              <td class="table-row__td">
                <a class="fancybox" href="#inline2" id="click_show_edit" data-id="{{$item_list->id}}">
                      <svg  version="1.1" class="table-row__edit" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve" data-toggle="tooltip" data-placement="bottom" title="Edit"><g>	<g>		<path d="M496.063,62.299l-46.396-46.4c-21.2-21.199-55.69-21.198-76.888,0l-18.16,18.161l123.284,123.294l18.16-18.161    C517.311,117.944,517.314,83.55,496.063,62.299z" style="fill: rgb(1, 185, 209);"></path>	</g></g><g>	<g>
                    <path d="M22.012,376.747L0.251,494.268c-0.899,4.857,0.649,9.846,4.142,13.339c3.497,3.497,8.487,5.042,13.338,4.143    l117.512-21.763L22.012,376.747z" style="fill: rgb(1, 185, 209);"></path>	</g></g><g>	<g>		<polygon points="333.407,55.274 38.198,350.506 161.482,473.799 456.691,178.568   " style="fill: rgb(1, 185, 209);"></polygon>	</g></g><g></g><g></g><g></g>
                    <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                </a>
                  <svg data-toggle="tooltip" data-placement="bottom" title="Delete" version="1.1" id="{{$item_list->id}}"  class="table-row__bin click_delete" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g>	<g>		<path d="M436,60h-90V45c0-24.813-20.187-45-45-45h-90c-24.813,0-45,20.187-45,45v15H76c-24.813,0-45,20.187-45,45v30    c0,8.284,6.716,15,15,15h16.183L88.57,470.945c0.003,0.043,0.007,0.086,0.011,0.129C90.703,494.406,109.97,512,133.396,512    h245.207c23.427,0,42.693-17.594,44.815-40.926c0.004-0.043,0.008-0.086,0.011-0.129L449.817,150H466c8.284,0,15-6.716,15-15v-30    C481,80.187,460.813,60,436,60z M196,45c0-8.271,6.729-15,15-15h90c8.271,0,15,6.729,15,15v15H196V45z M393.537,468.408    c-0.729,7.753-7.142,13.592-14.934,13.592H133.396c-7.792,0-14.204-5.839-14.934-13.592L92.284,150h327.432L393.537,468.408z     M451,120h-15H76H61v-15c0-8.271,6.729-15,15-15h105h150h105c8.271,0,15,6.729,15,15V120z" style="fill: rgb(158, 171, 180);"></path>	</g></g><g>	<g>		<path d="M256,180c-8.284,0-15,6.716-15,15v212c0,8.284,6.716,15,15,15s15-6.716,15-15V195C271,186.716,264.284,180,256,180z" style="fill: rgb(158, 171, 180);"></path>	</g></g><g>	<g>		<path d="M346,180c-8.284,0-15,6.716-15,15v212c0,8.284,6.716,15,15,15s15-6.716,15-15V195C361,186.716,354.284,180,346,180z" style="fill: rgb(158, 171, 180);"></path>	</g></g><g>	<g>		<path d="M166,180c-8.284,0-15,6.716-15,15v212c0,8.284,6.716,15,15,15s15-6.716,15-15V195C181,186.716,174.284,180,166,180z" style="fill: rgb(158, 171, 180);"></path>	</g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                  </svg>                
              </td>
            </tr>
            @endforeach
          
            
           
            
 
          </tbody>
        </table>
      </div>
    </div>
  </div>




</div><!-- /.container-fluid -->


<script type="text/javascript">
  $(document).ready(function() {
      $('.fancybox').fancybox();
  });

  function showMyImage(fileInput) {
        console.log('fffd');
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {           
            var file = files[i];
            var imageType = /image.*/;     
            if (!file.type.match(imageType)) {
                continue;
            }           
            var img=document.getElementById("thumbnil");            
            img.file = file;    
            var reader = new FileReader();
            reader.onload = (function(aImg) { 
                return function(e) { 
                    aImg.src = e.target.result; 
                }; 
            })(img);
            reader.readAsDataURL(file);
        }    
    }
</script>

<script>
  $( document ).ready(function() {
           $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
 
           $(document).on( "click","#btn_add_fl", function(e) {
                 e.preventDefault();
                 $('.fancybox').fancybox();
                 $('.error-text').text('');
                 $('#name_product').val('');
                 $('#price_product').val('');
                 $('#sale_product').val('');
                 $('#price_sale').val('');
                 $('#description_category').val('');
                 $('#thumbnil').attr('src','');
                 $('#tl_avatar').val('');

                 $.ajax({
                     type: "get",
                     url: "show-product",
                     data:{
                         _token: $('meta[name="csrf-token"]').attr('content'),
                       },
                     success: function(data){
                    
                      $.each(data, function( key, value ) {
                      $value=value.name;
                      $id=value.id;
                      console.log($value);
                        $('#select_category').append(' <option id="op_'+$id+'" value="'+$id+'"> '+$value+' </option> ');
                      });  
 
             
                     }
                 });
 
           });

           $(document).on( "click",".add_product", function(e) {
                 e.preventDefault();
               
                 $.ajax({
                     type: "post",
                     url: "add-product",
                     data: new FormData($('#upload-image-form')[0]),
                     contentType: false,
                     processData: false,
                     success: function(data){
                       console.log(data);
                       if(data.status == 0){
                           $.each(data.err, function( key, value ) {
                               $('span.'+key+'_error').text(value).css({"display":"block","margin-bottom":"10px","font-size":"15px"});
                           });
                         }
                      
                      else{
                          toast({
                            title: "Success!",
                            message: "You have successfully added",
                            type: "success",
                            duration: 5000
                          });
                           $('#tb_list').html(data);
                      }
                       
             
                     }
                 });
 
           });
 
           $(document).on( "click",".click_active", function(e) {
                 e.preventDefault();
                 var id = $(this).attr('id');
                 console.log('fdfdf');
                 
                 $.ajax({
                     type: "get",
                     url: "active-product",
                     data:{
                         id:id,
                         _token: $('meta[name="csrf-token"]').attr('content'),
                       },
                     success: function(data){
                         console.log(data);
                         toast({
                        title: "Success!",
                        message: "You have successfully changed the status",
                        type: "success",
                        duration: 5000
                      });
                         $('#tb_list').html(data);
                     }
                 });
         
           });
           
   
           $(document).on( "click",".click_reject", function(e) {
                 e.preventDefault();
                 var id = $(this).attr('id');
                 console.log('fdfdf');
                 
                 $.ajax({
                     type: "get",
                     url: "reject-product",
                     data:{
                         id:id,
                         _token: $('meta[name="csrf-token"]').attr('content'),
                       },
                     success: function(data){
                         console.log(data);
                      toast({
                        title: "Success!",
                        message: "You have successfully changed the status",
                        type: "success",
                        duration: 5000
                      });
                         $('#tb_list').html(data);
                     }
                 });
         
           });
           
           $(document).on( "click",".click_delete", function(e) {
                 e.preventDefault();
                 var id = $(this).attr('id');
                 console.log(id);
                 
                 $.ajax({
                     type: "get",
                     url: "delete-product",
                     data:{
                         id:id,
                         _token: $('meta[name="csrf-token"]').attr('content'),
                       },
                     success: function(data){
                         console.log(data);
                         toast({
                          title: "Success!",
                          message: "You have successfully deleted",
                          type: "success",
                          duration: 5000
                        });
                         $('.fl_'+id).remove();
                     }
                 });
         
           });
 
           $(document).on( "keyup","#tl-search", function(e) {
                 e.preventDefault();
                 $val=$('#tl-search').val();
                 console.log( $val);
                 $.ajax({
                     type: "get",
                     url: "search-product",
                     data:{
                         keyword:$val,
                         _token: $('meta[name="csrf-token"]').attr('content'),
                       },
                     beforeSend: function() {
                     
                     },
                     success: function(data){
                       if(data != ''){
                         $('#tb_list').html(data);
                        
                       }
                       else{
                         $('#tb_list').text('không có dữ liệu ... ');
                       }
                      
                     }
                 });
         
           });
         
           $(document).on( "click","#click_show_edit", function(e) {
                e.preventDefault();
                var id = $(this).attr('data-id');
                $('.fancybox2').fancybox();
                $.ajax({
                    type: "get",
                    url: "edit-product",
                    data:{
                        id:id,
                        _token: $('meta[name="csrf-token"]').attr('content'),
                      },
                    beforeSend: function() {
                        $('#name_category2').val('');
                        $('.error-text').text('');
                    },
                    success: function(data){

                      $.each(data.category, function( key, value ) {
                      $value=value.name;
                      $id=value.id;
                      console.log($value);
                        $('#select_category2').append(' <option id="edit_'+$id+'" value="'+$id+'"> '+$value+' </option> ');
                       
                      });  
                      
                       $data=data.data[0];
                       console.log($data);
                      $('#eId').val($data.id)
                       $('#name_product_e').val($data.name);
                       $('#price_product_e').val($data.price);
                       $('#sale_product_e').val($data.sale_price);
                       $('#description_product_e').val($data.descriptions);
                       $('#edit_'+$data.category_id).attr('selected','selected');
                      
                    }
                });
                
              
          });

          $(document).on( "click",".add_edit_product", function(e) {
                e.preventDefault();
              
                $.ajax({
                    type: "post",
                    url: "update-product",
                    data: new FormData($('#upload-image-form_e')[0]),
                    contentType: false,
                    processData: false,
                    
                    success: function(data){
                      console.log(data);
                      if(data.status == 0){
                          $.each(data.err, function( key, value ) {
                              $('span.'+key+'_error').text(value).css({"display":"block","margin-bottom":"10px","font-size":"15px"});
                          });
                        }
                     
                     else{
                          toast({
                            title: "Success!",
                            message: "you have edited successfully",
                            type: "success",
                            duration: 5000
                          });
                          $('#tb_list').html(data);
                     }
                      
            
                    }
                });

          });

 
 
 
      
 
 });
 </script>



      @stop