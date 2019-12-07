@extends('admin::layouts.master')

@section('content')
<div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  @include("admin::category.breadrum")
</div>
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Quản lý danh mục ( {{isset($total)?$total:''}} ) <a href="{{route('admin.get.create.category')}}" class="float-right"><i class="fas fa-plus-circle"></i></a></h3>
        </div><!-- /.box-header -->
        <div class="card-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th><input type="checkbox" id="group1" name="group1" onclick="checkAllJquery('group1', 'item1');" /></th>
                <th>STT</th>
                <th>Tên danh mục</th>
                <th>Thể loại</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>
              @if(isset($categories))
              @foreach($categories as $category)
              <tr class="row_{{$category->id}}">
                <td><input type="checkbox" class="item1" name="id[]" value="{{$category->id}}"></td>
                <td><input class="num" type="text" style="width:30px;text-align:center" value="{{$category->num}}" url="{{route('admin.ajax.action.category',['order',$category->id])}}" /></td>
                <td>{{$category->name}}</td>
                <td>
                  <?php switch ($category->type) {
                    case '9': { ?>
                        <p>Có menu con</p>
                        <a href="{{route('admin.get.list.category','pid='.$category->id)}}">link quản lý menu con</a>
                      <?php
                          break;
                        }
                      case '6': { ?>
                        <p>Sản phẩm</p>
                        <a href="{{route('admin.get.list.product','cate='.$category->id)}}">link quản lý sản phẩm</a>
                      <?php
                          break;
                        }

                      case '1': { ?>
                        <p>Trang chủ</p>
                      <?php
                          break;
                        }
                      case '12': { ?>
                        <p>Link ngoài</p>
                      <?php
                          break;
                        }
                      case '2': { ?>
                        <p>Giới thiệu</p>
                      <?php
                          break;
                        }
                      case '7': { ?>
                        <p>Liên hệ</p>
                      <?php
                          break;
                        }
                      case '5': { ?>
                        <p>Tin tức</p>
                        <a href="{{route('admin.get.list.article','cate='.$category->id)}}">link quản lý tin tức</a>
                      <?php
                          break;
                        }
                      case '8': { ?>
                        <p>Video</p>
                        <a href="">link quản lý video</a>
                      <?php
                          break;
                        }
                      case '10': { ?>
                        <p>Album ảnh</p>
                        <a href="">link quản lý album ảnh </a>
                      <?php
                          break;
                        }
                      case '11': { ?>
                        <p>Trang đơn</p>
                    <?php
                        break;
                      }
                    default:
                      # code...
                      break;
                  } ?>



                </td>
                <td><a href="{{route('admin.ajax.action.category',['active',$category->id])}}" class="badge {{$category->active==1?'badge-danger':'badge-secondary'}} btn_active btn_active_{{$category->id}}">{{$category->active==1?'public':'private'}}</a></td>
                <td>
                  <a style="padding:5px 5px; border:1px #ggg solid;font-size:12px" href="{{route('admin.get.edit.category',$category->id)}}"><i class="fas fa-pen">Cập nhật</i></a>
                  <a class="xoa" style="padding:5px 5px; border:1px #ggg solid;font-size:12px" href="{{route('admin.ajax.action.category',['delete',$category->id])}}"><i class="fas fa-trash-alt ">Xóa</i></a>
                </td>
              </tr>
              @endforeach
              @endif
            </tbody>
            <tfoot>
              <tr>
                <td colspan="6">
                  <div class="phantrang" style="float: right;">
                    {{isset($categories)?$categories->links():''}}
                  </div>
                  <div class="list_action itemActions">
                    <a id="submit" class="btn btn-outline-primary" url="{{route('admin.ajax.actionAll.category','deleteAll')}}">
                      <span>Xóa hết</span>
                    </a>
                    <a id="active" class="btn btn-outline-warning" url="{{route('admin.ajax.actionAll.category','activeAll')}}">
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

@section('script')
<script>


</script>
@stop