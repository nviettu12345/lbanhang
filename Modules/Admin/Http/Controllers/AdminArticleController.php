<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestArticle;
use App\Models\Article;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class AdminArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $cataloglist=Category::all();
        $articles=Article::with('category:id,name');
        //loc bài viết theo name
        if(isset($request->name)) $articles->where('name', 'like','%'.$request->name.'%');
        //loc bài viết theo danh mục
        if(isset($request->cate)) {
            $articles->where('cat_id',$request->cate);
            $catalogTree=showCategories($cataloglist,0,'',$request->cate,5);
        }
        else{
            $catalogTree=showCategories($cataloglist,0,'','',5);
        }
        $articles=$articles->paginate(20);
        $total=$articles->count();
        
        $viewData=[
        'catalogTree'=>$catalogTree,
        'articles' => $articles,
        'total' => $total
        ];
        return view('admin::article.index',$viewData);
    }

    public function create()
    {
        $cataloglist=Category::all();
        $catalogTree=showCategories($cataloglist,0,'','',5);
        $viewData=[
             'catalogTree'=>$catalogTree
        ];
        return view('admin::article.create',$viewData);
    }

    public function store(RequestArticle $requestArticle)
    {
        $this->insertOrUpdate($requestArticle);
     
      
      return redirect()->back()->with('success','thêm mới thành công');
      
    }

    public function edit($id)
    {
        $cataloglist=Category::all();
        
        $article=Article::find($id);
        $catalogTree=showCategories($cataloglist,0,'',$article->cat_id,5);
        $viewData=[
            'article'=>$article,
            'catalogTree' => $catalogTree
        ];
        return view('admin::article.update',$viewData);
    }

    public function update(RequestArticle $requestArticle,$id)
    {
        
        $this->insertOrUpdate($requestArticle,$id);

      return redirect()->back()->with('success','cập nhật thành công');
    }

    public function insertOrUpdate($requestArticle,$id='')
    {

            $article=new Article();

            if($id){
                $article=Article::find($id);
                // kiểm tra có file upload không
                if($requestArticle->hasFile('img') && $article->img){
                      // xóa hình ảnh trong thư mục chứa nếu tồn tại
                       $path="upload/article";
                       delete_img($path,$article);
                }
            }
          
          $article->name=$requestArticle->name;
          $article->cat_id=$requestArticle->cat_id;
          $article->description=$requestArticle->description;
          $article->content=$requestArticle->content;
          $article->ext_url=$requestArticle->ext_url;
          $article->hot=$requestArticle->hot?'1':'0';
          $article->is_noindex=$requestArticle->is_noindex?'1':'0';
          $article->slug=$requestArticle->slug?$requestArticle->slug:Str::slug($requestArticle->name);
          $article->seo_title=$requestArticle->title?$requestArticle->title:$requestArticle->name;
          $article->seo_description=$requestArticle->seo_description;
          $article->active=$requestArticle->active?'1':'0';
          $article->publish_date=$requestArticle->publish_date?$requestArticle->publish_date:Carbon::now();
            
          
          // xu ly the tag
			$tag=array();
			$tag_vn=strval($requestArticle->tag);
			$tag_vn=explode(",", $tag_vn);
	    	foreach ($tag_vn as $key => $value) {
                $tag[$key]['name_tag']=$value;
                $tag[$key]['slug_tag']=Str::slug($value);
	    	}
            $article->tag=json_encode($tag);

          //upload 1 file
          if($requestArticle->hasFile('img')){
            
              $path='upload/article';
              
              $file=upload_image('img',$path,$requestArticle);
              
              if(isset($file)){
                  $article->img=$file;
              }
          }

        $article->save();
    }

    public function action(Request $request,$action,$id='')
    {  
      
        if($request->ajax())
        {
            if($request->ids) $ids=$request->ids;

            if($action)
            {
                    $article=Article::find($id);
                    $info= array(
                        'active' => '',
                        'hot' => '',
                        'mess' => '',
                        'id'=>'',
                        'activeAll' =>''
                    );
                    switch ($action) {
                        case 'delete':
                            // xóa hình ảnh trong thư mục chứa
                            $path="upload/article";
                            delete_img($path,$article);
                            $article->delete();
                            $info['mess']="xóa dữ liệu thành công";
                            $info['id']=$id;
                            break;
                        case 'active':
                            $article->active = $article->active?0:1;
                            $article->save();
                            $info['mess']="cập nhật dữ liệu thành công";
                            $info['active']=$article->active;
                            break;   
                        case 'hot':
                            $article->hot = $article->hot?0:1;
                            $article->save();
                            $info['mess']="cập nhật dữ liệu thành công";
                            $info['hot']=$article->hot;
                            break;   

                        case 'delImg':
                            // xóa hình ảnh trong thư mục chứa
                            $path="upload/article";
                            delete_img($path,$article);
                            break; 
 
                    }
            }
            if($action=='deleteAll')
            {
                //xoa hinh anh khi xoa nhiều
                foreach($ids as $id){
                    $article=Article::find($id);
                    $path="upload/article";
                    delete_img($path,$article);
                }

                Article::whereIn('id',$ids)->delete();
                return $ids;    
            }
            if($action=='activeAll')
            {
                $active=array();
                foreach($ids as $id){
                    $article=Article::find($id);
                    $article->active = $article->active?0:1;
                    $article->save();
                    $result=array(
                        'id' => $id,
                        'active' => $article->active
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
                'mess' => 'bạn chưa chọn đúng danh mục chứa bài viết'
            );
            $id=$request->pid;
            $Catogory=Category::find($id);
            if($Catogory->type!='5')
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
