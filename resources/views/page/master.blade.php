<!DOCTYPE html>
<html>

<!-- Mirrored from theme.nileforest.com/html/philos/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Oct 2021 13:47:25 GMT -->
<head>
    <meta charset="utf-8">
    <title>Shoppinglrv</title>
    <meta name="description" content="Philos Template" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('public/adminabc/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Favicone Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="icon" type="img/png" href="img/favicon.png">
    <link rel="apple-touch-icon" href="img/favicon.png">
    <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- CSS -->
    <link href="{{url('public/backend/css/plugins')}}/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap css -->
    <link href="{{url('public/backend/css/plugins')}}/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- fontawesome css -->
    <link href="{{url('public/backend/css/plugins')}}/animate.css" rel="stylesheet" type="text/css" />
    <!-- animate css -->
    <link href="{{url('public/backend/css')}}/style.css" rel="stylesheet" type="text/css" />
    <!-- template css -->
    <link href="{{url('public/backend/plugins/rev_slider/css')}}/settings-ver.5.3.1.css" rel="stylesheet" type="text/css" />
    @yield('asset_header');
    <!-- Slider Revolution Css Setting -->
    <style>
        /* toast */
#toastt {
    position: fixed;
    top: 32px;
    right: 32px;
    z-index: 999999;
    
  }
.toast--success{
    margin-bottom: 10px;
}
  
  .toastt {
    display: flex;
    align-items: center;
    background-color: #fff;
    border-radius: 2px;
    padding: 20px 0;
    min-width: 400px;
    max-width: 450px;
    border-left: 4px solid;
    box-shadow: 0 5px 8px rgba(0, 0, 0, 0.08);
    transition: all linear 0.3s;
  }
  
  @keyframes slideInLeft {
    from {
      opacity: 0;
      transform: translateX(calc(100% + 32px));
    }
    to {
      opacity: 1;
      transform: translateX(0);
    }
  }
  
  @keyframes fadeOut {
    to {
      opacity: 0;
    }
  }
  
  .toast--success {
    border-color: #47d864;
  }
  
  .toast--success .toast__icon {
    color: #47d864;
  }
  
  .toast--info {
    border-color: #2f86eb;
  }
  
  .toast--info .toast__icon {
    color: #2f86eb;
  }
  
  .toast--warning {
    border-color: #ffc021;
  }
  
  .toast--warning .toast__icon {
    color: #ffc021;
  }
  
  .toast--error {
    border-color: #ff623d;
  }
  
  .toast--error .toast__icon {
    color: #ff623d;
  }
  
  .toast + .toast {
    margin-top: 24px;
  }
  
  .toast__icon {
    font-size: 24px;
  }
  
  .toast__icon,
  .toast__close {
    padding: 0 16px;
  }
  
  .toast__body {
    flex-grow: 1;
  }
  
  .toast__title {
    font-size: 16px;
    font-weight: 600;
    color: #333;
  }
  
  .toast__msg {
    font-size: 14px;
    color: #888;
    margin-top: 6px;
    line-height: 1.5;
  }
  
  .toast__close {
    font-size: 20px;
    color: rgba(0, 0, 0, 0.3);
    cursor: pointer;
  }
  
/* endtoast   */

    </style>
</head>
<body>

    <!-- Sidebar Menu (Cart Menu) ------------------------------------------------>
    <section id="sidebar-right" class="sidebar-menu sidebar-right">
        <div class="cart-sidebar-wrap">

            <!-- Cart Headiing -->
            <div class="cart-widget-heading">
                <h4>Shopping Cart</h4>
                <!-- Close Icon -->
                <a href="javascript:void(0)" id="sidebar_close_icon" class="close-icon-white"></a>
                <!-- End Close Icon -->
            </div>
            <!-- End Cart Headiing -->

            <!-- Cart Product Content -->
            <div class="cart-widget-content">
                <div class="cart-widget-product ">

                    <!-- Empty Cart -->
                    <div class="cart-empty">
                        <p>You have no items in your shopping cart.</p>
                    </div>
                    <!-- EndEmpty Cart -->

                    <!-- Cart Products -->
                    <ul class="cart-product-item">
                        @foreach($cart->items as $key => $item)
                        <!-- Item -->
                        <li class="item_{{$key}}">
                            <!--Item Image-->
                            <a href="#" class="product-image">
                                <img src="{{url('/uploads/')}}/{{ $item['image']}}" alt="" /></a>

                            <!--Item Content-->
                            <div class="product-content">
                                <!-- Item Linkcollateral -->
                                <a class="product-link" href="#">{{$item['name']}}</a>

                                <!-- Item Cart Totle -->
                                <div class="cart-collateral">
                                    <span class="qty-cart qty-cart{{$key}}">{{$item['quantity']}}</span>&nbsp;<span>&#215;</span>&nbsp;<span class="product-price-amount"><span class="currency-sign">$</span>{{$item['price']}}</span>
                                </div>

                                <!-- Item Remove Icon -->
                                <a class="product-remove" href="javascript:void(0)" url-delete="{{route('deleteCart')}}" data-id ="{{$key}}" ><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                            </div>
                        </li>
                        @endforeach


                    </ul>
                    <!-- End Cart Products -->

                </div>
            </div>
            <!-- End Cart Product Content -->

            <!-- Cart Footer -->
            <div class="cart-widget-footer">
                <div class="cart-footer-inner">

                    <!-- Cart Total -->
                    <h4 class="cart-total-hedding normal"><span>Total :</span><span class="cart-total-price">${{$cart->totalPrice}}</span></h4>
                    <!-- Cart Total -->

                    <!-- Cart Buttons -->
                    <div class="cart-action-buttons">
                        <a href="{{route('getCart')}}" class="view-cart btn btn-md btn-gray">View Cart</a>
                        <a href="{{route('getCheckout')}}" class="checkout btn btn-md btn-color">Checkout</a>
                    </div>
                    <!-- End Cart Buttons -->

                </div>
            </div>
            <!-- Cart Footer -->
        </div>
    </section>
    <!--Overlay-->
    <div class="sidebar_overlay"></div>
    <!-- End Sidebar Menu (Cart Menu) -------------------------------------------->

    <!-- Search Overlay Menu ----------------------------------------------------->
    <section class="search-overlay-menu">
        <!-- Close Icon -->
        <a href="javascript:void(0)" class="search-overlay-close"></a>
        <!-- End Close Icon -->
        <div class="container">
            <!-- Search Form -->
            <form role="search" id="searchform" action="http://theme.nileforest.com/search" method="get">
                <div class="search-icon-lg">
                    <img src="{{url('public/backend/img/search-icon-lg.png')}}" alt="" />
                </div>
                <label class="h6 normal search-input-label" for="search-query">Enter keywords to Search Product</label>
                <input value="" name="q" type="search" placeholder="Search..." />
                <button type="submit">
                    <img src="{{url('public/backend')}}/img/search-lg-go-icon.png" alt="" />
                </button>
            </form>
            <!-- End Search Form -->

        </div>
    </section>
    <!-- End Search Overlay Menu ------------------------------------------------>

    <!--==========================================-->
    <!-- wrapper -->
    <!--==========================================-->
    <div class="wraper">
        <!-- Header -->
        <header class="header">
            <!--Topbar-->
            <div class="header-topbar">
                <div class="header-topbar-inner">
                    <!--Topbar Left-->
                    <div class="topbar-left hidden-sm-down">
                        <div class="phone"><i class="fa fa-phone left" aria-hidden="true"></i>Customer Support : <b>+84 345851156</b></div>
                    </div>
                    <!--End Topbar Left-->

                    <!--Topbar Right-->
                    <div class="topbar-right">
                        <ul class="list-none">
                            <!-- <li>
                                <a href="login-register.html"><i class="fa fa-lock left" aria-hidden="true"></i><span class="hidden-sm-down">Login</span></a>
                            </li> -->
                            <li class="dropdown-nav">
                                <a href="#"><i class="fa fa-user left" aria-hidden="true"></i><span class="hidden-sm-down">My Account</span><i class="fa fa-angle-down right" aria-hidden="true"></i></a>
                                <!--Dropdown-->
                                <div class="dropdown-menu">
                                    <ul>
                                        <!-- <li><a href="login-register.html">My Account</a></li> -->
                                        <li><a href="{{route('history_detail')}}">Order History</a></li>
                                        <!-- <li><a href="#">Returns</a></li>
                                        <li><a href="#">My Wishlist</a></li> -->
                                        <li><a href="{{route('getCheckout')}}">Checkout</a></li>
                                    </ul>
                                    <span class="divider"></span>
                                    <ul>
                                        
                                        @if(Auth::check())
                                        <li><a href="{{route('logout')}}"><i class="fa fa-lock left" aria-hidden="true"></i>Logout</a></li>
                                        @else
                                        <li><a href="{{route('login')}}"><i class="fa fa-lock left" aria-hidden="true"></i>Login</a></li>
                                        @endif
                                        <li><a href="{{route('register')}}"><i class="fa fa-user left" aria-hidden="true"></i>Create an Account</a></li>
                                    </ul>
                                </div>
                                <!--End Dropdown-->
                            </li>
                           
                        </ul>
                    </div>
                    <!-- End Topbar Right -->
                </div>
            </div>
            <!--End Topbart-->

            <!-- Header Container -->
            <div id="header-sticky" class="header-main">
                <div class="header-main-inner">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{route('home')}}">
                            <img src="{{url('/public/backend/img/logo')}}/dnt.png" alt="Tuyendn" />
                        </a>
                    </div>
                    <!-- End Logo -->


                    <!-- Right Sidebar Nav -->
                    <div class="header-rightside-nav">
                        <!-- Login-Register Link -->
                        <!-- <div class="header-btn-link hidden-lg-down"><a href="#" class="btn btn-sm btn-color">Buy Now</a></div> -->
                        <!-- End Login-Register Link -->

                        <!-- Sidebar Icon -->
                        <div class="sidebar-icon-nav">
                            <ul class="list-none-ib">
                                <!-- Search-->
                                <!-- <li><a id="search-overlay-menu-btn"><i aria-hidden="true" class="fa fa-search"></i></a></li> -->

                                <!-- Whishlist-->
                                <!-- <li><a class="js_whishlist-btn"><i aria-hidden="true" class="fa fa-heart"></i><span class="countTip">10</span></a></li> -->

                                <!-- Cart-->
                                <li><a id="sidebar_toggle_btn">
                                    <div class="cart-icon">
                                        <i aria-hidden="true" class="fa fa-shopping-bag"></i>
                                    </div>

                                    <div class="cart-title">
                                        <span class="cart-count">{{$cart->count}}</span>
                                        /
                                    <span class="cart-price strong">${{$cart->totalPrice}}</span>
                                    </div>
                                </a></li>
                            </ul>
                        </div>
                        <!-- End Sidebar Icon -->
                    </div>
                    <!-- End Right Sidebar Nav -->


                    <!-- Navigation Menu -->
                    <nav class="navigation-menu">
                        <ul>
                            <li>
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li>
                                <a href="#">Catogory</a>
                                <!-- Drodown Menu ------->
                                <ul class="nav-dropdown js-nav-dropdown">
                                    <li class="container">
                                        <ul class="row">
                                            <!--Grid 1-->
                                            <li class="nav-dropdown-grid">
                                                <ul>
                                                    @foreach($category as $item)
                                                    <li><a href="{{route('category_detail',[$item->id])}}">{{$item->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <!--Grid 2-->
                                            <!-- <li class="nav-dropdown-grid">
                                                <ul>
                                                    <li><a href="#">Apple</a></li>
                                                    <li><a href="#">United State</a></li>
                                                    <li><a href="#">Google</a></li>
                                                    <li><a href="#">Coca-Cola</a></li>
                                                    <li><a href="#">Microsoft</a></li>
                                                    <li><a href="#">Samsung</a></li>
                                                    <li><a href="#">Apple</a></li>
                                                    <li><a href="#">Facebook</a></li>
                                                    <li><a href="#">Twitter</a></li>
                                                    <li><a href="#">Instagram</a></li>

                                                </ul>
                                            </li> -->

                                        </ul>
                                    </li>
                                </ul>
                                <!-- End Drodown Menu -->
                            </li>
                            <li>
                                <a href="{{route('blog')}}">Blog</a>
                            </li>
                            <!-- <span class="nav-label-sale"></span> -->
                       
                        </ul>
                    </nav>
                    <!-- End Navigation Menu -->

                </div>
            </div>
            <!-- End Header Container -->
        </header>
        <!-- End Header -->

        <!-- Page Content Wraper -->
        <div class="page-content-wraper">
        @yield('content');
        </div>
        <!-- End Page Content Wraper -->

        <!-- Footer Section -------------->
        <footer class="footer section-padding">
            <!-- Footer Info -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12 mb-sm-45">
                        <div class="footer-block about-us-block">
                            <img src="img/logo_white.png" width="125" alt="">
                            <p>Gumbo beet greens corn soko endive gum gourd. Parsley allot courgette tatsoi pea sprouts fava bean soluta nobis est ses eligendi optio.</p>
                            <ul class="footer-social-icon list-none-ib">
                                <li><a href="http://facebook.com/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="https://plus.google.com/" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 mb-sm-45">
                        <div class="footer-block information-block">
                            <h6>Information</h6>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Delivery Information</a></li>
                                <li><a href="#">Discount</a></li>
                                <li><a href="#">Latest News</a></li>
                                <li><a href="#">Our Sitemap</a></li>
                                <li><a href="#">Terms &amp; Condition</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 mb-sm-45">
                        <div class="footer-block links-block">
                            <h6>Our Links</h6>
                            <ul>
                                <li><a href="#">Brands</a></li>
                                <li><a href="#">Gift Vouchers</a></li>
                                <li><a href="#">Affiliates</a></li>
                                <li><a href="#">Special Event</a></li>
                                <li><a href="#">Retunrs</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 mb-sm-45">
                        <div class="footer-block extra-block">
                            <h6>Extra</h6>
                            <ul>
                                <li><a href="#">New Collection</a></li>
                                <li><a href="#">Women Dresses</a></li>
                                <li><a href="#">Kids Collection</a></li>
                                <li><a href="#">Mens Collection</a></li>
                                <li><a href="#">Custom Service</a></li>
                                <li><a href="#">Shipping policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="footer-block contact-block">
                            <h6>Contact</h6>
                            <ul>
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i>1 Wintergreen Dr. Huntley
                                    <br>
                                    IL 60142, Usa</li>
                                <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@sky.com">info@sky.com</a></li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i>(013) 456789</li>
                                <li><i class="fa fa-fax" aria-hidden="true"></i>89567989</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer Info -->

            <!-- Footer Newsletter -->
            <div class="container">
                <!-- <div class="footer-newsletter">
                    <h4>Subscribe Newsletter</h4>
                    <form class="footer-newslettr-inner">
                        <input class="input-md fancy" name="footeremail" title="Enter Email Address.." placeholder="Enter Email Address.." type="text">
                        <button class="btn btn-md btn-color fancy">Sing Up</button>
                    </form>
                </div> -->
            </div>
            <!-- End Footer Newsletter -->

            <!-- Footer Copyright -->
            <div class="container" style="margin-top:20px">
                <div class="copyrights">
                    <p class="copyright">&copy; Created by <a href="#" target="_blank">??.N.T</a>.tuyendao181@gmail.com</p>
                    <!-- <p class="payment">
                        <img src="img/payment_logos.png" alt="payment">
                    </p> -->
                </div>
            </div>
            <!-- End Footer Copyright -->
        </footer>
        <!-- End Footer Section -------------->

    </div>
    <!-- End wrapper =============================-->

    <!--==========================================-->
    <!-- JAVASCRIPT -->
    <!--==========================================-->
    

    
    <script type="text/javascript" src="{{url('public/backend/js')}}/jquery.min.js"></script>
    <script type="text/javascript" src="{{url('public/backend/js/plugins')}}/jquery-ui.js"></script>
    <!-- jquery library js -->
    <script type="text/javascript" src="{{url('public/backend/js/plugins')}}/modernizr.js"></script>
    <!--modernizr Js-->
    <script type="text/javascript" src="{{url('public/backend/plugins/rev_slider/js')}}/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="{{url('public/backend/plugins/rev_slider/js')}}/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="{{url('public/backend/plugins/rev_slider/js')}}/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="{{url('public/backend/plugins/rev_slider/js')}}/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript" src="{{url('public/backend/plugins/rev_slider/js')}}/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="{{url('public/backend/plugins/rev_slider/js')}}/revolution.extension.layeranimation.min.js"></script>
    <!--Slider Revolution Js File-->
    <script type="text/javascript" src="{{url('public/backend/js/plugins')}}/tether.min.js"></script>
    <!--Bootstrap tooltips require Tether (Tether Js)-->
    <script type="text/javascript" src="{{url('public/backend/js/plugins')}}/bootstrap.min.js"></script>
    <!-- bootstrap js -->
    <script type="text/javascript" src="{{url('public/backend/js/plugins')}}/owl.carousel.js"></script>
    <!-- OWL carousel js -->
    <script type="text/javascript" src="{{url('public/backend/js/plugins')}}/slick.js"></script>
    <!-- Slick Slider js -->
    <script type="text/javascript" src="{{url('public/backend/js/plugins')}}/plugins-all.js"></script>
    <!-- Plugins All js -->
    <script type="text/javascript" src="{{url('public/backend/js')}}/custom.js"></script>
    <script type="text/javascript" src="{{url('public/backend/js')}}/custom_wap.js"></script>
    @yield('asset_footer')
    <!-- custom js -->
    <!-- end jquery -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>

</body>

<!-- Mirrored from theme.nileforest.com/html/philos/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Oct 2021 13:53:01 GMT -->
</html>
