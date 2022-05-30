@extends('admin.master_admin')
@section('content')


<div class="container-fluid">
<div id="toastt"></div>
  <div class="row row--top-40">
  </div>
  <div class="row row--top-20">
    <div class="col-md-12">
      <div class="wap_search" style="display: flex;justify-content: space-between;align-items: center;">
      <form class="form-inline">
            <!-- <div class="input-group " style="border: 1px solid #ced4da;">
              <input id="tl-search" class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" style="border: none;">
             
            </div> -->
          </form>
     
        <div class="btn_add_fl"> <a class="fancybox" href="#inline1"style="    
                                                                              color: rgb(213 21 16);
                                                                              text-decoration: none;
                                                                              background-color: #daf3f8;
                                                                              font-weight: 700;
                                                                              padding:10px;
                                                                              border-radius: 12px;"
     >Add Banner</a></div>
      </div>
     
        <div id="inline1" style="width:600px;display: none;">
            <h3 style="text-align: center">
             Add Banner</h3>
          
            <form method="post" id="upload-image-form_1" enctype="multipart/form-data">
                <div class="card-body">
                 
                  <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group" style="display:unset;">
                    <input type="file" accept="image/*" id="tl_avatar" name="avatar"onchange="showMyImage(this)" value="" />
                    <span class="text-danger error-text avatar_error" style="display:block" ></span>
                    <br/>
                    <img id="thumbnil" style="width:20%; margin-top:10px;"  src="#" alt="image"/>
                  </div>
                </div>
                
                </div>
                <!-- /.card-body -->
  
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary add_category">Submit</button>
                </div>
              </form>
           
        </div>

      <div class="table-container">
     
        <table class="table">
          <thead class="table__thead">
            <tr>
             
              <th class="table__th">Image</th>
              <th class="table__th">Created at</th>
              <th class="table__th">Updated  at</th>
              <th class="table__th"></th>
            </tr>
          </thead>
          <tbody class="table__tbody " id="tb_list">
            @foreach($list as $item)
            <tr class="table-row table-row--chris tr_{{$item->id}}">
             
            <td class="table-row__td">
                @if($item->image != null)
                <div class="table-row__img" style="background:url('{{url('/uploads/')}}/{{ $item->image}}'); background-size: cover;"> </div>
               @else
               <div class="table-row__img"> </div>
               @endif
            
              </td>


                <td data-column="Policy" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">{{$item->created_at}}</p>
                  <!-- <span class="table-row__small">Basic Policy</span> -->
                </div>                
              </td>

              <td data-column="Policy" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">{{$item->updated_at}}</p>
                  <!-- <span class="table-row__small">Basic Policy</span> -->
                </div>                
              </td>
                
                <td class="table-row__td">
              

                    <svg data-toggle="tooltip" data-placement="bottom" title="Delete" version="1.1" id="{{$item->id}}" class="table-row__bin delete_category" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g>	<g>		<path d="M436,60h-90V45c0-24.813-20.187-45-45-45h-90c-24.813,0-45,20.187-45,45v15H76c-24.813,0-45,20.187-45,45v30    c0,8.284,6.716,15,15,15h16.183L88.57,470.945c0.003,0.043,0.007,0.086,0.011,0.129C90.703,494.406,109.97,512,133.396,512    h245.207c23.427,0,42.693-17.594,44.815-40.926c0.004-0.043,0.008-0.086,0.011-0.129L449.817,150H466c8.284,0,15-6.716,15-15v-30    C481,80.187,460.813,60,436,60z M196,45c0-8.271,6.729-15,15-15h90c8.271,0,15,6.729,15,15v15H196V45z M393.537,468.408    c-0.729,7.753-7.142,13.592-14.934,13.592H133.396c-7.792,0-14.204-5.839-14.934-13.592L92.284,150h327.432L393.537,468.408z     M451,120h-15H76H61v-15c0-8.271,6.729-15,15-15h105h150h105c8.271,0,15,6.729,15,15V120z" style="fill: rgb(158, 171, 180);"></path>	</g></g><g>	<g>		<path d="M256,180c-8.284,0-15,6.716-15,15v212c0,8.284,6.716,15,15,15s15-6.716,15-15V195C271,186.716,264.284,180,256,180z" style="fill: rgb(158, 171, 180);"></path>	</g></g><g>	<g>		<path d="M346,180c-8.284,0-15,6.716-15,15v212c0,8.284,6.716,15,15,15s15-6.716,15-15V195C361,186.716,354.284,180,346,180z" style="fill: rgb(158, 171, 180);"></path>	</g></g><g>	<g>		<path d="M166,180c-8.284,0-15,6.716-15,15v212c0,8.284,6.716,15,15,15s15-6.716,15-15V195C181,186.716,174.284,180,166,180z" style="fill: rgb(158, 171, 180);"></path>	</g></g><g></g><g></g><g></g><g></g><g></g><g></g>
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


          $(document).on( "click",".add_category", function(e) {
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: "add-banner",
                    data: new FormData($('#upload-image-form_1')[0]),
                     contentType: false,
                     processData: false,
                    beforeSend: function() {
                        $('#tl_avatar').val('');
                        $('#thumbnil').attr('src','');
                        $(document).find('span.error-text').text('');
                    },
                    success: function(data){
                        console.log(data);
                        if(data.status == 0){
                          $.each(data.err, function( key, value ) {
                              $('span.'+key+'_error').text(value);
                          });
                        }
                        else{
                          $('#tb_list').html(data);
                          toast({
                            title: "Success!",
                            message: "You have successfully added",
                            type: "success",
                            duration: 5000
                          });
                        }
                    }
                });
          
          });

          $(document).on( "click",".delete_category", function(e) {
                e.preventDefault();
                var id = $(this).attr('id');
                console.log(id);
                
                $.ajax({
                    type: "get",
                    url: "delete-banner",
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
                       $('.tr_'+id).remove();
                    }
                });
        
          }); 
});
</script>

      @stop