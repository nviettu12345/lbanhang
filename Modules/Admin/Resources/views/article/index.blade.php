@extends('admin::layouts.master')

@section('content')
<div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
@include("admin::article.breadrum")
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
        <h2>Quản lý bài viết <a  href="{{route('admin.get.create.article')}}" class="float-right"><i class="fas fa-plus-circle"></i></a></h2>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Tên bài viết</th>
              <th>mô tả</th>
              <th>hinh ảnh</th>
              <th>Ngày tạo</th>
              <th>Trạng thái</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
              @if(isset($articles))
                @foreach($articles as $article)
                <tr>
                  <td>{{$article->id}}</td>
                  <td>{{$article->a_name}}</td>
                  <td>{{$article->a_description}}</td>
                  <td>
                  @if(isset($article->a_avatar))  
                  <img width="100px" class="img img-responsive" src="{{asset('upload/article/'.$article->a_avatar)}}">
                @endif
                 </td>
                  <td>{{$article->created_at}}</td>
                  <td><a class="badge {{$article->getStatus($article->a_active)['class']}}" href="{{route('admin.get.action.article',['active',$article->id])}}">{{$article->getStatus($article->a_active)['name']}}</a></td>
                
                  <td>
                  <a style="padding:5px 5px; border:1px #ggg solid;font-size:12px" href="{{route('admin.get.edit.article',$article->id)}}"><i class="fas fa-pen">Cập nhật</i></a>
                  <a style="padding:5px 5px; border:1px #ggg solid;font-size:12px" href="{{route('admin.get.action.article',['delete',$article->id])}}"><i class="fas fa-trash-alt">Xóa</i></a>
               
                  </td>
                </tr>
                
                @endforeach
              @endif
          </tbody>
        </table>
    </div>
@stop