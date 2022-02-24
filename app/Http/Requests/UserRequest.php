<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;

class UserRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id(),
            'email' => 'required|email',
            'introduction' => 'max:80',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.unique' => '名稱已經被使用過了，請重新填寫',
            'name.regex' => '名稱只支持英文、數字、橫槓和下划線。',
            'name.between' => '用戶名必須介於 3 - 25 個字符之間。',
            'name.required' => '用戶名不能為空。',
        ];
    }
}
