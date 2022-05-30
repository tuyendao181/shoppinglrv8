$( document ).ready(function() {
    $(document).on( "click","#buy_now", function(e) {
      e.preventDefault();
      if($('.buy_now').hasClass('disable')){
      }
      else{
        var url    = $(this).attr('data-url');
        var urllist= $(this).attr('data-list-detail');
        var id_pro = $('#idproduct').attr('data-id');
        var color  = $('.color-selector .active').attr('data-id');
        var size   = $('.size-selector .active').attr('data-id');
        var qtn    = $('.quantity').val();
        $.ajax({
            type: "get",
            url: url,
            data:{
                id_pro: id_pro,
                color : color,
                size  : size,
                qtn   : qtn,
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            beforeSend: function() {
            },
            success: function(data){
              window.location.href = urllist;
            }
        });
      }
    });

    $(document).on( "click",".filter_color", function(e) {
        e.preventDefault();
        if($(this).hasClass( "active" )){
          $(this).removeClass('active');
        }
        else{
          $('.filter_color').removeClass('active');
          $(this).addClass('active');
        }
       
        ajaxFilter();
    });
    $(document).on( "click",".filter_size", function(e) {
      e.preventDefault();
      if($(this).hasClass( "active" )){
        $(this).removeClass('active');
      }
      else{
        $('.filter_size').removeClass('active');
        $(this).addClass('active');
      }
      ajaxFilter();
   });

   $(document).on( "click",".filter_price", function(e) {
    e.preventDefault();
    if($(this).hasClass( "active" )){
      $(this).removeClass('active');
    }
    else{
      $('.filter_price').removeClass('active');
      $(this).addClass('active');
    }
      ajaxFilter();
   });
   $(document).on( "click",".list li", function(e) {
    e.preventDefault();
      // console.log('ok');
      $(this).addClass('filter_pro')
      ajaxFilter();
   });

   $(document).on( "click",".page-number", function(e) {
    e.preventDefault();
    var data={};
    data.index=$(this).attr('data-index');
    data.id= $('.product-list-item').attr('category-id');
    var url = $('.pagination-numbers').attr('data-url');
    $.ajax({
      type:"get",
      url:url,
      data:data,
      success: function(res){
        console.log(res);
        $('.product-list-item').html(res);
      }
    })
 });


    function ajaxFilter(){
      let filter = $('.filter_pro.option.selected').attr('data-value');
      let from = $('.filter_price.active a .from_cc').text();
      console.log('fdfd'+from);
      let to = $('.filter_price.active a .to_cc').text(); 
      let id_color = $('.filter_color.active').attr('id-color');
      let id_size = $('.filter_size.active').attr('id-size');
      let id_category = $('.product-list-item').attr('category-id');
      let url =$('.product-list-item').attr('data-url');
      $.ajax({
          type: "get",
          url: url,
          data:{
              filter:filter,
              from:from,
              to:to,
              id_color: id_color,
              id_size : id_size,
              id_category  : id_category,
              _token: $('meta[name="csrf-token"]').attr('content'),
          },
          beforeSend: function() {
          },
          success: function(data){
            if(data.status == 201){
              $('.product-list-item').html(data.mess);
            }
            else{
              $('.product-list-item').html(data);
            }
             
          }
      });
    }

  
  });
  
