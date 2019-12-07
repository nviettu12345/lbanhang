<section class="content">
    <div class="row">
        <div class="col-md-12">
    <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
       @csrf
    <div class="card card-primary">
        <div class="card-header">
        <h3  class="card-title">Quản lý danh mục</h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Tên danh mục : </label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{old('name',isset($category->name)?$category->name:'')}}" id="name" placeholder="tên danh mục">
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
                        @if(isset($category->img) && $category->img)
                        <span url="{{route('admin.ajax.action.category',['delImg',$category->id])}}"   class="closes" title="Delete">&times;</span>
                       
                            <img id="out_img" style="margin-bottom:5px" width="100px" class="img img-responsive" src="{{asset('upload/category/'.$category->img)}}">
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
                <label  class="col-sm-2 col-form-label">Danh mục cha : </label>
                <div class="col-sm-6">
              <select class="form-control" name="pid" id="pid" url="{{route('admin.ajax.checkcomp.category')}}">
                  <option value="0">--- chọn danh mục cha ----</option>
                    <?php echo $catalogTree ?>
              </select>
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Thể loại : </label>
                <div class="col-sm-3">
              <select class="form-control" name="type" id="type" data-id="{{isset($homepage)?$homepage:''}}">
                  <option  value="">--- chọn thể loại ----</option>
                  @foreach($cattype as $type)
                    <option class="type_{{$type->id}}" {{isset($category)?($type->id==$category->type?'selected':''):''}} value="{{$type->id}}">{{$type->name}}</option>    
                  @endforeach
              </select>
                  @if ($errors->has('type'))
                        <span class="error-text" >
                            <strong>{{ $errors->first('type') }}</strong>
                        </span>
                @endif
                </div>
            </div>
            <div class="form-group row tab-1">
                <label  class="col-sm-2 col-form-label">Mô tả  : </label>
                <div class="col-sm-10">
                <textarea type="text" class="form-control" id="description" name="description">{{old('description',isset($category->description)?$category->description:'')}}</textarea>
                </div>
            </div>
            <div class="form-group row tab-1">
                <label  class="col-sm-2 col-form-label">Nội dung  : </label>
                <div class="col-sm-10">
                <textarea type="text" class="form-control" id="content" name="content">{{old('content',isset($category->content)?$category->content:'')}}</textarea>
                </div>
            </div>
            
            <div class="form-group row tab-3">
                <label  class="col-sm-2 col-form-label">link liên kết : </label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="ext_url" value="{{old('name',isset($category->ext_url)?$category->ext_url:'')}}">
                </div>
            </div>
        </div>
    </div>

    <!-- SEO -->
    <br>
    <div class="card">
        <div class="card-header">
        <h3>Quản lý SEO</h3>
        </div>
        <div class="card-body">
        <a  class="btn btn-primary tao-seo" style="color:white"> Tạo SEO</a>
        <small>click vào nút này để tự động tạo SEO</small>
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Tiêu đề : </label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="seo_title" name="seo_title" value="{{old('seo_title',isset($category->seo_title)?$category->seo_title:'')}}">
                <small>thêm các ký tự sau cho nổi bật trên google: ⭐</small>   
                <input style="width: 70px" type="text" name="key_title" class="form-control" id="key_title" value="100">
                 
            </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Đường dẫn : </label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug',isset($category->slug)?$category->slug:'')}}" id="slug">
                
            </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Mô tả : </label>
                <div class="col-sm-10">
                <textarea class="form-control" name="seo_description" id="seo_description">{{old('seo_description',isset($category->seo_description)?$category->seo_description:'')}}</textarea>
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
                <input {{isset($category->active)?($category->active==1?'checked':''):'checked'}} type="checkbox" name="active" >
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Số STT : </label>
                <div class="col-sm-1">
                <input style="width:50px" type="number" name="num" value="{{old('num',isset($category->num)?$category->num:'0')}}">
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
        });
          CKEDITOR.replace( 'content');
    </script>
@stop            