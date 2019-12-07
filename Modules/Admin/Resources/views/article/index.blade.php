@extends('admin::layouts.master')

@section('content')

<div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
@include("admin::article.breadrum")
    </div>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Quản lý bài viết ({{$total}})<a  href="{{route('admin.get.create.article')}}" class="float-right"><i class="fas fa-plus-circle"></i></a></h3>
            </div><!-- /.box-header -->
            <div class="card-body">
    <div class="row">
      <div class="col-sm-12">
      <form class="form-inline" action="" style="margin-bottom:20px" method="GET">
        <div class="form-group mb-2">
          <input type="text" class="form-control" placeholder="tên bài viết..." name="name" value="{{\Request::get('name')}}">
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
    <div class="table-responsive">
        <h2></h2>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th><input type="checkbox" id="group1" name="group1" onclick="checkAllJquery('group1', 'item1');"/></th>
              <th>#</th>
              <th>Tên bài viết</th>
              <th>danh mục</th>
              <th>hinh ảnh</th>
              <th>tác giả</th>
              <th>Ngày đăng</th>
              <th>Trạng thái</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
              @if(isset($articles))
                @foreach($articles as $aticle)
                <tr class="row_{{$aticle->id}}">
                <td><input type="checkbox" class="item1" name="id[]" value="{{$aticle->id}}"></td>
                  <td>{{$aticle->id}}</td>
                  <td>{{$aticle->name}}</td>
                  <td>{{isset($aticle->category->name)?$aticle->category->name:'[N\A]'}}</td>
                  <td>
                  @if(isset($aticle->img))  
                  <img width="100px" class="img img-responsive" src="{{asset('upload/article/'.$aticle->img)}}">
                @endif
                 </td>
                  <td>admin</td>
                  <td>{{$aticle->publish_date}}</td>
                  <td><a href="{{route('admin.ajax.action.article',['active',$aticle->id])}}" class="badge {{$aticle->active==1?'badge-danger':'badge-secondary'}} btn_active btn_active_{{$aticle->id}}">{{$aticle->active==1?'public':'private'}}</a></td>
                
                  <td>
                  <a style="padding:5px 5px; border:1px #ggg solid;font-size:12px" href="{{route('admin.get.edit.article',$aticle->id)}}"><i class="fas fa-pen">Cập nhật</i></a>
                  <a class="xoa" style="padding:5px 5px; border:1px #ggg solid;font-size:12px" href="{{route('admin.ajax.action.article',['delete',$aticle->id])}}"><i class="fas fa-trash-alt ">Xóa</i></a>
               
                  </td>
                </tr>
                
                @endforeach
              @endif
          </tbody>
          <tfoot>
        <tr>
          <td colspan="6">
            <div class="phantrang" style="float: right;">
    
             </div>
             <div class="list_action itemActions">
               <a  id="submit" class="btn btn-outline-primary" url="{{route('admin.ajax.actionAll.article','deleteAll')}}">
                <span >Xóa hết</span>
                </a>
                 <a  id="active" class="btn btn-outline-warning" url="{{route('admin.ajax.actionAll.article','activeAll')}}">
                <span >Hiện/Ẩn</span>
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