@extends('admin::layouts.master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tổng quản</h1>
    </div>
    <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Thành viên</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">140</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Sản phẩm</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">100</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Bài viết</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">100</div>
                        </div>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Đánh giá</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    <div class="row">
      <div class="col-sm-6">
      <h3>Danh sách liên hệ mới nhất</h3>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Tiêu đề</th>
              <th>Họ tên</th>
              <th>Nội dung</th>
              <th>trạng thái</th>
            </tr>
          </thead>
          <tbody>
            <?php $i =1;?>
            @if(isset($contacts))
            @foreach($contacts as $contact)
              <tr>
                <td>{{$i}}</td>
                <td>{{$contact->c_title}}</td>
                <td>{{$contact->c_name}}</td>
                <td>{{$contact->c_content}}</td>
                <td>{{$contact->c_status}}</td>
              </tr>
              <?php $i++ ;?>
            @endforeach
            @endif
          
        
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-sm-6">
      <h3>đánh giá mới nhất</h3>
      <div class="table-responsive">
      <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Tên thành viên</th>
              <th>Sản phẩm</th>
              <th>rating</th>        
            </tr>
          </thead>
          <tbody>
           @if(isset($ratings))
              @foreach($ratings as $rating)
              <tr>
                  <td>{{$rating->id}}</td>
                  <td>{{isset($rating->user->name)?$rating->user->name:'[N\A]'}}</td>
                  <td><a href="{{route('get.detail.product',[str_slug($rating->product->pro_name),$rating->product->id])}}">{{isset($rating->product->pro_name)?$rating->product->pro_name:'[N\A]'}}</a></td>
                  <td>{{$rating->ra_number}}</td>
                </tr>
              @endforeach
           @endif
          </tbody>
        </table>
      </div>
    </div>
 
@endsection
