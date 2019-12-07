<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">widget Trang chủ</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tên widget : </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name',isset($slide->name)?$slide->name:'')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Username" class="col-sm-2 col-form-label">Chọn thể loại :</label>
                            <div class="col-sm-5">
                                <select id="comp" name="comp" class="form-control" ?>">
                                    <option value="0">thể loại</option>
                                    <?php foreach ($widget_comps as $key => $widget_comp) : ?>
                                        <option value="{{ $widget_comp->id }}">{{$widget_comp->name}}</option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <hr>

                        <div id="" class="tab-content form-group row tab-7">
                            <label for="" class="col-sm-2 col-form-label">Nội dung:</label>
                            <div class="col-sm-10">
                                <textarea name="content" id="content">{{old('content',isset($slide->content)?$slide->content:'')}}</textarea>
                            </div>
                        </div>

                        <div id="" class="tab-content form-check row tab-2">
                            <label for="" class="col-sm-2">Loại sản phẩm:</label>
                            <?php foreach ($widget_options as $key => $option) : ?>
                                <input type="radio" style="margin:0 5px 0 10px " value="{{ $option->id }}" name="type" id="">{{$option->name }}
                            <?php endforeach ?>
                        </div>

                        <div id="" class="tab-content form-check row tab-2 tab-cat-product">

                            <label for="" class="col-sm-2">chọn danh mục:</label>
                            <?php foreach ($cat_products as $key => $cat_product) : ?>
                                <input type="checkbox" style="margin:0 5px 0 30px " value="{{$cat_product->id}}" name="ptype[]">{{$cat_product->name}}
                            <?php endforeach ?>
                            <br>
                            <label for="" class="col-sm-2"></label>
                            <small>không check là hiển thị tất cả danh mục</small>
                        </div>
                        <div id="" class="tab-content form-check row tab-3">
                            <label for="" class="col-sm-2">Loại tin tức:</label>
                            <?php foreach ($widget_options as $key => $option) : ?>
                                <input type="radio" style="margin:0 5px 0 10px " value="{{ $option->id }}" name="type" id="">{{$option->name }}
                            <?php endforeach ?>
                        </div>
                        <div id="" class="tab-content form-check row tab-3 tab-cat-news">
                            <label for="" class="col-sm-2">chọn danh mục:</label>
                            <?php foreach ($cat_articles as $key => $cat_article) : ?>
                                <input type="checkbox" style="margin:0 5px 0 30px " value="{{$cat_article->id}}" name="ptype[]">{{$cat_article->name}}
                            <?php endforeach ?>
                            <br>
                            <label for="" class="col-sm-2"></label>
                            <small>không check là hiển thị tất cả danh mục</small>
                        </div>

                        <div id="" class="tab-content form-check row tab-10">
                            <label for="" class="col-sm-2">Loại video:</label>
                            <?php foreach ($widget_options as $key => $option) : ?>
                                <input type="radio" style="margin:0 5px 0 10px " value="{{ $option->id }}" name="type" id="">{{$option->name }}
                            <?php endforeach ?>
                        </div>

                        <div id="" class="tab-content form-check row tab-cat-product tab-cat-news">
                            <hr>
                            <label for="" class="col-sm-2">số cột:</label>
                            <input type="input" style="width: 30px;text-align: center; " value="4" name="column" id="column">
                        </div>

                        <div id="" class="tab-content form-check row tab-3 tab-2 tab-10 tab-1">
                            <hr>
                            <label for="" class="col-sm-2">số lượng:</label>
                            <input type="input" style="width: 30px;text-align: center; " value="4" name="qlimit" id="">
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 ">Hiển thị : </label>
                                    <div class="col-sm-1">
                                        <input {{isset($slide->active)?($slide->active==1?'checked':''):'checked'}} type="checkbox" name="active">
                                    </div>
                                    <label for="" class="col-sm-2">Ẩn tiêu đề:</label>
                                    <div class="col-sm-1">
                                        <input checked type="checkbox" name="is_show_title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Số STT : </label>
                                    <div class="col-sm-1">
                                        <input style="width:50px" type="number" name="num" value="{{old('num',isset($slide->num)?$slide->num:'0')}}">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                            </div>
                        </div>
            </form>
        </div>
        <!--/.col (right) -->
    </div>
</section>
@section('script')
    <script>
          CKEDITOR.replace( 'content');
    </script>
@stop   