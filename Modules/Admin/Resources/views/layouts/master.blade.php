
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dashboard Template · Bootstrap</title>

<link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/dist/css/tagsinput.css')}}">


  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

      <!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

  </head>
  <body class="skin-blue sidebar-mini">

  <div class="wrapper">
  
     <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
          </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">  
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="fas fa-th-large"> Đăng xuất</i>
            </a>
          </li>
        </ul>
      </nav>
      
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
       @include("admin::layouts.left")
    </aside>
    
    	<!-- noi dung -->
		<div class="content-wrapper">
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
		</div>
      <!-- end noi dung -->
      
      <footer class="main-footer">
      <div class="float-right d-none d-sm-inline-block">
	          <b>Version</b> 2.2.0
	        </div>
	        <strong>Copyright © 2019 <a href="#">Viet Tu</a>.</strong> All rights reserved. 
	  	</footer>



</div>
<script>
        $.widget.bridge('uibutton', $.ui.button)
      </script>
      <!-- Bootstrap 4 -->
      <script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <!-- AdminLTE App -->
      <script src="{{asset('admin/dist/js/adminlte.js')}}"></script>
      <script src="{{asset('admin/js/tagsinput.js')}}"></script>
      <script src="{{asset('admin/js/custom.js')}}"></script>
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
