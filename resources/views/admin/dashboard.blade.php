@extends('admin.master_admin')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$data['order']}}</h3>

          <p>Orders</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
      
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{$data['pro']}}</h3>
          <p>Products</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
      
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{$data['account']}}</h3>

          <p>User Registrations</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
       
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <!-- <div class="small-box bg-danger">
        <div class="inner">
          <h3>65</h3>

          <p>Unique Visitors</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
      
      </div> -->
    </div>
    <!-- ./col -->
  </div>
  <div class="row row--top-20">
  <div id="inline1" style="width:600px;display: none;">
  <h3 style=" text-align: center;">Chi tiết hoá đơn</h3>
         
  <table class="table">
            <div class="mess">
          
            </div>
            <thead class="table__thead">
              <tr>
              
                <th class="table__th">Product</th>
                <th class="table__th">Quantity</th>
                <th class="table__th">Color</th>
                <th class="table__th">Size</th>
                <th class="table__th">Price</th>
              
              </tr>
            </thead>
            <tbody class="table__tbody" id="tb_detail">
             
            </tbody>
          </table> 
           
    </div>
    <div class="col-md-12">
      <div style="    
          font-size: 27px;
          font-weight: 700;
          text-align: center;
          margin-bottom: 30px;">
          Thống kê đơn hàng
      </div>
      <div class="table-container">
        <div id="table_pagiante">
          <table class="table">
            <div class="mess">
          
            </div>
            <thead class="table__thead">
              <tr>
                <th class="table__th"><input id="selectAll" type="checkbox" class="table__select-row"></th>
                <th class="table__th">Name</th>
                <th class="table__th">Email</th>
                <th class="table__th">Address</th>
                <th class="table__th">Phone</th>
                <th class="table__th">Total</th>
                <th class="table__th">Updated at</th>
                <th class="table__th"></th>
              </tr>
            </thead>
            <tbody class="table__tbody" id="tb_list">
             @foreach($order as $item)
              <tr class="table-row table-row--chris ">
                <td class="table-row__td">
                  <input id="" type="checkbox" class="table__select-row">
                </td>
          
                <td data-column="Policy" class="table-row__td">
                  <div class="">
                    <p class="table-row__policy">{{$item->name}}</p>
                    <!-- <span class="table-row__small">Basic Policy</span> -->
                  </div>
                </td>
                <td data-column="Destination" class="table-row__td">
                  {{$item->email}}
                </td>
                <td data-column="Policy status "   class="table-row__td flex_dt">
                  {{$item->address}}
                </td>
          
                <td data-column="Policy" class="table-row__td">
                  <div class="">
                    <p class="table-row__policy">{{$item -> phone}}</p>
                    <!-- <span class="table-row__small">Basic Policy</span> -->
                  </div>
                </td>
                <td data-column="Policy" class="table-row__td">
                  <div class="">
                    <p class="table-row__policy">{{$item -> total}}</p>
                    <!-- <span class="table-row__small">Basic Policy</span> -->
                  </div>
                </td>
                <td data-column="Policy" class="table-row__td">
                  <div class="">
                    <p class="table-row__policy">{{$item -> created_at}}</p>
                    <!-- <span class="table-row__small">Basic Policy</span> -->
                  </div>
                </td>
          
          
                <td class="table-row__td">
                  <a class="fancybox" href="#inline1"  id = "btn-detail" data-id={{$item->id}}>
                        <svg  version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve" data-toggle="tooltip" data-placement="bottom" title="Edit"><g>	<g>		<path d="M496.063,62.299l-46.396-46.4c-21.2-21.199-55.69-21.198-76.888,0l-18.16,18.161l123.284,123.294l18.16-18.161    C517.311,117.944,517.314,83.55,496.063,62.299z" style="fill: rgb(1, 185, 209);"></path>	</g></g><g>	<g>
                      <path d="M22.012,376.747L0.251,494.268c-0.899,4.857,0.649,9.846,4.142,13.339c3.497,3.497,8.487,5.042,13.338,4.143    l117.512-21.763L22.012,376.747z" style="fill: rgb(1, 185, 209);"></path>	</g></g><g>	<g>		<polygon points="333.407,55.274 38.198,350.506 161.482,473.799 456.691,178.568   " style="fill: rgb(1, 185, 209);"></polygon>	</g></g><g></g><g></g><g></g>
                      <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                  </a>
                 
                </td>
              </tr>
              @endforeach
          
            </tbody>
          </table>
          {!! $order->links() !!}
        </div>
      </div>
    </div>
  </div>
</div>


 <script>
  $( document ).ready(function() {
    $(document).ready(function() {
        $('.fancybox').fancybox();
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on( "click","#btn-detail", function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            type: "get",
            url: "order-detail",
            data:{
                id:id,
                _token: $('meta[name="csrf-token"]').attr('content'),
              },
            beforeSend: function() {
              
            },
            success: function(data){
              console.log(data);
              $('#tb_detail').html('');
              $.each(data.data, function( index, value ) {
                $('#tb_detail').append(`
                  <tr class="table-row table-row--chris ">
                      <td data-column="name" class="table-row__td">
                        ${value.name}
                      </td>
                      <td data-column="quantity" class="table-row__td">
                        ${value.quantity}
                      </td>
                      <td data-column="Destination" class="table-row__td">
                        ${value.color}
                      </td>
                      <td data-column="Destination" class="table-row__td">
                        ${value.size}
                      </td>
                      <td data-column="Destination" class="table-row__td">
                        ${value.price}
                      </td>
                     
                  </tr>
                `)
              });
            }
        });
      });
    //  $('.pagination a').unbind('click').on('click', function(e) {
    //    e.preventDefault();
    //    $('.page-item').removeClass('active');
    //     $(this).parent().addClass('active');
    //    var page = $(this).attr('href').split('page=')[1];
    //    $.ajax({
    //     type: "GET",
    //     url: '?page='+ page,  
    //       success: function(data){
    //         $('#table_pagiante').html(data.html);
    //       }
    //     });
      
    //   });
         
 });
 </script> 
@stop