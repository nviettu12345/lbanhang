<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Attr_product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminAttrProductController extends Controller
{
    public function index(Request $request)
    {   
        $attrs=Attr_product::all(); 
        $total=$attrs->count();    
        $viewData=[
            'attrs' => $attrs,
            'total' => $total
        ];
        return view('admin::attr_product.index',$viewData);
    }

    public function create()
    {

        $viewData=[

        ];
        return view('admin::category.create',$viewData);
    }

    public function store(Request $request)
    {
        $id=$this->insertOrUpdate($request);
        
      return $id;
      
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

    public function insertOrUpdate(Request $request,$id='')
    {
            $attr_product=new Attr_product();
            
            if($id){
                $category=Category::find($id);
            }

            $attr_product->name=$request->name;
            $attr_product->value=$request->value;
            $attr_product->num=$request->num;
            $attr_product->active=$request->active?'1':'0';
            $attr_product->save();
            return $attr_product->id;   
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
 
}
