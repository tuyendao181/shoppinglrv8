@extends('page.master')
@section('content')
@section('asset_footer')
<!-- <script type="text/javascript" src="{{url('public/backend/js')}}/category.js"></script> -->
@endsection
<section class="content-page">
    <div class="container">
        <div class="row">
            <!-- Blog Content -->
            <div class="col-md-8 offset-md-2 blog-entry style-1">
                @foreach($blog as $item)
                <div class="blog-box">
                    <div class="blog-img-wrap">
                        <img src="{{url('/uploads/')}}/{{ $item->image}}" alt="philos" />
                    </div>
                    <div class="blog-box-content">
                        <div class="blog-box-content-inner">
                            <h4 class="blog-title"><a href="{{route('blog_detail',$item ->id)}}">{{$item->content}}</a></h4>
                            <p class="info"><span>by <a href="{{route('blog_detail',$item ->id)}}">{{$item->name}}</a></span><span>{{$item->created_at}}</span></p>
                            <div class="blog-description-content">
                                <p style=" display: -webkit-box;
                                -webkit-line-clamp: 4;
                                -webkit-box-orient: vertical;  
                                overflow: hidden;">
                                    {{$item->description}}
                                </p>
                               
                            </div>
                            <!-- <a class="btn btn-xs btn-gray">Read More <i class="fa fa-long-arrow-right right"
                                    aria-hidden="true"></i></a> -->
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
            <!-- End Blog Content -->
        </div>
    </div>
</section>
@stop