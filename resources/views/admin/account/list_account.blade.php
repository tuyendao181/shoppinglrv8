@extends('admin.master_admin')
@section('content')


<div class="container-fluid">
  <div class="row row--top-40">
    <div class="col-md-12">
   
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
     
          
    </div>
  </div>
  <div class="row row--top-20">
    <div class="col-md-12">
      <div class="table-container">
        <table class="table">
          <div class="mess">
           
          </div>
          <thead class="table__thead">
            <tr>
              <th class="table__th"><input id="selectAll" type="checkbox" class="table__select-row"></th>
              <th class="table__th">Name</th>
              <th class="table__th">Email</th>
              <th class="table__th">Phone</th>
              <th class="table__th">Policy</th>
              <th class="table__th">Status</th>
              <th class="table__th">Created at</th>
              <th class="table__th">Updated at</th>
              <th class="table__th"></th>
            </tr>
          </thead>
          <tbody class="table__tbody" id="tb_list">

            @foreach($list_account as $item_list)

            <tr class="table-row table-row--chris fl_{{$item_list->id}}">
              <td class="table-row__td">
                <input id="" type="checkbox" class="table__select-row">
              </td>
              <td class="table-row__td">
                @if($item_list->avatar != null)
                <div class="table-row__img" style="background:url('{{url('/uploads/')}}/{{ $item_list->avatar}}'); background-size: cover;"> </div>
               @else
               <div class="table-row__img"> </div>
               @endif
                <div class="table-row__info">
                  <p class="table-row__name">{{$item_list->name}}</p>
                  <!-- <span class="table-row__small">CFO</span> -->
                </div>
              </td>
              <td data-column="Policy" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">{{$item_list->email}}</p>
                  <!-- <span class="table-row__small">Basic Policy</span> -->
                </div>                
              </td>
              <td data-column="Destination" class="table-row__td">
                {{$item_list->phone}}
              </td>
              <td data-column="Policy status "   class="table-row__td flex_dt">
                @if($item_list->role == 0)
                <p class="table-row__p-status status--blue status " >
                  <a href="#" id="{{$item_list->id}}" class="click_user status--blue">User</a>
                </p>
                  @else
                  <p class="table-row__p-status status--green  status "  >
                      <a href="#" id="{{$item_list->id}}" class="click_admin status--green ">Admin</a>
                  </p>
                  @endif
              
                
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
                <a class="fancybox" href="#inline1" id="click_show_edit" data-id="{{$item_list->id}}">
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
<!-- 
  form edit accoutn -->
  <div id="inline1" style="width:600px;display: none;">
  <div class="mess_update"></div>
  <form  method="post" id="upload-image-form" enctype="multipart/form-data">
    
    @csrf
              <div class="card-body">
              <input type="hidden" id="custId" name="id" value="">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="tl_name"  name="name"placeholder="Enter name">
                  <span class="text-danger error-text name_error"></span>
                
                </div>
                <div class="form-group">
                  <label for="name">Phone</label>
                  <input type="text" class="form-control" id="tl_phone"  name="phone"placeholder="Enter phone">
                  <span class="text-danger error-text phone_error"></span>
                
                </div>
                <!-- <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" id="tl_email" name="email" placeholder="Enter email">
                  <span class="text-danger error-text email_error"></span>
                
                </div> -->
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="tl_password"   name="password" placeholder="Password">
                  <span class="text-danger error-text password_error"></span>
                
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Avatar</label>
                  <div class="input-group" style="display:unset;">
                  <input type="file" accept="image/*" id="tl_avatar" name="avatar"onchange="showMyImage(this)" value="" />
                <br/>
                <img id="thumbnil" style="width:20%; margin-top:10px;"  src="dist/img/AdminLTELogo.png" alt="image"/>
      
                    <!-- <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div> -->
                  </div>
                </div>
                <!-- <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary " data-id="{{$item_list->id}}" id="btn-update">Submit</button>
              </div>
            </form>
      </div>



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

          $(document).on( "click","#click_show_edit", function(e) {
                e.preventDefault();
                $('.fancybox').fancybox();
                $id = $(this).attr('data-id');
              console.log($id);
                $.ajax({
                    type: "get",
                    url: "edit-account",
                    data:{
                        id:$id,
                        _token: $('meta[name="csrf-token"]').attr('content'),
                      },
                    success: function(data){
                       $data=data[0];
                       console.log($data);
                       $('.error-text').text('');
                       $('#tl_name').val($data.name);
                       $('#tl_phone').val($data.phone);
                       $('#tl_email').val($data.email);
                       $('#tl_password').val($data.password);custId
                       $('#custId').val($id);

            
                    }
                });

          });

          $(document).on( "click","#btn-update", function(e) {
                e.preventDefault();
                $id = $('#click_show_edit').attr('data-id');
                $.ajax({
                    type: "post",
                    url: "update-account",
                    data: new FormData($('#upload-image-form')[0]),
                    contentType: false,
                    processData: false,
                    success: function(data){
                      console.log(data);
                      if(data.status == 0){
                          $.each(data.err, function( key, value ) {
                              $('span.'+key+'_error').text(value).css({"display":"block","margin-top":"10px","font-size":"15px"});
                          });
                        }
                     
                     else{
                        $('.mess_update').css({"opacity": "1", "marginLeft": "unset"});
                          $('.mess_update').html(`
                              <div class="alert alert-success">
                                  <strong>Success!</strong> Change data successfully
                              </div>
                          `);
                          setTimeout(function(){
                            $('.mess_update').animate({
                                  opacity: 0, // animate slideUp
                                  marginLeft: '-200px',
                            }, 'slow', 'linear', function() {
                              $(this).html(``);
                            });
                          
                          }, 4000);
                          $('#tb_list').html(data);
                     }
                      
            
                    }
                });

          });

  
          $(document).on( "click",".click_admin", function(e) {
                e.preventDefault();
                var id = $(this).attr('id');
                console.log('fdfdf');
                $.ajax({
                    type: "get",
                    url: "user-account",
                    data:{
                        id:id,
                        _token: $('meta[name="csrf-token"]').attr('content'),
                      },
                    success: function(data){
                        console.log(data);
                        $('.mess').css({"opacity": "1", "marginLeft": "unset"});
                        $('.mess').html(`
                            <div class="alert alert-success">
                                <strong>Success!</strong> Change permissions successfully
                            </div>
                        `);
                        setTimeout(function(){
                          $('.mess').animate({
                                opacity: 0, // animate slideUp
                                marginLeft: '-200px',
                          }, 'slow', 'linear', function() {
                            $(this).html(``);
                          });
                         
                        }, 4000);
                        $('#tb_list').html(data);
                    }
                });
          
          });
        
              
          $(document).on( "click",".click_user", function(e) {
                e.preventDefault();
                var id = $(this).attr('id');
                console.log('fdfdf');
                
                $.ajax({
                    type: "get",
                    url: "admin-account",
                    data:{
                        id:id,
                        _token: $('meta[name="csrf-token"]').attr('content'),
                      },
                    success: function(data){
                        console.log(data);
                        $('.mess').css({"opacity": "1", "marginLeft": "unset"});
                        $('.mess').html(`
                            <div class="alert alert-success">
                                <strong>Success!</strong> Change permissions successfully
                            </div>
                        `);
                        setTimeout(function(){
                          $('.mess').animate({
                                opacity: 0, // animate slideUp
                                marginLeft: '-200px',
                          }, 'slow', 'linear', function() {
                            $(this).html(``);
                          });
                         
                        }, 4000);
                        $('#tb_list').html(data);
                    }
                });
        
          });

          $(document).on( "click",".click_active", function(e) {
                e.preventDefault();
                var id = $(this).attr('id');
                console.log('fdfdf');
                
                $.ajax({
                    type: "get",
                    url: "active-account",
                    data:{
                        id:id,
                        _token: $('meta[name="csrf-token"]').attr('content'),
                      },
                    success: function(data){
                        console.log(data);
                        $('.mess').css({"opacity": "1", "marginLeft": "unset"});
                        $('.mess').html(`
                            <div class="alert alert-success">
                                <strong>Success!</strong> Change status successfully
                            </div>
                        `);
                        setTimeout(function(){
                          $('.mess').animate({
                                opacity: 0, // animate slideUp
                                marginLeft: '-200px',
                          }, 'slow', 'linear', function() {
                            $(this).html(``);
                          });
                         
                        }, 4000);
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
                    url: "unactive-account",
                    data:{
                        id:id,
                        _token: $('meta[name="csrf-token"]').attr('content'),
                      },
                    success: function(data){
                        console.log(data);
                        $('.mess').css({"opacity": "1", "marginLeft": "unset"});
                        $('.mess').html(`
                            <div class="alert alert-success">
                                <strong>Success!</strong> Change status successfully
                            </div>
                        `);
                        setTimeout(function(){
                          $('.mess').animate({
                                opacity: 0, // animate slideUp
                                marginLeft: '-200px',
                          }, 'slow', 'linear', function() {
                            $(this).html(``);
                          });
                         
                        }, 4000);
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
                    url: "delete-account",
                    data:{
                        id:id,
                        _token: $('meta[name="csrf-token"]').attr('content'),
                      },
                    success: function(data){
                        console.log(data);
                        $('.mess').css({"opacity": "1", "marginLeft": "unset"});
                        $('.mess').html(`
                            <div class="alert alert-success">
                                <strong>Success!</strong> You have successfully deleted

                            </div>
                        `);
                        setTimeout(function(){
                          $('.mess').animate({
                                opacity: 0, // animate slideUp
                                marginLeft: '-200px',
                          }, 'slow', 'linear', function() {
                            $(this).html(``);
                          });
                         
                        }, 4000);
                        $('#tb_list').html(data);
                    }
                });
        
          });

          $(document).on( "keyup","#tl-search", function(e) {
                e.preventDefault();
                $val=$('#tl-search').val();
                console.log( $val);
                $.ajax({
                    type: "get",
                    url: "search-account",
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
        




     

});
</script>

      @stop