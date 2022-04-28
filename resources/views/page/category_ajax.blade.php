@foreach($pro as $item)
                                <!-- item.2 -->
          <div class="product-item-element col-sm-6 col-md-4 col-lg-3" data-url="{{route('category_filter')}}" category-id="{{$item->category_id}}">
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
                      <h5 class="item-price"><del>${{$item->sale_price}}</del>${{$item->price}}</h5>
                  </div>
              </div>
              <!-- End Product Item-->
          </div>
      @endforeach