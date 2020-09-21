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
                'profile_icon' => 'string|max:255',
                'self_introduction' => 'string|max:1000',
        ];
    }
}
