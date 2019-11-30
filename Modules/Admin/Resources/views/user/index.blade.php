@extends('admin::layouts.master')

@section('content')
<div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
@include("admin::user.breadrum")
    </div>
    <div class="row">
      <div class="col-sm-12">
      <form class="form-inline" action="" style="margin-bottom:20px" method="GET">
        <div class="form-group mb-2 mx-sm-3">
          <input type="text" class="form-control" placeholder="tên bài viết..." name="name" value="{{\Request::get('name')}}">
        </div>


         <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-search"></i></button>
  </form>
      </div>
    </div>
    <div class="table-responsive">
        <h2>Quản lý người dùng </h2>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Tên hiển thị</th>
              <th>email</th>
              <th>Số dt</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
           @if(isset($users))
              @foreach($users as $user)
              <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->phone}}</td>
                  <td>
                  <a style="padding:5px 5px; border:1px #ggg solid;font-size:12px" href=""><i class="fas fa-pen">Cập nhật</i></a>
                  <a style="padding:5px 5px; border:1px #ggg solid;font-size:12px" href=""><i class="fas fa-trash-alt">Xóa</i></a>
                  </td>
                </tr>
              @endforeach
           @endif
          </tbody>
        </table>
@stop