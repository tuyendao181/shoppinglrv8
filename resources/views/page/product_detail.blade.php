@extends('page.master')
@section('content')
@section('asset_footer')
<script type="text/javascript" src="{{url('public/backend/js')}}/product_detail.js"></script>
@endsection

<section id="product-ID_XXXX" class="content-page single-product-content">
<div id="toastt"></div>
<!-- Product -->
<div id="product-detail" class="container">
    <div class="row">
        <!-- Product Image -->
        <div class="col-lg-6 col-md-6 col-sm-12 mb-30">
            <div class="product-page-image">
                <!-- Slick Image Slider -->
                <div class="product-image-slider product-image-gallery" id="product-image-gallery" data-pswp-uid="3">
                    @foreach($list as $key => $item)
                    <div class="item thumb_{{$item->id_atrr}}" data-index="{{$key + 1}}" >
                        <a class="product-gallery-item" href="#" data-size="" data-med="img/product-img/single/product_12547007_1.jpg" data-med-size="">
                            <img src="{{url('/uploads/')}}/{{ $item->image}}" alt="image 1" />
                        </a>
                    </div>
                    @endforeach
                   
                </div>
                <!-- End Slick Image Slider -->

                <a href="javascript:void(0)" id="zoom-images-button" class="zoom-images-button"><i class="fa fa-expand" aria-hidden="true"></i></a>


            </div>

            <!-- Slick Thumb Slider -->
            <div class="product-image-slider-thumbnails">
                @foreach($list as $item)
                <div class="item">
                    <img src="{{url('/uploads/')}}/{{ $item->image}}" alt="image 1" style="height:80px;object-fit: cover;"/>
                </div>
                @endforeach
               
            </div>
            <!-- End Slick Thumb Slider -->
        </div>
        <!-- End Product Image -->

        <!-- Product Content -->
        <div class="col-lg-6 col-md-6 col-sm-12 mb-30">
            
          
            <div class="product-page-content">
            @foreach($pro as $item)
                <div id="idproduct" data-id="{{$item -> id}}"></div>
                <h2 class="product-title">{{$item->name}}</h2>
                <div class="product-rating">
                    <div class="star-rating" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating" title="Rated 4 out of 5">
                        <span style="width: 60%"></span>
                    </div>
                    <a href="#" class="product-rating-count"><span class="count">3</span> Reviews</a>
                </div>
                <div class="price_wap">
                    <div class="product-price">
                        <del>${{$item->sale_price}}</del><span><span class="product-price-sign">$</span><span class="product-price-text">{{$item->price}}</span></span>
                    </div>
                    <span id="outstock">Out Stock</span>
                </div>
                <p class="product-description">
                    {{$item->descriptions}}
                </p>
                @endforeach
                <div class="row product-filters">
                    <form class="col-md-6 filters-color">
                        <label for="select-color">Select Color</label>
                        <div class="color-selector">
                            @foreach($color as $key => $item)
                            <div class="entry @if($key == 0) active @endif" data-url="{{route('check_product')}}" data-product="{{$item->id_product}}" data-id={{$item->id_color}} style="background: {{ $item->name_color}};">&nbsp;</div>
                            @endforeach
                          
                        </div>
                    </form>
                    <form class="col-md-6 filters-size">
                        <label for="select-size">Select Size</label>
                       
                        <div class="size-selector">
                            @foreach($size as $key => $item)
                            <div class="entry @if($key == 0) active @endif" data-id={{$item->id_size}}>{{$item->name_size}}</div>
                            @endforeach
                            
                        </div>
                    </form>
                </div>
                <form class="single-variation-wrap">
                    <div class="product-quantity">
                        <span data-value="+" class="quantity-btn quantityPlus"></span>
                        <input class="quantity input-lg" step="1" min="1" max="9" name="quantity" value="1" title="Quantity" type="number" />
                        <span data-value="-" class="quantity-btn quantityMinus"></span>
                    </div>
                    <button type="submit" class="btn btn-lg btn-black buy_buy" id="add_cart"  data-url="{{route('postCart')}}" url-image="{{url('/uploads/')}}"><i class="fa fa-shopping-bag" aria-hidden="true"></i>Add to cart</button>
                    <button type="submit" class="btn btn-lg btn-black buy_buy" id="buy_now" data-list-detail="{{route('getCart')}}" data-url="{{route('postCart')}}"> <i class="fa fa-shopping-bag" aria-hidden="true"></i>Buy now</button>
                </form>

           
                <div class="product-share">
                    <span>Share :</span>
                    <ul>
                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=http://nileforest.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="http://twitter.com/share?url=http://nileforest.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="http://plus.google.com/share?url=http://nileforest.com/" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="mailto:?subject=Check this http://nileforest.com/" target="_blank"><i class="fa fa-envelope"></i></a></li>
                        <li><a href="../../../pinterest.com/pin/create/button/index68d2.html?url=http://nileforest.com/exampleImage.jpg" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
          
        </div>
    </div>
</div>
<!-- End Product -->

<!-- Product Content Tab -->
<div class="product-tabs-wrapper container">
    <ul class="product-content-tabs nav nav-tabs" role="tablist">

        <li class="nav-item">
            <a class="active" href="#tab_description" role="tab" data-toggle="tab">Descriptiont</a>
        </li>
        <li class="nav-item">
            <a class="" href="#tab_additional_information" role="tab" data-toggle="tab">Additional Information</a>
        </li>
        <li class="nav-item">
            <a class="" href="#tab_reviews" role="tab" data-toggle="tab">Reviews (<span>3</span>)</a>
        </li>
       

    </ul>
    <div class="product-content-Tabs_wraper tab-content container">
        <div id="tab_description" role="tabpanel" class="tab-pane fade in active">
            <!-- Accordian Title -->
            <h6 class="product-collapse-title" data-toggle="collapse" data-target="#tab_description-coll">Description</h6>
            <!-- End Accordian Title -->
            <!-- Accordian Content -->
            <div id="tab_description-coll" class="shop_description product-collapse collapse container">
                <div class="row">
                    <div class=" col-md-12">
                        <p>
                            {{$pro[0]['descriptions']}}
                        </p>
                       
                    </div>
                   
                </div>
            </div>
            <!-- End Accordian Content -->
        </div>

        <div id="tab_additional_information" role="tabpanel" class="tab-pane fade">
            <!-- Accordian Title -->
            <h6 class="product-collapse-title" data-toggle="collapse" data-target="#tab_additional_information-coll">Additional Information</h6>
            <!-- End Accordian Title -->
            <!-- Accordian Content -->
            <div id="tab_additional_information-coll" class="container product-collapse collapse">

                <table class="shop_attributes">
                    <tbody>
                        <tr>
                            <th>Color</th>
                            <td>Black, Gray, White</td>
                        </tr>
                        <tr>
                            <th>Weight</th>
                            <td>5 kg</td>
                        </tr>
                        <tr>
                            <th>Dimensions</th>
                            <td>60 x 40 x 60 cm</td>
                        </tr>
                        <tr>
                            <th>Washcare</th>
                            <td>Dry Clean</td>
                        </tr>
                        <tr>
                            <th>Composition</th>
                            <td>100% Polyester</td>
                        </tr>
                        <tr>
                            <th>Lining composition</th>
                            <td>100% Polyester</td>
                        </tr>
                        <tr>
                            <th>Other info</th>
                            <td>Ullamcorper nisl mus integer mollis vestibulu</td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <!-- End Accordian Content -->
        </div>
        <div id="tab_reviews" role="tabpanel" class="tab-pane fade">
            <!-- Accordian Title -->
            <h6 class="product-collapse-title" data-toggle="collapse" data-target="#tab_reviews-coll">Reviews (0)</h6>
            <!-- End Accordian Title -->
            <!-- Accordian Content -->
            <div id="tab_reviews-coll" class=" product-collapse collapse container">

                <div class="row">
                    @if(Auth::check())
                    <div class="review-form-wrapper col-md-6">
                        <h6 class="review-title">Add a Review </h6>
                        <form class="comment-form">
                          
                            <div class="form-field-wrapper">
                                <label>Your Review <span class="required">*</span></label>
                                <textarea id="content" class="form-full-width" name="content" cols="45" rows="8" aria-required="true" required=""></textarea>
                                <span class="text-danger error-text content_error"></span>
                            </div>
                            <div class="form-field-wrapper">
                                <button type="button" class="submit btn btn-md btn-color" id="comment" data-id={{$pro[0]['id']}} data-url="{{route('comment_product')}}">Submit</button>
                            </div>
                        </form>
                    </div>
                    @endif

                    <div class="comments col-md-6">
                        <h6 class="review-title">Customer Reviews</h6>
                        <!--<p class="review-blank">There are no reviews yet.</p>-->
                        <ul class="commentlist">
                            @foreach($comment as $item)
                                <li id="comment-101" class="comment-101">
                                     <div class="comment-text">
                                         <div class="star-rating" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating" title="Rated 4 out of 5">
                                             <span style="width: 100%"></span>
                                         </div>
                                         <p class="meta">
                                             <strong itemprop="author">{{$item->name}}</strong>
                                             &nbsp;&mdash;&nbsp;
                                         <time itemprop="datePublished" datetime="">{{$item->created_at}}</time>
                                         </p>
                                         <div class="description" itemprop="description">
                                             <p>{{$item->content}}</p>
                                         </div>
                                     </div>
                                </li>
                            @endforeach
                           
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Accordian Content -->
        </div>
     
    </div>
</div>
<!-- End Product Content Tab -->

<!-- Product Carousel -->
<div class="container product-carousel">
    <h2 class="page-title">Related Products</h2>
    <div id="new-tranding" class="product-item-4 owl-carousel owl-theme nf-carousel-theme1">
        @foreach($data as $item)
        <!-- item.1 -->
        <div class="product-item">
            <div class="product-item-inner">
                <div class="product-img-wrap">
                    <img src="{{url('/uploads/')}}/{{ $item->image}}" alt="">
                </div>
                <!-- <div class="product-button">
                    <a href="#" class="js_tooltip" data-mode="top" data-tip="Add To Cart"><i class="fa fa-shopping-bag"></i></a>
                    <a href="#" class="js_tooltip" data-mode="top" data-tip="Add To Whishlist"><i class="fa fa-heart"></i></a>
                    <a href="#" class="js_tooltip" data-mode="top" data-tip="Quick&nbsp;View"><i class="fa fa-eye"></i></a>
                </div> -->
            </div>
            <div class="product-detail">
                <a class="tag" href="#">{{$item->name}}</a>
                <p class="product-title"><a href="{{route('show_product_detail',[$item->id_product])}}">{{$item->name}}</a></p>
                <div class="product-rating">
                    <div class="star-rating" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating" title="Rated 4 out of 5">
                        <span style="width: 60%"></span>
                    </div>
                    <a href="#" class="product-rating-count"><span class="count">3</span> Reviews</a>
                </div>
                <p class="product-description">
                   {{$item->descriptions}}
                </p>
                <h5 class="item-price">${{$item->price}}</h5>
            </div>
        </div>
        @endforeach
       

    </div>
</div>
<!-- End Product Carousel -->

</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
$( document ).ready(function() {

    // $('#product-image-gallery').slick('slickGoTo',$index);

    check_thumb();
    $(document).on( "click",".color-selector .active,.size-selector .active", function(e) {
        e.preventDefault();
        console.log('gfgf');
        check_thumb();
        
    });

    function check_thumb(){
        $color_id=$('.color-selector .active').attr('data-id');
        $size_id=$('.size-selector .active').attr('data-id');
        $product_id=$('.color-selector .active').attr('data-product');
        $url=$('.color-selector .active').attr('data-url');
        $.ajax({
                type: "get",
                url:  $url,
                data:{
                   id_color: $color_id,
                   id_size:$size_id,
                   id_product: $product_id,
                    _token: $('meta[name="csrf-token"]').attr('content'),
                  },
                beforeSend: function() {
                    $('.buy_buy').removeClass('disable');
                    $('#outstock').css('opacity','0');
                },
                success: function(data){
                  
                    if(data.status == 200){
                        $index=$('.thumb_'+data.val).attr('data-slick-index');
                        $('#product-image-gallery').slick('slickGoTo',$index);
                    }
                    else{
                        $('.buy_buy').addClass('disable');
                        $('#outstock').css('opacity','1');
                    }
    
                }
        });
         

    }
         


});
</script>
@stop