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