@extends('page.master')
@section('content')
@section('asset_footer')
<!-- <script type="text/javascript" src="{{url('public/backend/js')}}/category.js"></script> -->
@endsection
          <!-- Bread Crumb -->
          <section class="breadcrumb">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <nav class="breadcrumb-link">
                                <a href="#">Home</a>
                                <span>Blog Detail</span>
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
                        <!-- Blog Content -->
                        <div class="col-md-9 blog-single style-1">
                            <div class="blog-box">
                                @foreach($data as $item)
                                <div class="blog-img-wrap">
                                    <img src="{{url('/uploads/')}}/{{ $item->image}}" alt="philos" />
                                </div>
                                <div class="blog-box-content">
                                   
                                    <div class="blog-box-content-inner">
                                        <h4 class="blog-title"><a href="blog-single.html">{{$item -> content}}</a></h4>
                                        <p class="info"><span>by <a href="#">{{$item -> name}}</a></span><span>{{$item->created_at}}</span></p>
                                        <div class="blog-description-content">
                                          <p>{{$item->description}}</p>
                                        </div>
                                    </div>
                                    
                                </div>
                                @endforeach
                                <hr class="mb-30" />
                               
                            </div>
                        </div>
                        <!-- End Blog Content -->

                        <!-- Sidebar -->
                        <div class="sidebar-container col-md-3">
                            <!-- Recent Posts -->
                            <div class="widget-sidebar widget-product">
                                <h6 class="widget-title">Recent Posts</h6>
                                <ul class="widget-content">
                                    @foreach($result as $item)
                                    <!--Item-->
                                    <li>
                                        <a class="product-img" href="#">
                                            <img src="{{url('/uploads/')}}/{{ $item->image}}" alt="">
                                        </a>
                                        <div class="product-content">
                                            <a class="product-link" href="{{route('blog_detail',$item ->id)}}">{{$item -> content}}</a>
                                            <span class="date-description">{{$item->created_at}}</span>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>


                         

                        </div>
                        <!-- End Sidebar -->

                    </div>
                </div>
            </section>
            <!-- End Page Content -->

@stop