@extends('admin::layouts.master')

@section('content')
<div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
@include("admin::rating.breadrum")
    </div>

    <div class="table-responsive">
        <h2>Quản lý đánh giá </h2>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Tên thành viên</th>
              <th>Sản phẩm</th>
              <th>nội dung</th>
              <th>rating</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
           @if(isset($ratings))
              @foreach($ratings as $rating)
              <tr>
                  <td>{{$rating->id}}</td>
                  <td>{{isset($rating->user->name)?$rating->user->name:'[N\A]'}}</td>
                  <td><a href="{{route('get.detail.product',[str_slug($rating->product->pro_name),$rating->product->id])}}">{{isset($rating->product->pro_name)?$rating->product->pro_name:'[N\A]'}}</a></td>
                  <td>{{$rating->ra_content}}</td>
                  <td>{{$rating->ra_number}}</td>
                  <td>
                  <a style="padding:5px 5px; border:1px #ggg solid;font-size:12px" href=""><i class="fas fa-trash-alt">Xóa</i></a>
                  </td>
                </tr>
              @endforeach
           @endif
          </tbody>
        </table>
@stop