@extends('page.master')
@section('content')

            <!-- Intro -->
            <section id="intro" class="intro">
                <!-- Revolution Slider -->
                <div id="rev_slider_1078_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-source="gallery" style="background-color: transparent; padding: 0px;">
                    <!-- START REVOLUTION SLIDER 5.3.0.2 fullwidth mode -->
                    <div id="rev_slider_1078_1" class="rev_slider fullwidthabanner" style="display: none;" data-version="5.3.0.2">
                        <ul>
                            @foreach($slider as $key => $item)
                            <li class="dark-bg" data-index="rs-{{$key + 1 }}" data-transition="random" data-slotamount="7" data-masterspeed="500" data-thumb="" data-saveperformance="off" data-title="01">
                                <!-- Main Image Layer 0-->
                                <img src="{{url('/uploads/')}}/{{ $item->image}}" alt="h" title="home-1-slide-1" width="1920" height="1100" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="6" class="rev-slidebg" data-no-retina />
                                
                                <!--Layer 1-->
                                <h1 class="tp-caption NotGeneric-Title tp-resizeme text-center" style="letter-spacing: 0px; line-height: 60px;"
                                    data-x="140"
                                    data-y="center"
                                    data-hoffset=""
                                    data-voffset="-100"
                                    data-transform_idle="o:1;"
                                    data-width="['auto','auto','auto','auto']"
                                    data-height="['auto','auto','auto','auto']"
                                    data-transform_in="y:50px;opacity:0;s:700;e:Power3.easeOut;"
                                    data-transform_out="s:500;e:Power3.easeInOut;s:500;e:Power3.easeInOut;"
                                    data-start="500"
                                    data-speed="500"
                                    data-endspeed="500"
                                    data-splitin="none"
                                    data-splitout="none"
                                    data-responsive_offset="on">{{$item -> heading}}
                                </h1>


                                <!--Layer 2-->
                                <h3 class="tp-caption NotGeneric-Title tp-resizeme h3 normal text-center" style="letter-spacing: 0px;"
                                    data-x="195"
                                    data-y="center"
                                    data-hoffset=""
                                    data-voffset="0"
                                    data-transform_idle="o:1;"
                                    data-width="['auto','auto','auto','auto']"
                                    data-height="['auto','auto','auto','auto']"
                                    data-transform_in="y:50px;opacity:0;s:700;e:Power3.easeOut;"
                                    data-transform_out="s:500;e:Power3.easeInOut;s:500;e:Power3.easeInOut;"
                                    data-start="800"
                                    data-speed="500"
                                    data-endspeed="500"
                                    data-splitin="none"
                                    data-splitout="none"
                                    data-responsive_offset="on">{{$item -> descriptions}}
                                </h3>

                                <!--Layer 3-->
                                <!-- <a class="tp-caption NotGeneric-Title tp-resizeme btn btn-md btn-color"
                                    data-x="245"
                                    data-y="center"
                                    data-hoffset=""
                                    data-voffset="75"
                                    data-transform_idle="o:1;"
                                    data-width="['auto','auto','auto','auto']"
                                    data-height="['auto','auto','auto','auto']"
                                    data-transform_in="y:50px;opacity:0;s:700;e:Power3.easeOut;"
                                    data-transform_out="s:500;e:Power3.easeInOut;s:500;e:Power3.easeInOut;"
                                    data-start="1100"
                                    data-speed="500"
                                    data-endspeed="500"
                                    data-splitin="none"
                                    data-splitout="none"
                                    data-responsive_offset="on">See More
                                </a> -->


                            </li>
                            @endforeach
                           
                        </ul>
                    </div>
                </div>

                <!-- End Revolution Slider -->
            </section>
            <!-- End Intro -->

            <!-- Promo Box -->
            <section id="promo" class="section-padding-sm promo ">
                <div class="container">
                    <div class="promo-box row">
                        <div class="col-md-4 mtb-sm-30 promo-item">
                            <div class="icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                            <div class="info">
                                <a href="#">
                                    <h6 class="normal">Delivery Free</h6>
                                </a>
                                <p>On Order Over $150</p>
                            </div>
                        </div>
                        <div class="col-md-4 mtb-sm-30 promo-item">
                            <div class="icon"><i class="fa fa-repeat" aria-hidden="true"></i></div>
                            <div class="info">
                                <a href="#">
                                    <h6 class="normal">Exchange or Return</h6>
                                </a>
                                <p>30 Day Money Back Guarantee</p>
                            </div>
                        </div>
                        <div class="col-md-4 mtb-sm-30 promo-item">
                            <div class="icon"><i class="fa fa-headphones" aria-hidden="true"></i></div>
                            <div class="info">
                                <a href="#">
                                    <h6 class="normal">Support</h6>
                                </a>
                                <p>24/7 Online Support</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Promo Box -->

            <!-- Promo Banner -->
            <section id="promo-banner" class="section-padding-b">
                <div class="container">
                    <div class="row">
                        <!--Left Side-->
                        <div class="col-md-6">
                            <div class="row">
                                @foreach($banner as $key => $item)
                                @if($key %2 == 0)
                                <div class="col-12 mb-30">
                                    <!-- banner No.1 -->
                                    <div class="promo-banner-wrap">
                                        <a href="#" class="promo-image-wrap">
                                            <img src="{{url('/uploads/')}}/{{ $item->image}}" alt="Accesories" />
                                        </a>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>

                        <!--Right Side-->
                        <div class="col-md-6">
                            <div class="row">
                            @foreach($banner as $key => $item)
                                @if($key % 2 != 0)
                                <div class="col-12 mb-30">
                                    <!-- banner No.3 -->
                                    <div class="promo-banner-wrap">
                                        <a href="#" class="promo-image-wrap">
                                            <img src="{{url('/uploads/')}}/{{ $item->image}}" alt="Accesories" />
                                        </a>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                               
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <!-- End Promo Banner -->

            <!-- Product (Tab with Slider) -->
            <section class="section-padding-b">
                <div class="container">
                    <h2 class="page-title">Top Interesting</h2>
                </div>
                <div class="container">
                    <ul class="product-filter nav" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#latest" role="tab" data-toggle="tab">New Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#best-sellar" role="tab" data-toggle="tab">Best Price</a>
                        </li>
                       
                    </ul>
                    <div class="tab-content">
                        <!-- Tab1 - Latest Product -->
                        <div id="latest" role="tabpanel" class="tab-pane fade in active">
                            <div id="new-product" class="product-item-4 owl-carousel owl-theme nf-carousel-theme1">
                                @foreach($arr_new as $item)
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
                                        <a class="tag" href="#">{{$item -> name}}</a>
                                        <p class="product-title"><a href="{{route('show_product_detail',[$item->id_product])}}">{{$item -> name}}</a></p>
                                        <div class="product-rating">
                                            <div class="star-rating" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating" title="Rated 4 out of 5">
                                                <span style="width: 60%"></span>
                                            </div>
                                            <a href="#" class="product-rating-count"><span class="count">3</span> Reviews</a>
                                        </div>
                                        <p class="product-description">
                                        {{$item -> descriptions}}
                                        </p>
                                        <h5 class="item-price">${{$item -> price}}</h5>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Tab2 - Best Sellar -->
                        <div id="best-sellar" role="tabpanel" class="tab-pane fade">
                            <div id="popular-product" class="product-item-4 owl-carousel owl-theme nf-carousel-theme1">
                                <!-- item.1 -->
                                @foreach($arr_price as $item)
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
                                        <a class="tag" href="#">{{$item -> name}}</a>
                                        <p class="product-title"><a href="{{route('show_product_detail',[$item->id_product])}}">{{$item -> name}}</a></p>
                                        <div class="product-rating">
                                            <div class="star-rating" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating" title="Rated 4 out of 5">
                                                <span style="width: 60%"></span>
                                            </div>
                                            <a href="#" class="product-rating-count"><span class="count">3</span> Reviews</a>
                                        </div>
                                        <p class="product-description">
                                        {{$item -> descriptions}}
                                        </p>
                                        <h5 class="item-price">${{$item -> price}}</h5>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                      
                    </div>
                </div>
            </section>
            <!-- End Product (Tab with Slider) -->

            <!-- Categories -->
            <section class="">
                <div class="section-padding container-fluid bg-image text-center overlay-light90" data-background-img="img/bg/bg_5.jpg" data-bg-position-x="center center">
                    <div class="container">
                        <h2 class="page-title">Shop by Categories</h2>
                    </div>
                </div>
                <div class="container container-margin-minus-t">
                    <div class="row">
                        @foreach($list_category as $list)
                        <div class="col-md-4">
                            <div class="categories-box">
                                <div class="categories-image-wrap">
                                    <img src="{{url('/uploads/')}}/{{ $list->image}}" alt="" />
                                </div>
                                <div class="categories-content">
                                    <a href="{{route('category_detail',[$list->id])}}">
                                        <div class="categories-caption">
                                            <h6 class="normal">{{$list->name}}</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                       
                      
                    </div>
                </div>
            </section>
            <!-- End Categories -->

            <!-- New Product -->
            <section class="section-padding">
                <div class="container">
                    <h2 class="page-title">New Tranding</h2>
                </div>
                <div class="container">
                    <div id="new-tranding" class="product-item-4 owl-carousel owl-theme nf-carousel-theme1">
                        <!-- item.1 -->
                        @foreach($data as $item)
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
                                <a class="tag" href="{{route('show_product_detail',[$item->id_product])}}">{{$item->name}}</a>
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
            </section>
            <!-- End New Product -->

            <!-- Like & Share Banner -->
            <section id="like-share" class="like-share">
                <div class="container">
                    <div class="like-share-inner overlay-black40">
                        <h3>Like And Share Our Page for one time <span class="color">10%</span> Off</h3>
                        <ul class="social-icon">
                            <li><a href="http://facebook.com/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="https://plus.google.com/" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.twitter.com/" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="https://pinterest.com/" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- End Like & Share Banner -->

            <!-- Blog & News -->
            <section class="section-padding">
                <div class="container">
                    <h2 class="page-title">Blog & News</h2>
                </div>
                <div class="container">
                    <div id="blog-carousel" class="blog-carousel owl-carousel owl-theme nf-carousel-theme1">
                        @foreach($blog as $item)
                        <!-- item.1 -->
                        <div class="product-item">
                            <div class="blog-box">
                                <div class="blog-img-wrap">
                                    <img src="{{url('/uploads/')}}/{{ $item->image}}" alt="philos" />
                                </div>
                                <div class="blog-box-content">
                                    <div class="blog-box-content-inner">
                                        <h4 class="blog-title"><a href="{{route('blog_detail',$item ->id)}}">{{$item -> content}}</a></h4>
                                        <p class="info"><span>by <a href="{{route('blog_detail',$item ->id)}}">{{$item -> name}}</a></span><span>{{$item -> created_at}} </span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                       
                    </div>

                </div>
            </section>
            <!-- End Blog & News -->

@stop