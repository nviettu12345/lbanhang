<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Http\Requests\RequestCategory;
use App\Models\Article;
use App\Models\Category;
use App\Models\Cattype;
use App\Models\Product;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Str;
class AdminCategoryController extends Controller
{

    public function index(Request $request)
    {
        $categories=Category::select('id','name','num','type','active');
                                
        if($request->pid)
        {         
            $pid=$request->pid;
            if($pid>0){            
                $categories->where('pid',$pid);
            }       
        }
        else{
            $categories->where('pid','0');
        }   
        $categories=$categories->orderBy('num','ASC')->orderBy('id','DESC')->paginate(10);
        $total=$categories->count();            
        $viewData=[
            'categories'=>$categories,
            'total' => $total
        ];
        return view('admin::category.index',$viewData);
    }

    public function create()
    {
        $cattype=Cattype::select('id','name')->get();
        $cataloglist=Category::all();
        $catalogTree=showCategories($cataloglist,0,'','',9);
        $homepage=Category::where('type',1)->get()->count();
        $viewData=[
            'cattype'=>$cattype,
             'catalogTree'=>$catalogTree,
             'homepage' => $homepage
        ];
        return view('admin::category.create',$viewData);
    }

    public function store(RequestCategory $requestCategory)
    {
        $this->insertOrUpdate($requestCategory);
     
      
      return redirect()->back()->with('success','thêm mới thành công');
      
    }

    public function edit($id)
    {
        $cataloglist=Category::all();
        $catalogTree=showCategories($cataloglist,0,'','',9);
        $category=Category::find($id);
        $homepage=Category::where('type',1)->get()->count();
        $cattype=Cattype::select('id','name')->get();
        $viewData=[
            'cattype'=>$cattype,
            'category'=>$category,
            'catalogTree' => $catalogTree,
            'homepage' => $homepage
        ];
        return view('admin::category.update',$viewData);
    }

    public function update(RequestCategory $requestCategory,$id)
    {
        
        $this->insertOrUpdate($requestCategory,$id);

      return redirect()->back()->with('success','cập nhật thành công');
    }

    public function insertOrUpdate($requestCategory,$id='')
    {

            $category=new Category();

            if($id){
                $category=Category::find($id);
                 // kiểm tra có file upload không
                 if($requestCategory->hasFile('img') && $category->img){
                    // xóa hình ảnh trong thư mục chứa nếu tồn tại
                     $path="upload/category";
                     delete_img($path,$category);
              }
            }
          
          $category->name=$requestCategory->name;
          $category->pid=$requestCategory->pid;
          $category->type=$requestCategory->type;
          $category->description=$requestCategory->description;
          $category->content=$requestCategory->content;
          $category->ext_url=$requestCategory->ext_url;
          $category->slug=$requestCategory->slug?$requestCategory->slug:Str::slug($requestCategory->name);
          $category->seo_title=$requestCategory->seo_title?$requestCategory->seo_title:$requestCategory->name;
          $category->seo_description=$requestCategory->seo_description;
          $category->active=$requestCategory->active?'1':'0';
          $category->num=$requestCategory->num;
          
          if($requestCategory->type==1)  $category->slug="/";
          if($requestCategory->hasFile('img')){
         
              $path='upload/category';
              
              $file=upload_image('img',$path,$requestCategory);
              
              if(isset($file)){
                  $category->img=$file;
              }
          }
          
        $category->save();
    }

    public function action(Request $request,$action,$id='')
    {  
      
        if($request->ajax())
        {
            if($request->ids) $ids=$request->ids;

            if($action)
            {
                    $category=Category::find($id);
                    $info= array(
                        'active' => '',
                        'mess' => '',
                        'id'=>'',
                        'activeAll' =>'',
                        'is_deleted'=>'',
                        'has_child'=>''
                    );
                    switch ($action) {
                        case 'delete':
                            if( $category->is_deleted==0 || has_child($id))
                            {
                                $info['is_deleted']='0';
                                return response()->json($info);  
                            }
                            // chuyen bài viết trong catalog qua danh muc bài viết chua phan loai
                            if($category->type==5){
                                $articles=Article::where('cat_id',$id)->get();
                                foreach($articles as $article)
                                {
                                    $article->cat_id='32';
                                    $article->save();
                                }
                            }
                             // chuyen san pham trong catalog qua danh muc san pham chua phan loai
                            if($category->type==6){
                                $products=Product::where('cat_id',$id)->get();
                                foreach($products as $product)
                                {
                                    $product->cat_id='33';
                                    $product->save();
                                }
                            }
                             // xóa hình ảnh trong thư mục chứa
                            $path="upload/category";
                            delete_img($path,$category);

                            $category->delete();
                            $info['mess']="xóa dữ liệu thành công";
                            $info['id']=$id;
                            break;
                        case 'active':
                            $category->active = $category->active?0:1;
                            $category->save();
                            $info['mess']="cập nhật dữ liệu thành công";
                            $info['active']=$category->active;
                            break;   
                        case 'order':
                            $category->num=$request->num;
                            $category->save();
                            break;   
                        case 'delImg':
                            // xóa hình ảnh trong thư mục chứa
                            $path="upload/category";
                            delete_img($path,$category);
                            break;
                    }
            }
            if($action=='deleteAll')
            {
                //xoa hinh anh khi xoa nhiều
                foreach($ids as $id){
                    $category=Category::find($id);
                    if( $category->is_deleted==0 || has_child($id))
                            { 
                                  $info=array();
                                $info['is_deleted']='0';
                                return response()->json($info);  
                            }
                    $path="upload/category";
                    delete_img($path,$category);
                    $category->delete();
                }
                return $ids;    
            }
            if($action=='activeAll')
            {
                $active=array();
                foreach($ids as $id){
                    $category=Category::find($id);
                    $category->active = $category->active?0:1;
                    $category->save();
                    $result=array(
                        'id' => $id,
                        'active' => $category->active
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
                'mess' => 'bạn chưa chọn đúng danh mục có danh mục con'
            );
            $id=$request->pid;
            $Catogory=Category::find($id);
            if($Catogory->type!='9')
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
