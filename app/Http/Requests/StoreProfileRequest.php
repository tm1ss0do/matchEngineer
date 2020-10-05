<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      // 認証関係の判定を、ここでは行わない。
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
            //
                'name' => 'required|string|max:255',
                // 'profile_icon' => 'string|max:255',
                'profile_icon' => 'image|mimes:jpeg,png,jpg,gif|max:1024|nullable',
                'self_introduction' => 'string|max:1000|nullable',
        ];
    }
    public function messages()
    {
        return [
        "image" => "指定されたファイルが画像ではありません。",
        "mines" => "指定された拡張子（JPEG/PNG/JPG/GIF）ではありません。",
        "max" => "１Ｍを超えています。",
        // "dimensions" => "画像の比率は1：1で横は最大300pxです。",
        ];
    }
}
