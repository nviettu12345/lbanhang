<section class="content">
    <div class="row">
        <div class="col-md-12">
<form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
       @csrf
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Slide</h3>
        </div>
        <div class="card-body">


            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Tên slide : </label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{old('name',isset($slide->name)?$slide->name:'')}}">

                </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Hình slide: </label>
                <div class="col-sm-6 ">
                    <div class="img-wraps">
                        @if(isset($slide->img) && $slide->img)
                        <span url="{{route('admin.ajax.action.slide',['delImg',$slide->id])}}"   class="closes" title="Delete">&times;</span>
                       
                            <img id="out_img" style="margin-bottom:5px" width="100px" class="img img-responsive" src="{{asset('upload/slide/'.$slide->img)}}">
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
                <input type="text" class="form-control" id="ext_url" name="ext_url" value="{{old('ext_url',isset($slide->ext_url)?$slide->ext_url:'')}}">
                <small>Khi bấm vào slide sẽ chuyển đến trang liên kết này, mặc định bỏ trống</small>     
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
                <input {{isset($slide->active)?($slide->active==1?'checked':''):'checked'}} type="checkbox" name="active" >
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Số STT : </label>
                <div class="col-sm-1">
                <input style="width:50px" type="number" name="num" value="{{old('num',isset($slide->num)?$slide->num:'0')}}">
                </div>
            </div>    
   
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>    
        </div>
    </div>
            </form>
            </div><!--/.col (right) -->
    </div>
</section>
      