<?php

namespace App\Http\Requests\Api;

class UserRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method())
        {
            case 'PATCH':
                $userId = auth('api')->id();
    
                return [
                    'name' => 'between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . $userId,
                    'email'=>'email|unique:users,email,' . $userId,
                    'introduction' => 'max:80',
                    'avatar_image_id' => 'exists:images,id,type,avatar,user_id,' . $userId,
                ];
                break;
        }
    }

    /**
     * Custom the messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.unique' => '用戶名已經被使用了，請重新填寫',
            'name.regex' => '用戶名僅支持英文、數字、橫槓和下划線。',
            'name.between' => '用戶名必須介於 3 - 25 個字符之間。',
            'name.required' => '用戶名不能為空。',
        ];
    }
}
