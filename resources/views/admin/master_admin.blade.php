<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>AdminLTE 3 | Dashboard</title>
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/adminabc/plugins/fontawesome-free/css/all.min.css')}}">
 

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('public/adminabc/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/adminabc/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('public/adminabc/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/adminabc/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('public/adminabc/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('public/adminabc/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('public/adminabc/plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/backend/fancybox/jquery.fancybox.css?v=2.1.5')}}" media="screen" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <style>

@import url('https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i');

/*----------------------------------------------------------
GENERAL
----------------------------------------------------------*/
*{
  margin:0;
  padding:0;
  font-family: 'Roboto', sans-serif;
}

html, body{
  display:table;
  height:100%;
  width:100%;
  color: #252a3b;
  background-color: #f8f8f8;
}
.row__title{
  color: #53646f;
  font-weight: 400;
  font-size: 20px;
  margin: 0;
}

.row--top-40{
  margin-top: 40px;
}

.row--top-20{
  margin-top: 20px;
}
.table__th {
    color: #9eabb4;
    font-weight: 500;
    font-size: 12px;
    text-transform: uppercase;
   cursor: pointer;
    border:0 !important;
  padding: 15px 8px !important;
}

.table-row {
    border-bottom: 1px solid #e4e9ea;
  background-color: #fff;
}
.table__th:hover {
    color: #01b9d1;
}

.table--select-all {
    width: 18px;
    height: 18px;
    padding: 0 !important;
    border-radius: 50%;
    border: 2px solid #becad2;
}
.table-row__td {
    padding: 12px 8px !important;
    vertical-align: middle !important;
    color: #53646f;
    font-size: 13px;
    font-weight: 400;
  position:relative;
    line-height: 18px !important;
  border:0 !important;
}

.table-row__img{
   width: 36px;
    height: 36px;
    display: inline-block;
    border-radius: 50%;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
   vertical-align: middle;
}

.table-row--chris .table-row__img {
    background-image: url('https://images.pexels.com/photos/428333/pexels-photo-428333.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb');
}

.table-row--angie .table-row__img {
    background-image: url('https://images.pexels.com/photos/785667/pexels-photo-785667.jpeg?w=940&h=650&auto=compress&cs=tinysrgb');
}

.table-row--ronald .table-row__img {
    background-image: url('https://images.pexels.com/photos/211050/pexels-photo-211050.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb');
}

.table-row--june .table-row__img {
    background-image: url('https://images.pexels.com/photos/709802/pexels-photo-709802.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb');
}

.table-row--ben .table-row__img {
    background-image: url('https://images.pexels.com/photos/736716/pexels-photo-736716.jpeg?w=940&h=650&auto=compress&cs=tinysrgb');
}

.table-row--natalie .table-row__img {
    background-image: url('https://images.pexels.com/photos/38554/girl-people-landscape-sun-38554.jpeg?w=940&h=650&auto=compress&cs=tinysrgb');
}

.table-row--thomas .table-row__img {
    background-image: url('https://images.pexels.com/photos/415326/pexels-photo-415326.jpeg?w=940&h=650&auto=compress&cs=tinysrgb');
}








.table-row__info {
    display: inline-block;
    padding-left: 12px;
  vertical-align: middle;
}

.table-row__name {
    color: #53646f;
    font-size: 14px;
    font-weight: 400;
  line-height: 18px;
    margin-bottom: 0px;
}

.table-row__small {
    color: #9eabb4;
    font-weight: 300;
    font-size: 12px;
}

.table-row__policy {
    color: #53646f;
    font-size: 13px;
    font-weight: 400;
    line-height: 18px;
    margin-bottom: 0px;
}
.table-row__p-status {
    margin-bottom: 0;
    font-size: 13px;
    vertical-align: middle;
    display: inline-block;
  color: #9eabb4;
}


.table-row__status{
    margin-bottom: 0;
    font-size: 13px;
    vertical-align: middle;
    display: inline-block;
  color: #9eabb4;
}


.table-row__progress{
    margin-bottom: 0;
    font-size: 13px;
    vertical-align: middle;
    display: inline-block;
  color: #9eabb4;
}

.status:before{
   content: '';
  margin-bottom: 0;
  width: 9px;
  height: 9px;
  display: inline-block;
  margin-right: 7px;
  border-radius: 50%; 
}

.status--red:before{
  background-color: #e36767;
}

.status--red{
  color: #e36767;
}

.status--blue:before{
  background-color: #3fd2ea;
}

.status--blue{
  color: #3fd2ea;
}

.status--yellow:before{
  background-color: #ecce4e;
}

.status--yellow{
  color: #ecce4e;
}

.status--green{
  color: #6cdb56;
}
.status--green:before{
  background-color: #6cdb56;
}

.status--grey{
  color: #9eabb4;
}
.status--grey:before{
  background-color: #9eabb4;
}

.table__select-row {
    appearence: none;
    -moz-appearance: none;
    -o-appearance: none;
    -webkit-appearance: none;
    width: 17px;
    height: 17px;
    margin: 0 0 0 5px !important;
    vertical-align: middle;
    border: 2px solid #beccd7;
    border-radius: 50%;
  cursor: pointer;
}

.table__select-row:hover{
  border-color:#01b9d1;
}

.table__select-row:checked {
    background-image: url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZlcnNpb249IjEuMSIgdmlld0JveD0iMCAwIDI2IDI2IiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAyNiAyNiIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCI+CiAgPHBhdGggZD0ibS4zLDE0Yy0wLjItMC4yLTAuMy0wLjUtMC4zLTAuN3MwLjEtMC41IDAuMy0wLjdsMS40LTEuNGMwLjQtMC40IDEtMC40IDEuNCwwbC4xLC4xIDUuNSw1LjljMC4yLDAuMiAwLjUsMC4yIDAuNywwbDEzLjQtMTMuOWgwLjF2LTguODgxNzhlLTE2YzAuNC0wLjQgMS0wLjQgMS40LDBsMS40LDEuNGMwLjQsMC40IDAuNCwxIDAsMS40bDAsMC0xNiwxNi42Yy0wLjIsMC4yLTAuNCwwLjMtMC43LDAuMy0wLjMsMC0wLjUtMC4xLTAuNy0wLjNsLTcuOC04LjQtLjItLjN6IiBmaWxsPSIjMDFiOWQxIi8+Cjwvc3ZnPgo=);
    background-position: center;
    background-size: 7px;
    background-repeat: no-repeat;
    border-color: #01b9d1;
}

.table-row--overdue {
    width: 3px;
    background-color: #e36767;
    display: inline-block;
    position: absolute;
    height: calc(100% - 24px);
    top: 50%;
    left: 0;
    transform: translateY(-50%);
}

.table-row__edit {
    width: 46px;
    padding: 8px 17px;
    display: inline-block;
    background-color: #daf3f8;
    border-radius: 18px;
    vertical-align: middle;
    margin-right: 10px;
  cursor: pointer;
}

.table-row__bin {
    width: 16px;
    display: inline-block;
    vertical-align: middle;
  cursor: pointer;
}

.table-row--red {
    background-color: #fff2f2;
}

.btn-sreach:hover{
  color: rgba(0,0,0,1) !important;
}

/* toast */
#toastt {
  position: fixed;
  top: 32px;
  right: 32px;
  z-index: 999999;
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



@media screen and (max-width: 991px){
  .table__thead {
    display: none;
  }
  .table-row {
    display: inline-block;
    border: 0;
    background-color: #fff;
    width: calc(33.3% - 13px);
    margin-right: 10px;
    margin-bottom: 10px;
  }
  .table-row__img {
    width: 42px;
    height: 42px;
    margin-bottom: 10px;
}
  
  .table-row__td:before{
    content:attr(data-column);
    color: #9eabb4;
    font-weight: 500;
    font-size: 12px;
    text-transform: uppercase;
    display: block;
  }
  
  .table-row__info {
    display: block;
    padding-left: 0;
  }
  
  .table-row__td {
    display: block;
    text-align: center;
    padding: 8px !important;
  }
  .table-row--red {
    background-color: #fff2f2;
  }
  .table__select-row{
    display: none;
  }
  
  .table-row--overdue {
    width: 100%;
    top: 0;
    left: 0;
    transform: translateY(0%);
    height: 4px;
    }

}


@media screen and (max-width: 680px){
  .table-row {
    width: calc(50% - 13px);
  }
}

@media screen and (max-width: 480px){
  .table-row {
    width: 100%;
  }
}
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

  
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">tuyendn</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">tuyen</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
                <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul> -->
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Account
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('list_account')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Account</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-columns"></i>
              <p>
               Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('list_category')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
            
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon  fa fa-list"></i>
              <p>
               Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('list_product')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon  fa fa-list"></i>
              <p>
               Slider
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('list_slider')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Slider</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon  fa fa-list"></i>
              <p>
               Blog
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('list_blog')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon  fa fa-list"></i>
              <p>
               Banner
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('list_banner')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banner</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-address-book"></i>
              <p>
               Product Attr
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

            <li class="nav-item">
                 <a href="{{route('list_attr')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product manage</p>
                </a>
              </li>

              <li class="nav-item">
                 <a href="{{route('list_color')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Color</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('list_size')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Size</p>
                </a>
              </li>
            </ul>
          </li>
         
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Tuyendao &copy; 2022-2023 <a href="https://adminlte.io">shoppinglrv</a>.</strong>
   Tuyendao181@gmail.com
    <div class="float-right d-none d-sm-inline-block">
      <!-- <b>Version</b> 3.2.0 -->
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="{{asset('public/adminabc/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/adminabc/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/adminabc/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('public/adminabc/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('public/adminabc/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('public/adminabc/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('public/adminabc/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public/adminabc/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('public/adminabc/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('public/adminabc/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('public/adminabc/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('public/adminabc/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/adminabc/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/adminabc/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/adminabc/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/adminabc/dist/js/pages/dashboard.js')}}"></script>

<script src="{{asset('public/backend/js/custom_wap.js')}}"></script>

<!-- fancybox -->

<script type="text/javascript" src="{{asset('public/backend/fancybox/jquery.mousewheel.pack.js?v=3.1.3')}})"></script>
<script type="text/javascript" src="{{asset('public/backend/fancybox/jquery.fancybox.pack.js?v=2.1.5')}})"></script>

</body>
</html>
