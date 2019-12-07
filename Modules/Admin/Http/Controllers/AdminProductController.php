<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestProduct;
use App\Models\Attr_product;
use App\Models\Category;
use App\Models\Cattype;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;


class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $cataloglist=Category::all();
        $products=Product::with('category:id,name');
        //loc san pham theo name
        if(isset($request->name)) $products->where('name', 'like','%'.$request->name.'%');
        //loc san pham theo danh mục
        if(isset($request->cate)) {
            $products->where('cat_id',$request->cate);
            $catalogTree=showCategories($cataloglist,0,'',$request->cate,6);
        }
        else{
            $catalogTree=showCategories($cataloglist,0,'','',6);
        }
        $products=$products->paginate(20);
        $total=$products->count();
        
        $viewData=[
        'catalogTree'=>$catalogTree,
        'products' => $products,
        'total' => $total
        ];
        return view('admin::product.index',$viewData);
    }

    public function create()
    {
        $cattype=Cattype::select('id','name')->get();
        $cataloglist=Category::all();
        $catalogTree=showCategories($cataloglist,0,'','',6);
        $attrs=Attr_product::all();
        $viewData=[
             'catalogTree'=>$catalogTree,
             'attrs' =>$attrs
        ];
        return view('admin::product.create',$viewData);
    }

    public function store(RequestProduct $requestProduct)
    {
        $this->insertOrUpdate($requestProduct);
     
      
      return redirect()->back()->with('success','thêm mới thành công');
      
    }

    public function edit($id)
    {
        $cataloglist=Category::all();
        
        $product=Product::find($id);
        $catalogTree=showCategories($cataloglist,0,'',$product->cat_id,9);
        $attrs=Attr_product::all();
        $viewData=[
            'product'=>$product,
            'catalogTree' => $catalogTree,
            'attrs' =>$attrs
        ];
        return view('admin::product.update',$viewData);
    }

    public function update(RequestProduct $requestProduct,$id)
    {
        
        $this->insertOrUpdate($requestProduct,$id);

      return redirect()->back()->with('success','cập nhật thành công');
    }

    public function insertOrUpdate($requestProduct,$id='')
    {

            $product=new Product();

            if($id){
                $product=Product::find($id);
                // kiểm tra có file upload không
                if($requestProduct->hasFile('img') && $product->img){
                    $path="upload/product";
                    delete_img($path,$product);
                }
                // kiểm tra có file upload không 
                if($requestProduct->hasFile('img_list') && $product->img_list){
                     // xóa hình ảnh trong thư mục chứa
                     $path="upload/product";
                     delete_img($path,$product,$product->img_list);
                }

            }
          
          $product->name=$requestProduct->name;
          $product->cat_id=$requestProduct->cat_id;
          $product->code=$requestProduct->code;
          $product->price=$requestProduct->price;
          $product->sale=$requestProduct->sale;
          $product->description=$requestProduct->description;
          $product->content=$requestProduct->content;
          $product->ext_url=$requestProduct->ext_url;
          $product->hot=$requestProduct->hot?'1':'0';
          $product->is_noindex=$requestProduct->is_noindex?'1':'0';
          $product->slug=$requestProduct->slug?$requestProduct->slug:Str::slug($requestProduct->name);
          $product->seo_title=$requestProduct->title?$requestProduct->title:$requestProduct->name;
          $product->seo_description=$requestProduct->seo_description;
          $product->active=$requestProduct->active?'1':'0';
            
          // xu ly the tag
			$tag=array();
			$tag_vn=strval($requestProduct->tag);
			$tag_vn=explode(",", $tag_vn);
	    	foreach ($tag_vn as $key => $value) {
                $tag[$key]['name_tag']=$value;
                $tag[$key]['slug_tag']=Str::slug($value);
	    	}
            $product->tag=json_encode($tag);

            // xu ly thuoc tinh sản phẩm
				$attr=array();
				$value=array();
				$value=$requestProduct->value;
                $attr=$requestProduct->attr;
                $attrs=array();
                for($i=0;$i<count($attr);$i++){
                    $attrs[$i]=array(
                        'name' => $attr[$i],
                        'value' => $value[$i]
                    );
                }
           
				// $attr=array_combine($name, $value);
				$product->attr=json_encode($attrs);
          //upload 1 file
          if($requestProduct->hasFile('img')){
            
              $path='upload/product';
              
              $file=upload_image('img',$path,$requestProduct);
              
              if(isset($file)){
                  $product->img=$file;
              }
          }

          // uppload nhiều file
          if($requestProduct->hasFile('img_list')){
         
            $path='upload/product';
            
            $file=upload_image_list('img_list',$path,$requestProduct);
            
            if(isset($file)){
                $product->img_list=json_encode($file);
            }
        }
          
        $product->save();
    }

    public function action(Request $request,$action,$id='')
    {  
      
        if($request->ajax())
        {
            if($request->ids) $ids=$request->ids;

            if($action)
            {
                    $product=Product::find($id);
                    $info= array(
                        'active' => '',
                        'hot' => '',
                        'mess' => '',
                        'id'=>'',
                        'activeAll' =>''
                    );
                    switch ($action) {
                        case 'delete':
                            $path="upload/product";
                            delete_img($path,$product);
                            delete_img($path,$product,$product->img_list);
                            $product->delete();
                            $info['mess']="xóa dữ liệu thành công";
                            $info['id']=$id;
                            break;
                        case 'active':
                            $product->active = $product->active?0:1;
                            $product->save();
                            $info['mess']="cập nhật dữ liệu thành công";
                            $info['active']=$product->active;
                            break;   
                        case 'hot':
                            $product->hot = $product->hot?0:1;
                            $product->save();
                            $info['mess']="cập nhật dữ liệu thành công";
                            $info['hot']=$product->hot;
                            break;   
                        case 'order':
                            $product->num=$request->num;
                            $product->save();
                            break;   
                        case 'delImg':
                            // xóa hình ảnh trong thư mục chứa
                            $path="upload/product";
                            delete_img($path,$product);
                            break; 
                        case 'delImgList':
                            // xóa hình ảnh trong thư mục chứa
                            $path="upload/product";
                            delete_img($path,$product,$product->img_list);
                            break;   
                    }
            }
            if($action=='deleteAll')
            {
                 //xoa hinh anh khi xoa nhiều
                 foreach($ids as $id){
                    $product=Product::find($id);
                    $path="upload/product";
                    delete_img($path,$product);
                    delete_img($path,$product,$product->img_list);
                }

                Product::whereIn('id',$ids)->delete();
                return $ids;    
            }
            if($action=='activeAll')
            {
                $active=array();
                foreach($ids as $id){
                    $product=Product::find($id);
                    $product->active = $product->active?0:1;
                    $product->save();
                    $result=array(
                        'id' => $id,
                        'active' => $product->active
                    );
                    array_push($active,$result);
                }
                return response()->json($active);
            }
        return response()->json($info);
      }
    }
    // kiểm tra danh mục có phải là danh mục có danh mục con hay kg
    public function check_comp(Request $request)
    {
        if($request->ajax())
        {
            $error= array(
                'error' => '',
                'mess' => 'bạn chưa chọn đúng danh mục chứa sản phẩm'
            );
            $id=$request->pid;
            $Catogory=Category::find($id);
            if($Catogory->type!='6')
            {
                $error['error']='a';
            }
            else{
                $error['error']='b';
            }
            return response()->json($error);
         }
    }

}
