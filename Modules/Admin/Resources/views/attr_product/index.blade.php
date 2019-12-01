@extends('admin::layouts.master')

@section('content')
  <div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    @include("admin::attr_product.breadrum")
  </div>
  <div class="row">
  <div class="col-sm-5">

        <div class="card">
            <div class="card-header">
            <h3>thêm thuộc tính sản phẩm</h3>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Tên thuộc tính : </label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name',isset($attr->name)?$attr->name:'')}}" id="name" required>
                    </div>
                </div>

                <div class="form-group row ">
                    <label  class="col-sm-4 col-form-label">Giá trị  : </label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="value" name="value" value="{{old('name',isset($attr->name)?$attr->name:'')}}" id="name">
                   </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-4 ">Hiển thị : </label>
                    <div class="col-sm-8">
                    <input id="active" type="checkbox" name="active" {{isset($attr->active)?($attr->active==1?'checked':''):'checked'}} >
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Số STT : </label>
                    <div class="col-sm-8">
                    <input style="width:50px" type="number" id="num" name="num" value="{{old('num',isset($attr->num)?$attr->num:'0')}}">
                    </div>
                </div>    
                <a url="{{route('admin.post.create.attr.product')}}" style="color:white" class="btn btn-primary save">Lưu thông tin</a>   
            </div>
        </div>

  </div>
  <div class="col-sm-7">
      <div class="table-responsive">
            <h2>Quản lý danh mục thuộc tính <span class="total">({{isset($total)?$total:''}})</span> </h2> 
            <table class="table table-striped table-sm" id="attr_table">
            <thead>
              <tr >
                <th><input type="checkbox" id="group1" name="group1" onclick="checkAllJquery('group1', 'item1');"/></th>
                <th>STT</th>
                <th>Tên thuộc tính</th>
                <th>Giá trị mặc định</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>
            @if(isset($attrs))
              @foreach($attrs as $attr)
                  <tr class="row_{{$attr->id}}">
                    <td><input type="checkbox" class="item1" name="id[]" value="{{$attr->id}}"></td>
                    <td><input class="num" type="text" style="width:30px;text-align:center" value="{{$attr->num}}" url="{{route('admin.ajax.action.attr.product',['order',$attr->id])}}"/></td>
                    <td><span class="d-name{{$attr->id}}">{{$attr->name}}</span><input class="name{{$attr->id}} d-none" type="text" value="{{$attr->name}}"/></td>
                    <td><span class="d-value{{$attr->id}}">{{$attr->value}}</span><input class="value{{$attr->id}} d-none" type="text" value="{{$attr->value}}"/></td>
                    <td><a href="{{route('admin.ajax.action.attr.product',['active',$attr->id])}}" class="badge {{$attr->active==1?'badge-danger':'badge-secondary'}} btn_active btn_active_{{$attr->id}}">{{$attr->active==1?'public':'private'}}</a></td>
                    <td>
                    <a class="edit edit{{$attr->id}}" data-id="{{$attr->id}}" style="padding:5px 5px; border:1px #ggg solid;font-size:12px" href=""><i class="fas fa-pen"></i></a>
                    <a class="xoa xoa{{$attr->id}}" style="padding:5px 5px; border:1px #ggg solid;font-size:12px" href="{{route('admin.ajax.action.attr.product',['delete',$attr->id])}}"><i class="fas fa-trash-alt "></i></a>
                    <a class="luu luu{{$attr->id}}" data-id="{{$attr->id}}" style="padding:5px 5px; border:1px #ggg solid;font-size:12px" href="{{route('admin.ajax.edit.attr.product',$attr->id)}}"><i class="fas fa-save "></i></a>
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
                <a  id="submit" class="btn btn-outline-primary" url="{{route('admin.ajax.actionAll.attr.product','deleteAll')}}">
                  <span >Xóa hết</span>
                  </a>
                  <a  id="active" class="btn btn-outline-warning" url="{{route('admin.ajax.actionAll.attr.product','activeAll')}}">
                  <span >Hiện/Ẩn</span>
                  </a>
                </div>   
              </td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>  
  
    
  </div>
@stop
@section('script')
    <script>

$(document).ready(function() {
  $('body').on('click', '.save', function() {
              let name=$("#name").val();
              let value=$("#value").val();
              let num=$("#num").val();
              let active=($("#active").is(":checked"))?'1':'0';
              let url=$(this).attr("url");
              console.log(name,value,num,active,url);

              $.ajax({
                    url: url,
                    type:'POST',
                    data: {
                      'name':name,'value':value,'num':num,'active':active
                        },
                    })    
                    .done(function(result) {
                      console.log(result);
                      $("#name").val('');
                      $("#value").val('');
                      $("#num").val('0');  
        
                      let href=window.location.href;
                      html='';
                      html+='<tr class="row_'+result+'">';
                      html+='<td><input type="checkbox" class="item1" name="id[]" value="'+result+'"></td>';
                      html+='<td><input class="num" type="text" style="width:30px;text-align:center" value="'+num+'" url="'+href+'/action/order/'+result+'"/></td>';
                      html+='<td><span class="d-name'+result+'">'+name+'</span><input class="name'+result+' d-none" type="text" value="'+name+'"/></td>';
                      html+='<td><span class="d-value'+result+'">'+value+'</span><input class="value'+result+' d-none" type="text" value="'+value+'"/></td>';
                      html+='<td><a href="'+href+'/action/active/'+result+'" class="badge badge-danger btn_active btn_active_'+result+'">public</a></td>';
                      html+='<td>';
                      html+='<a class="edit edit'+result+'" data-id="'+result+'" style="padding:5px 5px; border:1px #ggg solid;font-size:12px" href=""><i class="fas fa-pen"></i></a>';
                      html+='<a class="xoa xoa'+result+'" style="padding:5px 5px; border:1px #ggg solid;font-size:12px" href="'+href+'/action/delete/'+result+'"><i class="fas fa-trash-alt "></i></a>';
                      html+='<a class="d-none luu luu'+result+'" data-id="'+result+'" style="padding:5px 5px; border:1px #ggg solid;font-size:12px" href="'+href+'/update/'+result+'"><i class="fas fa-save"></i></a>';
                      html+='</td>';
                      html+='</tr>';
                      $("#attr_table").append(html);

                    });
            });
  $('body').on('click', '.edit', function(e) {
    e.preventDefault();
    let id=$(this).attr("data-id");
    console.log(id);
    $(".name"+id).removeClass("d-none");
    $(".d-name"+id).addClass("d-none");
    $(".value"+id).removeClass("d-none");
    $(".d-value"+id).addClass("d-none");
    $(".edit"+id).addClass("d-none");
    $(".xoa"+id).addClass("d-none");
    $(".luu"+id).removeClass("d-none");
  });   

   $('body').on('click', '.luu', function(e) {
    e.preventDefault();
    let id=$(this).attr("data-id");
    $(".name"+id).addClass("d-none");
    $(".d-name"+id).removeClass("d-none");
    $(".value"+id).addClass("d-none");
    $(".d-value"+id).removeClass("d-none");
    $(".edit"+id).removeClass("d-none");
    $(".xoa"+id).removeClass("d-none");
    $(".luu"+id).addClass("d-none");

    let name= $(".name"+id).val();
    let value= $(".value"+id).val();
    let url = $(".luu"+id).attr("href");
    
    $.ajax({
                url: url,
                type:'POST',
                data: {'name':name,'value':value},
                context:this,
                })    
                .done(function(result) {
                  $(".d-name"+id).html(name);
                  $(".d-value"+id).html(value);
                  });
  });       

        });
 $(".luu").addClass("d-none");
    </script>
@stop
