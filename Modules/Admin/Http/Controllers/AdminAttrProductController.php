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
        $attrs=Attr_product::orderBy('num','ASC')->get(); 
        $total=$attrs->count();    
        $viewData=[
            'attrs' => $attrs,
            'total' => $total
        ];
        return view('admin::attr_product.index',$viewData);
    }

    public function store(Request $request)
    {
        $id=$this->insertOrUpdate($request);
        
      return response()->json($id);;
      
    }



    public function update(Request $request,$id)
    {
        
        $id=$this->insertOrUpdate($request,$id);

      return $id;
    }

    public function insertOrUpdate(Request $request,$id='')
    {
            $attr_product=new Attr_product();
            
            if($id){
                $attr_product=Attr_product::find($id);
              
            }
            else{
            $attr_product->num=$request->num;
            $attr_product->active=$request->active?'1':'0';
            }

            $attr_product->name=$request->name;
            $attr_product->value=$request->value;
            
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
                    $Attr_product=Attr_product::find($id);
                    $info= array(
                        'active' => '',
                        'mess' => '',
                        'id'=>'',
                        'activeAll' =>''
                    );
                    switch ($action) {
                        case 'delete':
                            $Attr_product->delete();
                            $info['mess']="xóa dữ liệu thành công";
                            $info['id']=$id;
                            break;
                        case 'active':
                            $Attr_product->active = $Attr_product->active?0:1;
                            $Attr_product->save();
                            $info['mess']="cập nhật dữ liệu thành công";
                            $info['active']=$Attr_product->active;
                            break;   
                        case 'order':
                            $Attr_product->num=$request->num;
                            $Attr_product->save();
                            break;   

                    }
            }
            if($action=='deleteAll')
            {
                Attr_product::whereIn('id',$ids)->delete();
                return $ids;    
            }
            if($action=='activeAll')
            {
                $active=array();
                foreach($ids as $id){
                    $Attr_product=Attr_product::find($id);
                    $Attr_product->active = $Attr_product->active?0:1;
                    $Attr_product->save();
                    $result=array(
                        'id' => $id,
                        'active' => $Attr_product->active
                    );
                    array_push($active,$result);
                }
                return response()->json($active);
            }
        return response()->json($info);
      }
    }
 
}
