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

  $(document).on( "click","#add_cart", function(e) {
    e.preventDefault();
    if($('.buy_now').hasClass('disable')){
    }
    else{
      var url    = $(this).attr('data-url');
      var id_pro = $('#idproduct').attr('data-id');
      var color  = $('.color-selector .active').attr('data-id');
      var size   = $('.size-selector .active').attr('data-id');
      var qtn    = $('.quantity').val();
      var img    = $(this).attr('url-image');
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
            console.log(data);

            $('.cart-count').text(data.data.count);
            $('.cart-price').text('$'+data.data.totalPrice);
            $('.cart-total-price').text('$'+data.data.totalPrice);
            $('.cart-product-item li').remove();
            
            $.each(data.data.items, function( index, value ) {
              $('.cart-product-item').append(` 
                  <li>
                      <a href="#" class="product-image">
                          <img src="${img}/${value.image}" alt="" /></a>
                      <div class="product-content">
                          <a class="product-link" href="#">${value.name}</a>
                          <div class="cart-collateral">
                              <span class="qty-cart qty-cart${index}">${value.quantity}</span>&nbsp;<span>&#215;</span>&nbsp;<span class="product-price-amount"><span class="currency-sign">$</span>${value.price}</span>
                          </div>
                          <a class="product-remove" href="javascript:void(0)"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                      </div>
                  </li>
             `);
            })
            toast({
              title: "Success!",
              message: "You have successfully added your shopping cart",
              type: "success",
              duration: 5000
            });
          }
      });
    }
  });


  $(document).on( "click",".quantity-btn", function(e) {
      e.preventDefault();
     $current=($(this).parent().parent().parent());
      var url = $current.attr('url-put');
      var id  = $current.attr('data-id');
      var qtn = $('.quantity_'+id).val();
      ajaxUpdate(id,qtn,url);
  });
 $(document).on( "keypress",".quantity", function(e) {
  if (e.keyCode == 13) {               
    e.preventDefault();
    return false;
  }
 });
 $(document).on( "change",".quantity", function(e) {
    var qtn = $(this).val();
    var url = $(this).attr('url-put');
    var id  = $(this).attr('data-id');
    ajaxUpdate(id,qtn,url);
 });


  $(document).on( "click",".product-remove", function(e) {
    e.preventDefault();
    var id= $(this).attr('data-id');
    var url= $(this).attr('url-delete');
    $.ajax({
        type: "get",
        url: url,
        data:{
            id:id,
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        beforeSend: function() {
        },
        success: function(data){
         console.log(data);
         $('.item_'+id).remove();
         $('.cart-count').text(data.data.count);
         $('.cart-total-price').text('$'+data.data.totalPrice);
         $('.cart-price').text('$'+data.data.totalPrice);
         $('.total_items').text(data.data.totalPrice);
         toast({
          title: "Success!",
          message: "You have successfully deleted",
          type: "success",
          duration: 5000
        });
        }
    });
 
});

$(document).on( "click","#checkout", function(e) {
  e.preventDefault();
  var name= $('#name').val();
  var phone= $('#phone').val();
  var address= $('#address').val();
  var email= $('#email').val();
  var url= $(this).attr('data-url');
  $.ajax({
      type: "get",
      url: url,
      data:{
          name:name,
          phone:phone,
          address:address,
          email:email,
          _token: $('meta[name="csrf-token"]').attr('content'),
      },
      beforeSend: function() {
      },
      success: function(data){
       console.log(data);
       if(data.status == 999){
        $.each(data.err, function( key, value ) {
            $('span.'+key+'_error').text(value).css({"display":"block","margin-bottom":"10px","font-size":"15px","text-align":"left"});
        });
      }
   
      }
  });

});

function ajaxUpdate(id,qtn,url){
  $.ajax({
    type: "get",
    url: url,
    data:{
       id:id,
       qtn:qtn, 
        _token: $('meta[name="csrf-token"]').attr('content'),
    },
    beforeSend: function() {
    },
    success: function(data){
     console.log(data);
     
     if(data.status == 200){
      toast({
        title: "Success!",
        message: "You have successfully updated",
        type: "success",
        duration: 5000
      });
      $total_item = data.data.item.quantity * data.data.item.price;
      $('.qty-cart'+id).text(data.data.item.quantity);
      $('.total_item'+id).text($total_item);
      $('.total_items').text(data.data.totalPrice);
      $('.cart-total-price').text('$'+data.data.totalPrice);
      $('.cart-price').text('$'+data.data.totalPrice);
     }
    }
});
}

});

function toast({ title = "", message = "", type = "info", duration = 3000 }) {
    const main = document.getElementById("toastt");
    if (main) {
      const toast = document.createElement("div");
  
      // Auto remove toast
      const autoRemoveId = setTimeout(function () {
        main.removeChild(toast);
      }, duration + 1000);
  
      // Remove toast when clicked
      toast.onclick = function (e) {
        if (e.target.closest(".toast__close")) {
          main.removeChild(toast);
          clearTimeout(autoRemoveId);
        }
      };
  
      const icons = {
        success: "fas fa-check-circle",
        info: "fas fa-info-circle",
        warning: "fas fa-exclamation-circle",
        error: "fas fa-exclamation-circle"
      };
      const icon = icons[type];
      const delay = (duration / 1000).toFixed(2);
  
      toast.classList.add("toastt", `toast--${type}`);
      toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;
  
      toast.innerHTML = `
                      <div class="toast__icon">
                          <i class="${icon}"></i>
                      </div>
                      <div class="toast__body">
                          <h3 class="toast__title">${title}</h3>
                          <p class="toast__msg">${message}</p>
                      </div>
                      <div class="toast__close">
                          <i class="fas fa-times"></i>
                      </div>
                  `;
      main.appendChild(toast);
    }
  }