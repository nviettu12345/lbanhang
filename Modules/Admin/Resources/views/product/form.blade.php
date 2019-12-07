<section class="content">
    <div class="row">
        <div class="col-md-12">
<form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
       @csrf
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Quản lý sản phẩm</h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Danh mục SP : </label>
                <div class="col-sm-6">
              <select class="form-control" name="cat_id" id="pid" url="{{route('admin.ajax.checkcomp.product')}}">
                  <option value="0">--- chọn danh mục cha ----</option>
                  @if(isset($catalogTree))
                     <?php echo $catalogTree ?>
                  @endif
              </select>
              @if ($errors->has('cat_id'))
                        <span class="error-text" >
                            <strong>{{ $errors->first('cat_id') }}</strong>
                        </span>
                @endif
                </div>
            </div>

            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Tên sản phẩm : </label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{old('name',isset($product->name)?$product->name:'')}}">
                @if ($errors->has('name'))
                        <span class="error-text" >
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                @endif
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Hình đại diện : </label>
                <div class="col-sm-6 ">
                    <div class="img-wraps">
                        @if(isset($product->img) && $product->img)
                        <span url="{{route('admin.ajax.action.product',['delImg',$product->id])}}"   class="closes" title="Delete">&times;</span>
                       
                            <img id="out_img" style="margin-bottom:5px" width="100px" class="img img-responsive" src="{{asset('upload/product/'.$product->img)}}">
                        @endif
                        <img   id="out_img"  style="margin-bottom:5px" width="100px" class="img img-responsive">  
                    </div>
               <input id="input_img" type="file" class="form-control" name="img">
                @if ($errors->has('img'))
                        <span class="error-text" >
                            <strong>{{ $errors->first('img') }}</strong>
                        </span>
                @endif
                </div>
            </div>

            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">danh sách hình : </label>
                <div class="col-sm-6 ">
                @if(isset($product->img_list) && $product->img_list)
                      <?php
                      $img_lists = json_decode($product->img_list);?>
                     
                    <div class="ImgList">
                    @foreach($img_lists as $img_list)
                        <img style="margin-bottom:5px" width="100px" class="img img-responsive" src="{{asset('upload/product/'.$img_list)}}">
                    @endforeach    
                    <a style="cursor:pointer" url="{{route('admin.ajax.action.product',['delImgList',$product->id])}}" class="delImgList btn btn-outline-danger">xóa ảnh</a>
                  
                    </div>
                    
                     @endif
               <input multiple type="file" class="form-control" name="img_list[]">
                @if ($errors->has('img_list'))
                        <span class="error-text" >
                            <strong>{{ $errors->first('img_list') }}</strong>
                        </span>
                @endif
                </div>
            </div>

            <div class="form-group row tab-1">
                <label  class="col-sm-2 col-form-label">Mã sản phẩm  : </label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="code" name="code" value="{{old('code',isset($product->code)?$product->code:'')}}">
                </div>
            </div>
            <div class="form-group row tab-1">
                <label  class="col-sm-2 col-form-label">Giá sản phẩm  : </label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="price" name="price" value="{{old('$product->price',isset($product->price)?$product->price:'0')}}">
                </div>
            </div>
            <div class="form-group row tab-1">
                <label  class="col-sm-2 col-form-label">Giá Khuyến mãi (%) : </label>
                <div class="col-sm-10">
                <input type="text" class="form-control"  id="sale" name="sale" value="{{old('sale',isset($product->sale)?$product->sale:'0')}}">
                </div>
            </div>
            <div class="form-group row tab-1">
                <label  class="col-sm-2 col-form-label">Liên kết ngoài : </label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="ext_url" name="ext_url" value="{{old('ext_url',isset($product->ext_url)?$product->ext_url:'')}}">
                <small>Khi bấm vào sản phẩm sẽ chuyển đến trang liên kết này, mặc định bỏ trống</small>     
            </div>
            </div>
            <div class="form-group row tab-1">
                <label  class="col-sm-2 col-form-label">tag : </label>
                <div class="col-sm-10">
                @if(isset($product->tag) && $product->tag)
                <?php $tag=json_decode($product->tag);
                 $str_tag='';
                foreach($tag as $t){
                    $str_tag.=$t->name_tag.",";
                }
                ?>
                @endif
                <input type="text" class="form-control" data-role="tagsinput" id="tag" name="tag" value="{{old('tag',isset($str_tag)?$str_tag:'')}}">
                
            </div>
            </div>
            <div class="form-group row tab-1">
                <label  class="col-sm-2 col-form-label">thuộc tính sản phẩm : </label>
                <div class="col-sm-10">
                                   <table class="table" style="width: 100%">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên thuộc tính</th>
                                        <th scope="col">Giá trị</th>
                                        <th scope="col">hành động</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if(isset($product->attr) && $product->attr)    
                                        $attrs = json_decode($product->attr); ?>
                                      <?php foreach ($attrs as $key => $row): ?>
                                      <tr>
                                        <th scope="row"><?php echo $key ?></th>
                                        <td><input type="text" class="attr" name="attr[]" value="<?php echo $row->name ?>"></td>
                                        <td><input type="text" class="value" name="value[]" value="<?php echo $row->value ?>"></td>
                                        <td><a class="btn btn-outline-danger del_row" url="">
                                      <span >xóa</span>
                                      </a></td>
                                      </tr>
                                    <?php endforeach ?>
                                    </tbody>
                                  </table>
                                     <a id="add_row" class="btn btn-outline-warning" url="">
                                      <span >thêm hàng</span>
                                      </a>
                                </div>
            </div>
            <div class="form-group row tab-1">
                <label  class="col-sm-2 col-form-label">Mô tả  : </label>
                <div class="col-sm-10">
                <textarea type="text" class="form-control" id="description" name="description">{{old('description',isset($product->description)?$product->description:'')}}</textarea>
                </div>
            </div>
            <div class="form-group row tab-1">
                <label  class="col-sm-2 col-form-label">Nội dung  : </label>
                <div class="col-sm-10">
                <textarea type="text" class="form-control" id="content" name="content">{{old('content',isset($product->content)?$product->content:'')}}</textarea>
                </div>
            </div>

        </div>
    </div>

    <!-- SEO -->
    <br>
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Quản lý SEO</h3>
        </div>
        <div class="card-body">
        <a  class="btn btn-primary tao-seo" style="color:white"> Tạo SEO</a>
        <small>click vào nút này để tự động tạo SEO</small>
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Tiêu đề : </label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="seo_title" name="title" value="{{old('title',isset($product->seo_title)?$product->seo_title:'')}}">
                <small>thêm các ký tự sau cho nổi bật trên google: ⭐</small>   
                <input style="width: 70px" type="text" name="key_title" class="form-control" id="key_title" value="100">
                 
            </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Đường dẫn : </label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug',isset($product->slug)?$product->slug:'')}}">
                
            </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Mô tả : </label>
                <div class="col-sm-10">
                <textarea class="form-control" name="seo_description" id="seo_description">{{old('seo_description',isset($product->seo_description)?$product->seo_description:'')}}</textarea>
                <small>thêm các ký tự sau cho nổi bật trên google: ✅</small>     
                <input style="width: 70px" type="text" name="key_short" class="form-control" id="key_short" value="325">
            </div>
            </div> 
        </div>
    </div>
  
    <br>
    <div class="card">
        <div class="card-body">
            <div class="form-group row">
                <label  class="col-sm-2 ">Hiển thị : </label>
                <div class="col-sm-1">
                <input {{isset($product->active)?($product->active==1?'checked':''):'checked'}} type="checkbox" name="active" >
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Số STT : </label>
                <div class="col-sm-1">
                <input style="width:50px" type="number" name="num" value="{{old('num',isset($product->num)?$product->num:'0')}}">
                </div>
            </div>    
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Tùy chọn : </label>
                <div class="col-sm-10">
                <input {{isset($product->is_noindex)?($product->is_noindex==1?'checked':''):''}} style="width:50px" type="checkbox" name="is_noindex"> No index, No follow
                <input {{isset($product->hot)?($product->hot==1?'checked':''):''}} style="width:50px" type="checkbox" name="hot"> hot
                </div>
            </div>    
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>    
        </div>
    </div>
            </form>
            </div><!--/.col (right) -->
    </div>
</section>
@section('script')
    <script>
        $(function(){
    
//  thuộc tính sản phẩm
    $("#add_row").on("click",function(event) {
        $count=$(".table").find("tr").length;
        $count-=1;
        // $(".table").append('<tr><td>my data</td><td>more data</td></tr>');
          $html= '<tr>';
          $html+='<th scope="row">'+ $count +'</th>';
          $html+='<td><input type="text" class="attr" name="attr[]" value=""></td>';
          $html+='<td><input type="text" class="value" name="value[]" value=""></td>';
          $html+='<td><a class="btn btn-outline-danger del_row" url=""><span >xóa</span></a></td>';
          $html+= '</tr>';
          $(".table").append($html);
    });

      $('body').on('click', '.del_row', function(event) {
        $(this).parent().parent().detach(); 
      });
   

        });

          CKEDITOR.replace( 'content');

   
    </script>
@stop            