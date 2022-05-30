@extends('page.master')
@section('content')
@section('asset_footer')
<script type="text/javascript" src="{{url('public/backend/js')}}/category.js"></script>
@endsection

            <!-- Bread Crumb -->
            <section class="breadcrumb">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <nav class="breadcrumb-link">
                                <a href="#">Home</a>
                                <a href="#">Categories</a>
                                <span>Men Polos & Tees</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Bread Crumb -->

            <!-- Page Content -->
            <section class="content-page">
                <div class="container">
                    <div class="row">

                        <!-- Product Content -->
                        <div class="col-12">
                            <!-- Title -->
                            <div class="list-page-title">
                                <h2 class="">Men Polos & Tees <small>120 Products</small></h2>
                            </div>
                            <!-- End Title -->

                            <!-- Product Filter -->
                            <div class="product-filter-content">
                                <div class="product-filter-content-inner">

                                    <!--Product Filter Button-->
                                    <div class="product-filter-dropdown-btn "><a href="javascript:void(0)" data-toggle-target="filter-slide-toggle" class="btn btn-sm btn-gray slide-toggle-btn"><i class="fa fa-bars left" aria-hidden="true"></i>Filter</a></div>

                                    <!--Product Sort By-->
                                    <form class="product-sort-by">
                                        <label for="short-by">Short By</label>
                                        <select name="short-by" id="short-by" class="nice-select-box">
                                            <option value="default_sorting" >Default sorting</option>
                                            <option value="sort_by_newness">New product</option>
                                            <option value="price_low_to_high">Price: low to high</option>
                                            <option value="price_high_to_low">Price: high to low</option>
                                        </select>
                                    </form>
                                    <script>
                                        
                                    </script>
                                    <!--Product Show-->
                                    <form class="product-show">
                                        <label for="product-show">Show</label>
                                        <select name="product-show" id="product-show" class="nice-select-box">
                                            <option value="8" selected="selected">8</option>
                                            <option value="16">16</option>
                                            <option value="24">24</option>
                                            <option value="32">32</option>
                                        </select>
                                    </form>



                                    <!--Product List/Grid Icon-->
                                    <div class="product-view-switcher">
                                        <label>View</label>
                                        <div class="product-view-icon product-grid-switcher product-view-icon-active">
                                            <a class="" href="#"><i class="fa fa-th" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="product-view-icon product-list-switcher">
                                            <a class="" href="#"><i class="fa fa-th-list" aria-hidden="true"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- End Product Filter -->

                            <!-- Product filters Toggle-->
                            <div class="container product-filter-dropdown toggle-content" id="filter-slide-toggle">
                                <div class="row col mlr-0">
                                   

                                    <!-- Filter Price -->
                                    <div class="widget-sidebar widget-filter-price col-sm-6 col-md-6 col-lg-4">
                                        <h6 class="widget-title">Select Price</h6>
                                        <ul class="widget-content">
                                          
                                            <li class="filter_price">
                                                <a href="#">
                                                    <span class="amount"><span class="currencySymbol">$</span><span class="from_cc">0</span></span>
                                                    -
                                                <span class="amount"><span class="currencySymbol">$</span><span class="to_cc">50</span></span>
                                                </a>
                                            </li>
                                            
                                            <li class="filter_price">
                                                <a href="#">
                                                    <span class="amount"><span class="currencySymbol" >$</span><span class="from_cc">50</span></span>
                                                    -
                                                <span class="amount"><span class="currencySymbol">$</span><span class="to_cc">110</span></span>
                                                </a>
                                            </li>

                                            <li class="filter_price">
                                                <a href="#">
                                                    <span class="amount"><span class="currencySymbol" >$</span><span class="from_cc">110</span></span>
                                                    -
                                                <span class="amount"><span class="currencySymbol">$</span><span class="to_cc">160</span></span>
                                                </a>
                                            </li>
                                            <li class="filter_price">
                                                <a href="#">
                                                    <span class="amount"><span class="currencySymbol" >$</span><span class="from_cc">160</span></span>
                                                    -
                                                <span class="amount"><span class="currencySymbol">$</span><span class="to_cc">210</span></span>
                                                </a>
                                            </li>
                                               
                                            <li class="filter_price">
                                                <a href="#">
                                                    <span class="amount"><span class="currencySymbol">$</span><span class="from_cc">210</span></span>
                                                    +
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End Filter Price -->

                                    <!-- Filter Color -->
                                    <div class="widget-sidebar widget-filter-color col-sm-6 col-md-6 col-lg-4">
                                        <h6 class="widget-title">Select Color</h6>
                                        <ul class="widget-content">
                                            @foreach($color as $item)
                                            <li class="filter_color" id-color="{{$item->id_color}}" >
                                                <a href="#" style="text-transform: capitalize;">
                                                    <div class="filter-color-switcher"><span style="background-color:{{$item->name_color}}"></span></div>
                                                    {{$item->name_color}}</a>
                                                <span class="color-count">(9)</span>
                                            </li>
                                            @endforeach
                                           
                                        </ul>
                                    </div>
                                    <!-- End Filter Color -->

                                    <!-- Filter Size -->
                                    <div class="widget-sidebar widget-filter-size col-sm-6 col-md-6 col-lg-4">
                                        <h6 class="widget-title">Select Size</h6>
                                        <ul class="widget-content ">
                                            @foreach($size as $item)
                                            <li class="filter_size" id-size="{{$item->id_size}}">
                                                <a style="text-transform: capitalize;" href="#">{{$item->name_size}}</a>
                                            </li>
                                            @endforeach
                                            
                                        </ul>
                                    </div>
                                    <!-- End Filter Size -->
                                </div>
                            </div>
                            <!-- End Product filters Toggle-->

                            <!-- Product Grid -->
                            <div class="row product-list-item" category-id="{{$id}}" data-url="{{route('category_filter')}}">
                              
                                 @foreach($arr_temp as $item)
                                <!-- item.2 -->
                                <div class="product-item-element col-sm-6 col-md-4 col-lg-3"  >
                                    <!--Product Item-->
                                    <div class="product-item">
                                        <div class="product-item-inner">
                                            <div class="product-img-wrap">
                                                <img src="{{url('/uploads/')}}/{{ $item->image}}" alt="">
                                            </div>
                                            <div class="product-button">
                                                <a href="#" class="js_tooltip" data-mode="top" data-tip="Add To Cart"><i class="fa fa-shopping-bag"></i></a>
                                                <a href="#" class="js_tooltip" data-mode="top" data-tip="Add To Whishlist"><i class="fa fa-heart"></i></a>
                                                <a href="#" class="js_tooltip" data-mode="top" data-tip="Quick&nbsp;View"><i class="fa fa-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-detail">
                                            <a class="tag" href="#">{{$item->name}}</a>
                                      
                                            <p class="product-title"><a href="">{{$item->name}}</a></p>
                                            <div class="product-rating">
                                                <div class="star-rating" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating" title="Rated 4 out of 5">
                                                    <span style="width: 60%"></span>
                                                </div>
                                                <a href="#" class="product-rating-count"><span class="count">3</span> Reviews</a>
                                            </div>
                                            <p class="product-description">
                                            {{$item->descriptions}}
                                            </p>
                                            <h5 class="item-price"><del>${{$item->sale_price}}</del>${{$item->price}}</h5>
                                        </div>
                                    </div>
                                    <!-- End Product Item-->
                                </div>
                                @endforeach

                            </div>
                            <!-- End Product Grid -->

                            <div class="pagination-wraper">
                                <p>Showing results</p>
                                <div class="pagination">
                                    <ul class="pagination-numbers" data-url="{{route('category_paginate')}}">
                                        <!-- <li>
                                            <a href="#" class="prev page-number"><i class="fa fa-angle-double-left"></i></a>
                                        </li> -->
                                        @for($i = 1;$i <= $total;$i++)
                                        <li>
                                            <a href="#" class="page-number current" data-index="{{$i}}">{{$i}}</a>
                                        </li>
                                        @endfor
                                       
                                        <!-- <li>
                                            <a href="#" class="next page-number"><i class="fa fa-angle-double-right"></i></a>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <!-- End Product Content -->

                    </div>
                </div>
            </section>
            <!-- End Page Content -->

@stop