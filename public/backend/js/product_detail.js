$( document ).ready(function() {
    $(document).on( "click","#comment", function(e) {
      e.preventDefault();
      var url = $(this).attr('data-url');
      var id = $(this).attr('data-id');
      var content = $('#content').val();
      $.ajax({
            type: "get",
            url: url,
            data:{
              id:id,
              content:content,
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            beforeSend: function() {
            },
            success: function(res){
                if(res.status == 0){
                    $.each(res.err, function( key, value ) {
                        $('span.'+key+'_error').text(value).css({"display":"block","margin-top":"10px","font-size":"15px"});
                    });
                }else{
                    $('.commentlist').html('');
                    $.each(res.data, function (key, value) {
                        
                        $('.commentlist').append(`
                        <li id="comment-101" class="comment-101">
                            <div class="comment-text">
                                <div class="star-rating" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating" title="Rated 4 out of 5">
                                    <span style="width: 100%"></span>
                                </div>
                                <p class="meta">
                                    <strong itemprop="author">${value.name}</strong>
                                    &nbsp;&mdash;&nbsp;
                                <time itemprop="datePublished" datetime="">${value.created_at}</time>
                                </p>
                                <div class="description" itemprop="description">
                                    <p>${value.content}</p>
                                </div>
                            </div>
                        </li>
                        `);
                    });
                }
            
            }
        });
    });

  
});
  
