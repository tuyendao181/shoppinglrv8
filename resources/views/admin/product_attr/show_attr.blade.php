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
                     ">
           Add Product</h3>
       
          <form method="post" id="upload-image-form" enctype="multipart/form-data">
              <div class="card-body">
              <span class="text-danger error-text name_error"></span>
              <div class="divwap" style="display: flex;column-gap: 40px;">
                <input type="hidden" id="product_id" name="product" value="{{$idpro}}" data-url="{{route('add_attr')}}">
                <div class="form-group">
                    <label for="exampleInputFile">Color</label>
                    <select id="select_color" name="color" style="min-width: 140px;padding: 5px; border: 1px solid #ced4da; border-radius: 0.25rem;outline: none;" >
                    @foreach($color as $item)
                      <option data-id="{{$item->id}}" value="{{$item->id}}">{{$item->name_color}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Size</label>
                    <select id="select_size" name="size" style="min-width: 140px;padding: 5px; border: 1px solid #ced4da; border-radius: 0.25rem;outline: none;" >
                    @foreach($size as $item)
                      <option data-id="{{$item->id}}" value="{{$item->id}}">{{$item->name_size}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group" style="display:unset;">
                    <input type="file" accept="image/*" id="tl_avatar" name="image"onchange="showMyImage(this)" value="" />
                    <span class="text-danger error-text avatar_error"></span>
                    <br/>
                    <img id="thumbnil" style="width:20%; margin-top:10px;"  src="dist/img/AdminLTELogo.png" alt="image"/>
                  </div>
              </div>

              
  
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary add_product">Submit</button>
              </div>
            </form>
         
      </div>

      <div class="table-container">
        <table class="table">
        
          <thead class="table__thead">
            <tr>
              <th class="table__th"><input id="selectAll" type="checkbox" class="table__select-row"></th>
              <th class="table__th">Image</th>
              <th class="table__th">Color</th>
              <th class="table__th">Size</th>
              <th class="table__th">Created at</th>
              <th class="table__th">Updated at</th>
              <th class="table__th"></th>
            </tr>
          </thead>
          <tbody class="table__tbody" id="tb_list">
         

            @foreach($list as $item_list)

            <tr class="table-row table-row--chris fl_{{$item_list->id_atrr}}">
              <td class="table-row__td">
                <input id="" type="checkbox" class="table__select-row">
              </td>
              <td class="table-row__td">
                
              @if($item_list->image != null)
                <div class="table-row__img" style="background:url('{{url('/uploads/')}}/{{ $item_list->image}}'); background-size: cover;"> </div>
               @else
               <div class="table-row__img"> </div>
               @endif
              </td>
              <td data-column="Policy" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">{{$item_list->name_color}}</p>
                  <!-- <span class="table-row__small">Basic Policy</span> -->
                </div>                
              </td>
              <td data-column="Policy" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">{{$item_list->name_size}}</p>
                  <!-- <span class="table-row__small">Basic Policy</span> -->
                </div>                
              </td>
             
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
               
                  <svg data-toggle="tooltip" data-placement="bottom" title="Delete" data-url="{{route('delete_attr')}}" version="1.1" id="{{$item_list->id_atrr}}"  class="table-row__bin click_delete" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g>	<g>		<path d="M436,60h-90V45c0-24.813-20.187-45-45-45h-90c-24.813,0-45,20.187-45,45v15H76c-24.813,0-45,20.187-45,45v30    c0,8.284,6.716,15,15,15h16.183L88.57,470.945c0.003,0.043,0.007,0.086,0.011,0.129C90.703,494.406,109.97,512,133.396,512    h245.207c23.427,0,42.693-17.594,44.815-40.926c0.004-0.043,0.008-0.086,0.011-0.129L449.817,150H466c8.284,0,15-6.716,15-15v-30    C481,80.187,460.813,60,436,60z M196,45c0-8.271,6.729-15,15-15h90c8.271,0,15,6.729,15,15v15H196V45z M393.537,468.408    c-0.729,7.753-7.142,13.592-14.934,13.592H133.396c-7.792,0-14.204-5.839-14.934-13.592L92.284,150h327.432L393.537,468.408z     M451,120h-15H76H61v-15c0-8.271,6.729-15,15-15h105h150h105c8.271,0,15,6.729,15,15V120z" style="fill: rgb(158, 171, 180);"></path>	</g></g><g>	<g>		<path d="M256,180c-8.284,0-15,6.716-15,15v212c0,8.284,6.716,15,15,15s15-6.716,15-15V195C271,186.716,264.284,180,256,180z" style="fill: rgb(158, 171, 180);"></path>	</g></g><g>	<g>		<path d="M346,180c-8.284,0-15,6.716-15,15v212c0,8.284,6.716,15,15,15s15-6.716,15-15V195C361,186.716,354.284,180,346,180z" style="fill: rgb(158, 171, 180);"></path>	</g></g><g>	<g>		<path d="M166,180c-8.284,0-15,6.716-15,15v212c0,8.284,6.716,15,15,15s15-6.716,15-15V195C181,186.716,174.284,180,166,180z" style="fill: rgb(158, 171, 180);"></path>	</g></g><g></g><g></g><g></g><g></g><g></g><g></g>
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
 
          

           $(document).on( "click",".add_product", function(e) {
                 e.preventDefault();
                 $url=$('#product_id').attr('data-url');
                 console.log( $url);
                
                 $.ajax({
                     type: "post",
                     url: $url,
                     data: new FormData($('#upload-image-form')[0]),
                     contentType: false,
                     processData: false,
                     beforeSend: function() {
                      $('span.name_error').text('');
                    },
                     success: function(data){
                       console.log(data);
                       if(data.status == 0){
                            $('span.name_error').text(data.err).css({"display":"block","margin-bottom":"10px","font-size":"15px"});
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
 

           
           $(document).on( "click",".click_delete", function(e) {
                 e.preventDefault();
                 var id = $(this).attr('id');
                 var url =$(this).attr('data-url');
                 console.log(id);
                 
                 $.ajax({
                     type: "get",
                     url: url,
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
 });
 </script>
@stop