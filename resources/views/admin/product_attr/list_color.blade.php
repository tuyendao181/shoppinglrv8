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
            <div class="input-group " style="border: 1px solid #ced4da;">
             
            </div>
          </form>
     
        <div class="btn_add_fl"> <a class="fancybox" href="#inline1"style="    
                                                                              color: rgb(213 21 16);
                                                                              text-decoration: none;
                                                                              background-color: #daf3f8;
                                                                              font-weight: 700;
                                                                              padding:10px;
                                                                              border-radius: 12px;"
     >Add Color</a></div>
      </div>
     
        <div id="inline1" style="width:400px;display: none;">
            <h3 style="text-align: center">
             Add Color</h3>
          
            <form method="post" id="upload-image-form_1" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name Category</label>
                    <input type="text" class="form-control" id="name_category" name="name_color" placeholder="Enter name ">
                  </div>
                  <span class="text-danger error-text name_color_error"></span>
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
             
              <th class="table__th">Name Color</th>
             
            
              <th class="table__th">Created at</th>
              <th class="table__th">Updated  at</th>
              
            
            
              <th class="table__th"></th>
            </tr>
          </thead>
          <tbody class="table__tbody " id="tb_list">
            @foreach($list as $item)
            <tr class="table-row table-row--chris tr_{{$item->id}}">
             
            <td class="table-row__td">
             
                <div class="table-row__info">
                  <p class="table-row__name">{{$item->name_color}}</p>
                  <!-- <span class="table-row__small">CFO</span> -->
                </div>
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
                <a class="fancybox2" href="#inline2" id="click_show_edit" data-id="{{$item->id}}">
                      <svg  version="1.1" class="table-row__edit" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve" data-toggle="tooltip" data-placement="bottom" title="Edit"><g>	<g>		<path d="M496.063,62.299l-46.396-46.4c-21.2-21.199-55.69-21.198-76.888,0l-18.16,18.161l123.284,123.294l18.16-18.161    C517.311,117.944,517.314,83.55,496.063,62.299z" style="fill: rgb(1, 185, 209);"></path>	</g></g><g>	<g>
                    <path d="M22.012,376.747L0.251,494.268c-0.899,4.857,0.649,9.846,4.142,13.339c3.497,3.497,8.487,5.042,13.338,4.143    l117.512-21.763L22.012,376.747z" style="fill: rgb(1, 185, 209);"></path>	</g></g><g>	<g>		<polygon points="333.407,55.274 38.198,350.506 161.482,473.799 456.691,178.568   " style="fill: rgb(1, 185, 209);"></polygon>	</g></g><g></g><g></g><g></g>
                    <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                </a>

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
                // var id = $(this).attr('id');
               
                var name_category = $('#name_category').val();
                console.log( name_category);
                $.ajax({
                    type: "post",
                    url: "add-color",
                    data: new FormData($('#upload-image-form_1')[0]),
                     contentType: false,
                     processData: false,
                    beforeSend: function() {
                        $('#name_category').val('');
                        $('#name_category').focus();
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
                    url: "delete-color",
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