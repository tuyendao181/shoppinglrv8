@extends('page.master')
@section('asset_header')
<link href="{{url('public/backend/css')}}/history.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<h3 style="padding-top: 50px;
    text-align: center;
    font-weight: 900;">History order</h3>
<div class="table-container" style="padding:50px" >
    
     <table class="table">
       <thead class="table__thead">
         <tr>
          
           <th class="table__th">Product</th>
           <th class="table__th">Color</th>
           <th class="table__th">Size</th>
           <th class="table__th">Quantity</th>
           <th class="table__th">Price</th>
           <th class="table__th">Created at</th>
         
         </tr>
       </thead>
       <tbody class="table__tbody " id="tb_list">
      @if(Auth::check())
       @foreach($pro as $item)
         <tr class="table-row table-row--chris ">
            <td data-column="Policy" class="table-row__td">
             <div class="">
               <p class="table-row__policy">{{$item->name}}</p>
               <!-- <span class="table-row__small">Basic Policy</span> -->
             </div>                
           </td>
            <td data-column="Policy" class="table-row__td">
             <div class="">
               <p class="table-row__policy">{{$item->color}}</p>
               <!-- <span class="table-row__small">Basic Policy</span> -->
             </div>                
           </td>
            <td data-column="Policy" class="table-row__td">
             <div class="">
               <p class="table-row__policy">{{$item->size}}</p>
               <!-- <span class="table-row__small">Basic Policy</span> -->
             </div>                
           </td>
            <td data-column="Policy" class="table-row__td">
             <div class="">
               <p class="table-row__policy">{{$item->quantity}}</p>
               <!-- <span class="table-row__small">Basic Policy</span> -->
             </div>                
           </td>
            <td data-column="Policy" class="table-row__td">
             <div class="">
               <p class="table-row__policy">{{$item->price}}</p>
               <!-- <span class="table-row__small">Basic Policy</span> -->
             </div>                
           </td>
            <td data-column="Policy" class="table-row__td">
             <div class="">
               <p class="table-row__policy">{{$item->created_at}}</p>
               <!-- <span class="table-row__small">Basic Policy</span> -->
             </div>                
           </td>
         </tr>
        @endforeach
        @endif
        
       </tbody>
     </table>
   </div>
@stop