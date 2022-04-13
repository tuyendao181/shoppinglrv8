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
      <div class="table-container">
        <table class="table">
         
          <thead class="table__thead">
            <tr>
              <th class="table__th"><input id="selectAll" type="checkbox" class="table__select-row"></th>
              <th class="table__th">Name</th>
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
                <a class="fancybox" href="{{route('show_attr',['id' => $item_list->id])}}" id="click_show_edit" data-id="{{$item_list->id}}">
                      <svg  version="1.1" class="table-row__edit" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve" data-toggle="tooltip" data-placement="bottom" title="Edit"><g>	<g>		<path d="M496.063,62.299l-46.396-46.4c-21.2-21.199-55.69-21.198-76.888,0l-18.16,18.161l123.284,123.294l18.16-18.161    C517.311,117.944,517.314,83.55,496.063,62.299z" style="fill: rgb(1, 185, 209);"></path>	</g></g><g>	<g>
                    <path d="M22.012,376.747L0.251,494.268c-0.899,4.857,0.649,9.846,4.142,13.339c3.497,3.497,8.487,5.042,13.338,4.143    l117.512-21.763L22.012,376.747z" style="fill: rgb(1, 185, 209);"></path>	</g></g><g>	<g>		<polygon points="333.407,55.274 38.198,350.506 161.482,473.799 456.691,178.568   " style="fill: rgb(1, 185, 209);"></polygon>	</g></g><g></g><g></g><g></g>
                    <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                </a>
                            
              </td>
            </tr>
            @endforeach
          
            
           
            
 
          </tbody>
        </table>
      </div>
    </div>
  </div>




</div><!-- /.container-fluid -->

<script>
  $( document ).ready(function() {
       

    });
</script>
@stop


