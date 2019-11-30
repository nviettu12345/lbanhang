@if($orders)
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Giá</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Thành tiền</th>
      <th scope="col">Thao tác</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1;?>
    @foreach($orders as $key => $order)
    <tr>
        <td>{{$i}}</td>
        <td class="product-thumbnail"><img width="80px" src="{{isset($order->product->pro_avatar)?asset('upload/product/'.$order->product->pro_avatar):''}}"></td>
        
        <td class="product-name"><a href="{{route('get.detail.product',[str_slug($order->product->pro_name),$order->or_product_id])}}">{{isset($order->product->pro_name)?$order->product->pro_name:''}}</a></td>
        <td class="product-price"><span class="amount">{{number_format($order->or_price,0,',','.') }} VNĐ</span></td>
        <td class="product-quantity">{{$order->or_qty}}</td>
        <td class="product-subtotal">{{number_format($order->or_qty*$order->or_price,0,',','.') }} VNĐ</td>
        <td class="product-remove"> 
        <a href=""><i class="fa fa-times" aria-hidden="true"></i></a>
        </td>
    </tr>
    <?php $i++;?>
    @endforeach
  </tbody>
</table>
@endif