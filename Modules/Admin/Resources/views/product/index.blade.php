@extends('admin::layouts.master')

@section('content')
<style>
  .rating .active{
    color:#ff9705!important;
  }
  </style>
<div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
@include("admin::product.breadrum")
    </div>
    <div class="row">
      <div class="col-sm-12">
      <form class="form-inline" action="" style="margin-bottom:20px" method="GET">
        <div class="form-group mb-2">
          <input type="text" class="form-control" placeholder="tên sản phẩm..." name="name" value="{{\Request::get('name')}}">
        </div>

        <div class="form-group mx-sm-3 mb-2">
          <select name="cate" id="" class="form-control ">
            <option value="">Danh mục</option>
            @if(isset($categories))
              @foreach($categories as $category)
                <option {{\Request::get('cate')==$category->id?'selected':''}} value="{{$category->id}}">{{$category->c_name}}</option>
              @endforeach
            @endif
          </select>
        </div>

         <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-search"></i></button>
  </form>
      </div>
    </div>
    <div class="table-responsive">
        <h2>Quản lý sản phẩm <a  href="{{route('admin.get.create.product')}}" class="float-right"><i class="fas fa-plus-circle"></i></a></h2>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Tên sản phẩm</th>
              <th>loại danh mục</th>
              <th>hinh ảnh</th>
              <th>Nổi bật</th>
              <th>Trạng thái</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
              @if(isset($products))
                @foreach($products as $product)
                <tr>
                  <td>{{$product->id}}</td>
                  <td>
                    {{$product->pro_name}}
              <br>
              <?php 
              $age=0;
              if($product->pro_total_rating)
              {
                $age=round($product->pro_total_number/$product->pro_total_rating,2);
              }
              ?>
              <span>- Giá : </span>{{number_format($product->pro_price)}} VNĐ</br>
              <span>- Khuyến mãi : </span>{{$product->pro_sale}} (%)</br>
              <span>- Số lượng : </span>{{$product->pro_number}}</br>
              <span >- Đánh giá:</span> 
              <span class="rating"> 
              @for($i=1;$i<=5;$i++)
              <i class="fa fa-star {{$i<=$age?'active':''}}"  style="color:#999"></i>
              @endfor  
              <span> {{$age}}</span>  
            </span> 
                  </td>
                  <td>{{isset($product->category->c_name)?$product->category->c_name:'[N\A]'}}</td>
                  <td>
                  @if(isset($product->pro_avatar))  
                  <img width="100px" class="img img-responsive" src="{{asset('upload/product/'.$product->pro_avatar)}}">
                @endif
                 </td>
                  <td><a class="badge {{$product->getHot($product->pro_hot)['class']}}" href="{{route('admin.get.action.product',['hot',$product->id])}}">{{$product->getHot($product->pro_hot)['name']}}</a></td>
                  <td><a class="badge {{$product->getStatus($product->pro_active)['class']}}" href="{{route('admin.get.action.product',['active',$product->id])}}">{{$product->getStatus($product->pro_active)['name']}}</a></td>
                
                  <td>
                  <a style="padding:5px 5px; border:1px #ggg solid;font-size:12px" href="{{route('admin.get.edit.product',$product->id)}}"><i class="fas fa-pen">Cập nhật</i></a>
                  <a style="padding:5px 5px; border:1px #ggg solid;font-size:12px" href="{{route('admin.get.action.product',['delete',$product->id])}}"><i class="fas fa-trash-alt">Xóa</i></a>
               
                  </td>
                </tr>
                
                @endforeach
              @endif
          </tbody>
        </table>
@stop