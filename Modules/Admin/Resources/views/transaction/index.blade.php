@extends('admin::layouts.master')

@section('content')
<div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
@include("admin::transaction.breadrum")
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
              <th>Tên khách hàng</th>
              <th>Địa chỉ</th>
              <th>Số điện thoại</th>
              <th>Tổng tiền</th>
              <th>Trạng thái</th>
              <th>Thời gian</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
              @if(isset($transactions))
                @foreach($transactions as $transaction)
                <tr>
                    <td></td>
                  <td>{{isset($transaction->user->name)?$transaction->user->name:'N/A'}}</td>
                  <td>{{$transaction->tr_address}}</td>
                  <td>{{$transaction->tr_phone}}</td>     
                  <td>{{number_format($transaction->tr_total)}} VNĐ</td>
                  <td>
                      @if($transaction->tr_status==1)
                        <a href="{{route('admin.get.action.transaction',['status',$transaction->id])}}" class="badge badge-success">Đã xử lý</a>
                      @else
                      <a href="{{route('admin.get.action.transaction',['status',$transaction->id])}}" class="badge badge-secondary">chờ xử lý</a>
                      @endif   
                  </td>   
                  <td>{{$transaction->created_at->format('d-M-Y')}}</td>  
                  <td>
                 <a style="padding:5px 5px; border:1px #ggg solid;font-size:12px" href=""><i class="fas fa-trash-alt">Xóa</i></a>
                 <a class="js_order_item" data-id="{{$transaction->id}}" style="padding:5px 5px; border:1px #ggg solid;font-size:12px" href="{{route('admin.get.view.order',$transaction->id)}}"><i class="fas fa-eye"></i></a>
               
                  </td>
                </tr>
                
                @endforeach
              @endif
          </tbody>
        </table>
    </div>

    <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="myModalOrder" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Chi tiết đơn hàng <b class="transaction_id"></b></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" id="md-content">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
      </div>
    </div>

  </div>
</div>
@stop

@section('script')
    <script>
        $(function(){
            $(".js_order_item").click(function(e){
                e.preventDefault();
                let $this=$(this);
                let url=$this.attr("href");
                $("#md-content").html("");
                $(".transaction_id").text('').text($this.attr("data-id"));
                $("#myModalOrder").modal('show');
           
                $.ajax({
				url: url,
			})
			.done(function(result) {
				 if(result)
                 {
                     $("#md-content").append(result);
                 }
			})
            });
        })
    </script>
@stop