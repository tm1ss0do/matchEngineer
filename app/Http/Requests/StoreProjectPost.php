<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectPost extends FormRequest
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
      // バリデーションルール
        return [
            //
            'project_title' => 'required|string|max:100',
            'project_status' => 'boolean',
            'project_type' => 'required|string|max:255',
            'project_reception_end' => '',
            'project_max_amount' => 'integer|nullable',
            'project_mini_amount' => 'integer|nullable',
            'project_detail_desc' => 'string|max:2000',
        ];
    }
}
