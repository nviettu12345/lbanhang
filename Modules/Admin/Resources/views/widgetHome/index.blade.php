@extends('admin::layouts.master')

@section('content')

<div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
@include("admin::widgetHome.breadrum")
    </div>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Quản lý widget trang chủ ({{$total}})<a  href="{{route('admin.get.create.widgetHome')}}" class="float-right"><i class="fas fa-plus-circle"></i></a></h3>
            </div><!-- /.box-header -->
            <div class="card-body">

    <div class="table-responsive">
        <h2></h2>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th><input type="checkbox" id="group1" name="group1" onclick="checkAllJquery('group1', 'item1');"/></th>
              <th>STT</th>
              <th>tên widget</th>
              <th>thể loại</th>
              <th>Trạng thái</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
              @if(isset($widgetHome))
                @foreach($widgetHome as $widgetHome)
                <tr class="row_{{$widgetHome->id}}">
                <td><input type="checkbox" class="item1" name="id[]" value="{{$widgetHome->id}}"></td>
                <td><input class="num" type="text" style="width:30px;text-align:center" value="{{$widgetHome->num}}" url="{{route('admin.ajax.action.widgetHome',['order',$widgetHome->id])}}" /></td>
                <td>{{$widgetHome->name}}</td>
               
                  <td>{{$widgetHome->ext_url}}</td>
                  <td><a href="{{route('admin.ajax.action.widgetHome',['active',$widgetHome->id])}}" class="badge {{$widgetHome->active==1?'badge-danger':'badge-secondary'}} btn_active btn_active_{{$widgetHome->id}}">{{$widgetHome->active==1?'public':'private'}}</a></td>
                
                  <td>
                  <a style="padding:5px 5px; border:1px #ggg solid;font-size:12px" href="{{route('admin.get.edit.widgetHome',$widgetHome->id)}}"><i class="fas fa-pen">Cập nhật</i></a>
                  <a class="xoa" style="padding:5px 5px; border:1px #ggg solid;font-size:12px" href="{{route('admin.ajax.action.widgetHome',['delete',$widgetHome->id])}}"><i class="fas fa-trash-alt ">Xóa</i></a>
               
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
               <a  id="submit" class="btn btn-outline-primary" url="{{route('admin.ajax.actionAll.widgetHome','deleteAll')}}">
                <span >Xóa hết</span>
                </a>
                 <a  id="active" class="btn btn-outline-warning" url="{{route('admin.ajax.actionAll.widgetHome','activeAll')}}">
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