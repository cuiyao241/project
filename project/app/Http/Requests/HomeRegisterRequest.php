<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class HomeRegisterRequest extends Request
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
            //
            'User_name' => 'required|regex:/^\S{5,12}$/|unique:user',
            'Password' => 'required|regex:/^\w{5,12}$/',
            'rePassword'=>'required|same:Password',
            'Emails' => 'required|email',
            'Phonecode' => 'required|regex:/^1[34578]\d{9}$/',
    

            ];
    }

    public function messages()
    {
        return [

        'User_name.required' => '用户名不能为空',
            'User_name.regex' =>'用户名格式不正确',
            'User_name.unique' => '用户名已存在',
            'Password.required' => '密码不能为空',
            'Password.regex' => '密码格式不正确',
            'rePassword.required' => '确认密码不能为空',
            'rePassword.same' => '俩次密码不一致',
            'Emails.required' => '邮箱不能为空',
            'Emails.email' => '邮箱格式不正确',
            'Phonecode.required' => '手机号码不能为空',
            'Phonecode.regex' => '手机号码格式不正确'
        ];
    }
}
