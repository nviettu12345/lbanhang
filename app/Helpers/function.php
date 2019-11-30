<?php

use App\Models\Category;

if(!function_exists('showCategories'))
{
    function showCategories($categories, $parent_id = 0, $char = '',$id='',$com='')
		{
			$menu_html = '';

		    foreach ($categories as $key => $element)
		    {

		        // Nếu là chuyên mục con thì hiển thị
		        if ($element->pid==$parent_id)
		        {
		        	$select='';
		        	$style='';
		        	if($element->id==$id)
		        		{
		        			$select="selected";
		        		}
		        	if($com==$element->type){		
		        			$style="color:#0000ff;font-weight:600";
		        			}
					$menu_html .= '<option style="'.$style.'"' . $select . ' value="'.$element->id.'">';
		        	
		               $menu_html .= $char . $element->name;
		               if(has_child($element->id))
		               {
		               	$char=str_replace('-->', '&nbsp', $char);
		               }
		                $menu_html .= showCategories($categories, $element->id,$char.' &nbsp&nbsp&nbsp --> ',$id,$com);
		            $menu_html .='</option>';
		        	 }    
		            // Xóa chuyên mục đã lặp
		            // unset($categories->id);
		        }
		    return $menu_html;
        }
        
        if(!function_exists('has_child'))
        {
            function has_child($id)
            {
                $categories=Category::where('pid',$id)->count();
                // $this->db->where('pid', $id);
                // $query = $this->db->get($this->table);
                return  $categories;
            }
        }     
}

if(!function_exists('upload_image'))
    {
        function upload_image($filename='',$path='',$request)
        {
			$file=$request->$filename;
            // duong dan anh
            if($path=='')
            {
                $path='upload';
            }
            //lay tên anh        
			$file_name=$file->getClientOriginalName();
			// kiểm tra file có tồn tại chưa
			$i=0;
			
			while(file_exists($path."/".$file_name)) {
				$file_name=$file->getClientOriginalName();
				$file_name=$i."-".$file_name;
				$i++;
			}
            // thong tin file
                // Lưu file vào thư mục upload với tên là biến $filename
				$file->move($path,$file_name);
            return $file_name;
        }
    }

    if(!function_exists('get_data_user'))
    {
         function get_data_user($type,$field='id')
        {   
          return Auth::guard($type)->user()?Auth::guard($type)->user()->$field:'';
     
        }
    }