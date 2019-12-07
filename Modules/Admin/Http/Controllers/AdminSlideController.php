<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminSlideController extends Controller
{

    public function index()
    {
        $slides = Slide::all();
        $total = $slides->count();
        $viewData = [
            'slides' => $slides,
            'total' => $total
        ];
        return view('admin::slide.index', $viewData);
    }

    public function create()
    {
        return view('admin::slide.create');
    }

    public function store(Request $request)
    {
        $this->insertOrUpdate($request);
        return redirect()->back()->with('success', 'thêm mới thành công');
    }

    public function edit($id)
    {
        $slide = Slide::find($id);
        $viewData = [
            'slide' => $slide
        ];
        return view('admin::slide.update', $viewData);
    }

    public function update(Request $request, $id)
    {

        $this->insertOrUpdate($request, $id);

        return redirect()->back()->with('success', 'cập nhật thành công');
    }

    public function insertOrUpdate($request, $id = '')
    {

        $slide = new Slide();

        if ($id) {
            $slide = Slide::find($id);
            // kiểm tra có file upload không
            if ($request->hasFile('img') && $slide->img) {
                // xóa hình ảnh trong thư mục chứa nếu tồn tại
                $path = "upload/slide";
                delete_img($path, $slide);
            }
        }

        $slide->name = $request->name;
        $slide->ext_url = $request->ext_url;
        $slide->num = $request->num;
        $slide->active = $request->active ? '1' : '0';


        //upload 1 file
        if ($request->hasFile('img')) {

            $path = 'upload/slide';

            $file = upload_image('img', $path, $request);

            if (isset($file)) {
                $slide->img = $file;
            }
        }

        $slide->save();
    }

    public function action(Request $request, $action, $id = '')
    {

        if ($request->ajax()) {
            if ($request->ids) $ids = $request->ids;

            if ($action) {
                $slide = Slide::find($id);
                $info = array(
                    'active' => '',
                    'hot' => '',
                    'mess' => '',
                    'id' => '',
                    'activeAll' => ''
                );
                switch ($action) {
                    case 'delete':
                        // xóa hình ảnh trong thư mục chứa
                        $path = "upload/slide";
                        delete_img($path, $slide);
                        $slide->delete();
                        $info['mess'] = "xóa dữ liệu thành công";
                        $info['id'] = $id;
                        break;
                    case 'active':
                        $slide->active = $slide->active ? 0 : 1;
                        $slide->save();
                        $info['mess'] = "cập nhật dữ liệu thành công";
                        $info['active'] = $slide->active;
                        break;
                    case 'hot':
                        $slide->hot = $slide->hot ? 0 : 1;
                        $slide->save();
                        $info['mess'] = "cập nhật dữ liệu thành công";
                        $info['hot'] = $slide->hot;
                        break;

                    case 'delImg':
                        // xóa hình ảnh trong thư mục chứa
                        $path = "upload/slide";
                        delete_img($path, $slide);
                        break;
                }
            }
            if ($action == 'deleteAll') {
                //xoa hinh anh khi xoa nhiều
                foreach ($ids as $id) {
                    $slide = Slide::find($id);
                    $path = "upload/slide";
                    delete_img($path, $slide);
                }

                Slide::whereIn('id', $ids)->delete();
                return $ids;
            }
            if ($action == 'activeAll') {
                $active = array();
                foreach ($ids as $id) {
                    $slide = Slide::find($id);
                    $slide->active = $slide->active ? 0 : 1;
                    $slide->save();
                    $result = array(
                        'id' => $id,
                        'active' => $slide->active
                    );
                    array_push($active, $result);
                }
                return response()->json($active);
            }
            return response()->json($info);
        }
    }
    // kiểm tra danh mục có phải là danh mục có danh mục con hay kg
    public function check_comp(Request $request)
    {
        if ($request->ajax()) {
            $error = array(
                'error' => '',
                'mess' => 'bạn chưa chọn đúng danh mục chứa bài viết'
            );
            $id = $request->pid;
            $Catogory = Category::find($id);
            if ($Catogory->type != '5') {
                $error['error'] = 'a';
            } else {
                $error['error'] = 'b';
            }
            return response()->json($error);
        }
    }
}
