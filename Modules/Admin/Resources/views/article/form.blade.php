<section class="content">
    <div class="row">
        <div class="col-md-12">
<form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
       @csrf
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Bài viết</h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Danh mục bài viết : </label>
                <div class="col-sm-6">
              <select class="form-control" name="cat_id" id="pid" url="{{route('admin.ajax.checkcomp.article')}}">
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
                <label  class="col-sm-2 col-form-label">Tên bài viết : </label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{old('name',isset($article->name)?$article->name:'')}}">
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
                        @if(isset($article->img) && $article->img)
                        <span url="{{route('admin.ajax.action.article',['delImg',$article->id])}}"   class="closes" title="Delete">&times;</span>
                       
                            <img id="out_img" style="margin-bottom:5px" width="100px" class="img img-responsive" src="{{asset('upload/article/'.$article->img)}}">
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
            <div class="form-group row tab-1">
                <label  class="col-sm-2 col-form-label">Liên kết ngoài : </label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="ext_url" name="ext_url" value="{{old('ext_url',isset($article->ext_url)?$article->ext_url:'')}}">
                <small>Khi bấm vào sản phẩm sẽ chuyển đến trang liên kết này, mặc định bỏ trống</small>     
            </div>
            </div>
            <div class="form-group row tab-1">
                <label  class="col-sm-2 col-form-label">tag : </label>
                <div class="col-sm-10">
                @if(isset($article->tag) && $article->tag)
                <?php $tag=json_decode($article->tag);
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
                <label  class="col-sm-2 col-form-label">Mô tả  : </label>
                <div class="col-sm-10">
                <textarea type="text" class="form-control" id="description" name="description">{{old('description',isset($article->description)?$article->description:'')}}</textarea>
                </div>
            </div>
            <div class="form-group row tab-1">
                <label  class="col-sm-2 col-form-label">Nội dung  : </label>
                <div class="col-sm-10">
                <textarea type="text" class="form-control" id="content" name="content">{{old('content',isset($article->content)?$article->content:'')}}</textarea>
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
                <input type="text" class="form-control" id="seo_title" name="title" value="{{old('title',isset($article->seo_title)?$article->seo_title:'')}}">
                <small>thêm các ký tự sau cho nổi bật trên google: ⭐</small>   
                <input style="width: 70px" type="text" name="key_title" class="form-control" id="key_title" value="100">
                 
            </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Đường dẫn : </label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug',isset($article->slug)?$article->slug:'')}}">
                
            </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Mô tả : </label>
                <div class="col-sm-10">
                <textarea class="form-control" name="seo_description" id="seo_description">{{old('seo_description',isset($article->seo_description)?$article->seo_description:'')}}</textarea>
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
                <input {{isset($article->active)?($article->active==1?'checked':''):'checked'}} type="checkbox" name="active" >
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Số STT : </label>
                <div class="col-sm-1">
                <input style="width:50px" type="number" name="num" value="{{old('num',isset($article->num)?$article->num:'0')}}">
                </div>
            </div>    
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Tùy chọn : </label>
                <div class="col-sm-10">
                <input {{isset($article->is_noindex)?($article->is_noindex==1?'checked':''):''}} style="width:50px" type="checkbox" name="is_noindex"> No index, No follow
                <input {{isset($article->hot)?($article->hot==1?'checked':''):''}} style="width:50px" type="checkbox" name="hot"> hot
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