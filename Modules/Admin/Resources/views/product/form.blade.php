<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-8">
        <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" class="form-control" name="pro_name" value="{{old('pro_name',isset($product->pro_name)?$product->pro_name:'')}}" id="pro_name" placeholder="tên sản phẩm">
                @if ($errors->has('pro_name'))
                        <span class="error-text" >
                            <strong>{{ $errors->first('pro_name') }}</strong>
                        </span>
                @endif
            </div>

            <div class="form-group">
                <label for="name">Mô tả </label>
                <textarea name="pro_description" id="" class="form-control" rows="3" placeholder="mô tả ngắn sản phẩm" >{{old('pro_description',isset($product->pro_description)?$product->pro_description:'')}}</textarea>
            </div>
            <div class="form-group">
                <label for="name">Nội dung </label>
                <textarea name="pro_content" id="pro_content" class="form-control" rows="3"  >{{old('pro_content',isset($product->pro_content)?$product->pro_content:'')}}</textarea>
            </div>

            <div class="form-group">
                <label for="name">Meta title</label>
                <input type="text" name="pro_title_seo" class="form-control" value="{{old('pro_title_seo',isset($product->pro_title_seo)?$product->pro_title_seo:'')}}" id="pro_title_seo" placeholder="">
            </div>

            <div class="form-group">
                <label for="name">Meta Description</label>
                <input type="text" name="pro_description_seo" class="form-control" value="{{old('pro_description_seo',isset($product->pro_description_seo)?$product->pro_description_seo:'')}}" id="pro_description_seo" placeholder="">
            </div>

            
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                    <label for="name">Loại sản phẩm: </label>
                    <select class="form-control" name="pro_category_id" id="pro_category_id">
                        <option value=""> ----- Chọn loại sản phẩm -----</option>
              
                        @if(isset($categories))
                            @foreach($categories as $category)
                                <option {{old('pro_category_id',isset($product->pro_category_id)?$product->pro_category_id:'') == $category->id ? 'selected':'' }}  value="{{$category->id}}">{{$category->c_name}}</option>
                            @endforeach
                        @endif
                    </select>
                    @if ($errors->has('pro_category_id'))
                        <span class="error-text" >
                            <strong>{{ $errors->first('pro_category_id') }}</strong>
                        </span>
                @endif
            </div>

            <div class="form-group">
                    <label for="name">Giá sản phẩm: </label>
                    <input type="number" name="pro_price" class="form-control" value="{{old('$product->pro_price',isset($product->pro_price)?$product->pro_price:'0')}}"/>
            </div>

            <div class="form-group">
                    <label for="name">% khuyến mãi: </label>
                    <input type="number" name="pro_sale" class="form-control" value="{{old('$product->pro_sale',isset($product->pro_sale)?$product->pro_sale:'0')}}"/>
            </div>
            <div class="form-group">
                    <label for="name">Số lượng: </label>
                    <input type="number" name="pro_number" class="form-control" value="{{old('$product->pro_number',isset($product->pro_number)?$product->pro_number:'0')}}"/>
            </div>

            <div class="form-group">
                    <label for="name">Avatar: </label>
                    @if(isset($product->pro_avatar))
                     <img style="margin-bottom:5px" width="100px" class="img img-responsive" src="{{asset('upload/product/'.$product->pro_avatar)}}">
                    
                    @endif
                    <img   id="out_img"  style="margin-bottom:5px" width="100px" class="img img-responsive" src="">
                    
                    <input id="input_img" type="file" name="pro_avatar" class="form-control"/>
                    @if ($errors->has('pro_avatar'))
                        <span class="error-text" >
                            <strong>{{ $errors->first('pro_avatar') }}</strong>
                        </span>
                @endif
            </div>

            <div class="form-group">
                <div class="checkbox">
                    <label><input type="checkbox" name="hot"/>nổi bật</label>
                </div>
            </div>

           
        </div>
    </div>
           
         
    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
</form>


