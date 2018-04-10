<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ChannelRequest extends FormRequest
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
            'name'=>'required|unique:channels|between:3,10',
            'text'=>'required|between:3,255',
            'cover' => 'required|mimes:jpeg,bmp,png,gif|dimensions:min_width=200,min_height=200',
        ];
    }

    public function messages()
    {
        return [
            'name.between'=>'名称 必须介于 3 - 10 个字符之间。',
            'text.required'=>'介绍 不能为空。',
            'text.between'=>'介绍 必须介于 3 - 255 个字符之间。',
            'cover.required'=>'封面 不能为空。',
            'cover.mimes' =>'封面 只能是 jpeg, bmp, png, gif 格式的图片。',
            'cover.dimensions' => '封面 清晰度不够（宽和高需要 200px 以上）',
        ];
    }
}
