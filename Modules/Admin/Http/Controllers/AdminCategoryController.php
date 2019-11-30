<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Http\Requests\RequestCategory;
use App\Models\Category;
use App\Models\Cattype;
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
        $viewData=[
            'cattype'=>$cattype,
             'catalogTree'=>$catalogTree
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
        $cattype=Cattype::select('id','name')->get();
        $viewData=[
            'cattype'=>$cattype,
            'category'=>$category,
            'catalogTree' => $catalogTree
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
            }
          
          $category->name=$requestCategory->name;
          $category->pid=$requestCategory->pid;
          $category->type=$requestCategory->type;
          $category->description=$requestCategory->description;
          $category->content=$requestCategory->content;
          $category->ext_url=$requestCategory->ext_url;
          $category->slug=$requestCategory->slug?$requestCategory->slug:Str::slug($requestCategory->name);
          $category->seo_title=$requestCategory->title?$requestCategory->title:$requestCategory->name;
          $category->seo_description=$requestCategory->seo_description;
          $category->active=$requestCategory->active?'1':'0';
          $category->num=$requestCategory->num;
          
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
                        'activeAll' =>''
                    );
                    switch ($action) {
                        case 'delete':
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
                            $path="upload/category/".$category->img;
                            if(file_exists($path))
                            {
                                unlink($path);
                            }
                            $category->img='';
                            $category->save();
                            break;
                    }
            }
            if($action=='deleteAll')
            {
                Category::whereIn('id',$ids)->delete();
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
