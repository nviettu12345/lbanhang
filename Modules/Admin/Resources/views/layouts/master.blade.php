
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Dashboard Template · Bootstrap</title>



    <!-- Bootstrap core CSS -->
<link href="{{asset('theme_admin/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/6f92abd8c9.js" crossorigin="anonymous"></script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{asset('theme_admin/css/dashboard.css')}}" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{\Request::route()->getName()=='admin.home'?'active':''}}" href="{{route('admin.home')}}">
              <span data-feather="home"></span>
              Trang Tổng quan <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link {{\Request::route()->getName()=='admin.get.list.category'?'active':''}}" href="{{route('admin.get.list.category')}}">
              <span data-feather="file"></span>
              Quản lý danh mục
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link {{\Request::route()->getName()=='admin.get.list.product'?'active':''}}" href="{{route('admin.get.list.product')}}">
              <span data-feather="shopping-cart"></span>
              Sản phẩm
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link {{\Request::route()->getName()=='admin.get.list.attr.product'?'active':''}}" href="{{route('admin.get.list.attr.product')}}">
              <span data-feather="shopping-cart"></span>
              thuộc tính sản phẩm
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link {{\Request::route()->getName()=='admin.get.list.rating'?'active':''}}" href="{{route('admin.get.list.rating')}}">
              <span data-feather="star"></span>
              Đánh giá
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{\Request::route()->getName()=='admin.get.list.article'?'active':''}}" href="{{route('admin.get.list.article')}}">
              <span data-feather="folder"></span>
              Tin tức
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{\Request::route()->getName()=='admin.get.list.trasaction'?'active':''}}" href="{{route('admin.get.list.trasaction')}}">
              <span data-feather="shopping-cart"></span>
              Đơn hàng
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{\Request::route()->getName()=='admin.get.list.user'?'active':''}}" href="{{route('admin.get.list.user')}}">
              <span data-feather="layers"></span>
              Thành viên
            </a>
          </li>
        </ul>

 
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
     @if(\Session::has('success'))
     <div class="alert alert-success alert-dismissible" style="position:fixed;right:2%;margin-top: 1%;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>thành công! </strong> {{\Session::get('success')}}
    </div>
     @endif 

     @if(\Session::has('danger'))
     <div class="alert alert-success alert-dismissible" style="position:fixed;right:2%;margin-top: 1%;">
     <button type="button" class="close" data-dismiss="alert">&times;</button>
     <strong>thất bại! </strong> {{\Session::get('danger')}}
    </div>
     @endif 
    @yield('content')

    </main>
  </div>
</div>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
      <script src="{{asset('theme_admin/js/jquery-3.2.1.min.js')}}" ></script>
      <!-- <script>window.jQuery || document.write('<script src="{{asset('theme_admin/js/jquery-slim.min.js')}}"><\/script>')</script> -->
      <!-- <script src="{{asset('theme_admin/js/bootstrap.bundle.min.js')}}" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script> -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script> -->
      <script src="{{asset('theme_admin/js/dashboard.js')}}"></script>
      <script src="{{asset('theme_admin/js/custom.js')}}"></script>
      <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
      <script src="{{asset('ckfinder/ckfinder.js')}}"></script>
      <script>
       

       

        window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);


      </script>
          @yield('script')
      </body>
</html>
