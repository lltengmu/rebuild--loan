<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;

class CaptchaController extends Controller
{
    /**
     * 生成验证码
     */
    public function index()
    {
        $builder = new CaptchaBuilder();
        $builder->build();
        header('Content-type: image/jpeg');
        $builder->output();
        session()->put('captcha', $builder->getPhrase());
    }
}
