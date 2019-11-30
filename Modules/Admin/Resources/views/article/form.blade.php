<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
        <div class="form-group">
                <label for="name">Tên bài viết</label>
                <input type="text" class="form-control" name="a_name" value="{{old('a_name',isset($article->a_name)?$article->a_name:'')}}" id="a_name" placeholder="tên bài viết">
                @if ($errors->has('a_name'))
                        <span class="error-text" >
                            <strong>{{ $errors->first('a_name') }}</strong>
                        </span>
                @endif
            </div>

            <div class="form-group">
                <label for="name">Mô tả </label>
                <textarea name="a_description" id="" class="form-control" rows="3" placeholder="mô tả ngắn bài viết" >{{old('a_description',isset($article->a_description)?$article->a_description:'')}}</textarea>
            </div>
            <div class="form-group">
                <label for="name">Nội dung </label>
                <textarea name="a_content" id="" class="form-control" rows="3"  >{{old('a_content',isset($article->a_content)?$article->a_content:'')}}</textarea>
            </div>

            <div class="form-group">
                <label for="name">Meta title</label>
                <input type="text" name="a_title_seo" class="form-control" value="{{old('a_title_seo',isset($article->a_title_seo)?$article->a_title_seo:'')}}" id="a_title_seo" placeholder="">
            </div>

            <div class="form-group">
                <label for="name">Meta Description</label>
                <input type="text" name="a_description_seo" class="form-control" value="{{old('a_description_seo',isset($article->a_description_seo)?$article->a_description_seo:'')}}" id="a_description_seo" placeholder="">
            </div>

            <div class="form-group">
                    <label for="name">Avatar: </label>
                    @if(isset($article->a_avatar))
                     <img style="margin-bottom:5px" width="100px" class="img img-responsive" src="{{asset('upload/article/'.$article->a_avatar)}}">
                    
                    @endif
                    <img   id="out_img"  style="margin-bottom:5px" width="100px" class="img img-responsive" src="">
                    
                    <input  id="input_img" type="file" name="a_avatar" class="form-control"/>
                    @if ($errors->has('a_avatar'))
                        <span class="error-text" >
                            <strong>{{ $errors->first('a_avatar') }}</strong>
                        </span>
                @endif
            </div>

             <button type="submit" class="btn btn-primary">Lưu thông tin</button>    
        </div>
    </div>      

</form>