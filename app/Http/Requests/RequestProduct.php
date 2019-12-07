<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
  
        return [
            'name'=>'required|unique:products,name,'.$this->id,
            'img' =>'image|mimes:jpeg,png,jpg,gif|max:2048'
        
         
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trường này không được để trống',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'img.max' => 'file tải lên kích thước tối đa 2M',
            'img.image' => 'file tải không đúng định dạng : jpeg,png,jpg,gif ' 
        ];
    }
}
