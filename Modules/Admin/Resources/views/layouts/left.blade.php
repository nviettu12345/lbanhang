
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a href="#" class="d-block">ADMIN : <b></b></a> 
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-user-secret"></i>
                <p>Quản lý website
                <i class="fas fa-angle-left right"></i>
                 <span class="badge badge-info right">1</span></p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a class="nav-link" href=""><i class="far fa-circle nav-icon"></i></i> Danh sách quản trị viên</a>
                </li>
                
                <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>  Quản lý log</p>
                </a>
              </li>
              </ul>
          </li>

          <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-home"></i>
                <p>Cấu hình website
                <i class="fas fa-angle-left right"></i>
                 <span class="badge badge-info right">2</span></p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a class="nav-link" href=""><i class="far fa-circle nav-icon"></i></i> Cấu hình mail</a></li>
                  <li class="nav-item">
                  <a class="nav-link" href=""><i class="far fa-circle nav-icon"></i></i> Cấu hình chung</a></li>
              </ul>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.get.list.category')}}" class="nav-link {{\Request::route()->getName()=='admin.get.list.category'?'active':''}}">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Danh mục
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.get.list.article')}}" class="nav-link {{\Request::route()->getName()=='admin.get.list.article'?'active':''}}">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Bài viết
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview {{ (request()->is('admin/product*')) ? 'menu-open' : '' }}">
              <a href="#" class="nav-link {{ (request()->is('admin/product*')) ? 'active' : '' }}">
                <i class="nav-icon fa fa-home"></i>
                <p>Quản lý sản phẩm
                <i class="fas fa-angle-left right"></i>
                 <span class="badge badge-info right">2</span></p>
              </a>
              <ul class="nav nav-treeview">
                 <li class="nav-item">
                  <a class="nav-link {{\Request::route()->getName()=='admin.get.list.product'?'active':''}}" href="{{route('admin.get.list.product')}}"><i class="far fa-circle nav-icon"></i></i>danh sách sản phẩm</a></li>
                  <li class="nav-item">
                  <a class="nav-link {{\Request::route()->getName()=='admin.get.list.attr.product'?'active':''}}" href="{{route('admin.get.list.attr.product')}}"><i class="far fa-circle nav-icon"></i></i> thuộc tính sản phẩm</a></li>
                  <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.get.list.category')}}"><i class="far fa-circle nav-icon"></i></i>Đánh giá sản phẩm</a></li>
              </ul>
          </li>
          <li class="nav-item has-treeview {{ (request()->is('admin/widget*')) ? 'menu-open' : '' }}">
              <a href="#" class="nav-link {{ (request()->is('admin/widget*')) ? 'active' : '' }}">
                <i class="nav-icon fa fa-home"></i>
                <p>Giao diện
                <i class="fas fa-angle-left right"></i>
                 <span class="badge badge-info right">2</span></p>
              </a>
              <ul class="nav nav-treeview">
                 <li class="nav-item">
                  <a class="nav-link {{\Request::route()->getName()=='admin.get.list.slide'?'active':''}} " href="{{route('admin.get.list.slide')}}"><i class="far fa-circle nav-icon"></i></i>Slide trang chủ</a></li>
                  <li class="nav-item">
                  <a class="nav-link {{\Request::route()->getName()=='admin.get.list.widgetHome'?'active':''}}" href="{{route('admin.get.list.widgetHome')}}"><i class="far fa-circle nav-icon"></i></i>Widget trang chủ</a></li>
                  <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.get.list.category')}}"><i class="far fa-circle nav-icon"></i></i>Widget header</a></li>
              </ul>
          </li>

        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    @section('script')
    <script>
        $(function(){
      
        });

    </script>
@stop     