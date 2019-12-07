@extends('admin::layouts.master')

@section('content')

<div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  @include("admin::product.breadrum")
</div>
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Quản lý sản phẩm ({{$total}})<a href="{{route('admin.get.create.product')}}" class="float-right"><i class="fas fa-plus-circle"></i></a></h3>
        </div><!-- /.box-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <form class="form-inline" action="" style="margin-bottom:20px" method="GET">
                <div class="form-group mb-2">
                  <input type="text" class="form-control" placeholder="tên sản phẩm..." name="name" value="{{\Request::get('name')}}">
                </div>

                <div class="form-group mx-sm-3 mb-2">
                  <select name="cate" id="" class="form-control ">
                    <option value="">Danh mục</option>
                    @if(isset($catalogTree))
                    <?php echo $catalogTree ?>
                    @endif
                  </select>
                </div>

                <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-search"></i></button>
              </form>
            </div>
          </div>

          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th><input type="checkbox" id="group1" name="group1" onclick="checkAllJquery('group1', 'item1');" /></th>
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
              <?php $count = 1; ?>
              @if(isset($products))
              @foreach($products as $product)
              <tr class="row_{{$product->id}}">
                <td><input type="checkbox" class="item1" name="id[]" value="{{$product->id}}"></td>
                <td>{{$count}}</td>
                <td>{{$product->name}}<br>
                  <?php
                  $age = 0;
                  if (isset($product->total_rating) && $product->total_rating) {
                    $age = round($product->total_number / $product->total_rating, 2);
                  }
                  ?>
                  <span>- Giá : </span>{{number_format($product->price)}} VNĐ</br>
                  <span>- Khuyến mãi : </span>{{$product->sale}} (%)</br>
                  <span>- Số lượng : </span>{{$product->number}}</br>
                  <span>- Đánh giá:</span>
                  <span class="rating">
                    @for($i=1;$i<=5;$i++) <i class="fa fa-star {{$i<=$age?'active':''}}" style="color:#999"></i>
                      @endfor
                      <span> {{$age}}</span>
                  </span>
                </td>
                <td>{{isset($product->category->name)?$product->category->name:'[N\A]'}}</td>
                <td>
                  @if(isset($product->img))
                  <img width="100px" class="img img-responsive" src="{{asset('upload/product/'.$product->img)}}">
                  @endif
                </td>
                <td><a href="{{route('admin.ajax.action.product',['hot',$product->id])}}" class="badge {{$product->hot==1?'badge-danger':'badge-secondary'}} btn_hot btn_hot_{{$product->id}}">{{$product->hot==1?'public':'private'}}</a></td>
                <td><a href="{{route('admin.ajax.action.product',['active',$product->id])}}" class="badge {{$product->active==1?'badge-danger':'badge-secondary'}} btn_active btn_active_{{$product->id}}">{{$product->active==1?'public':'private'}}</a></td>

                <td>
                  <a style="padding:5px 5px; border:1px #ggg solid;font-size:12px" href="{{route('admin.get.edit.product',$product->id)}}"><i class="fas fa-pen">Cập nhật</i></a>
                  <a class="xoa" style="padding:5px 5px; border:1px #ggg solid;font-size:12px" href="{{route('admin.ajax.action.product',['delete',$product->id])}}"><i class="fas fa-trash-alt ">Xóa</i></a>

                </td>
              </tr>
              <?php $count++; ?>
              @endforeach
              @endif
            </tbody>
            <tfoot>
              <tr>
                <td colspan="6">
                  <div class="phantrang" style="float: right;">

                  </div>
                  <div class="list_action itemActions">
                    <a id="submit" class="btn btn-outline-primary" url="{{route('admin.ajax.actionAll.product','deleteAll')}}">
                      <span>Xóa hết</span>
                    </a>
                    <a id="active" class="btn btn-outline-warning" url="{{route('admin.ajax.actionAll.product','activeAll')}}">
                      <span>Hiện/Ẩn</span>
                    </a>
                  </div>
                </td>
              </tr>
            </tfoot>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->

    </div><!-- /.col -->
  </div><!-- /.row -->
</section>
@stop