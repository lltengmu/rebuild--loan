<?php

namespace App\Http\Requests;

use App\Rules\ValidateCaptcha;
use Illuminate\Foundation\Http\FormRequest;

class IndividualLoginRequest extends FormRequest
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
     * 定义individual登录验证规格
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'psw' => 'required',
            'captcha' => ['required',new ValidateCaptcha()],
        ];
    }
    /**
     * 自定义验证错误信息
     *  @test
     */
    public function messages()
    {
        return [
            'email.required' => '電子郵件欄位是必填的',
            'psw.required' => '密碼欄位是必填的',
            'email.email' => '電子郵件欄位格式錯誤',
            'captcha.required' => '驗證碼欄位是必填的'
        ];
    }
}
