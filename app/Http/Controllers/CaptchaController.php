<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tools\Captcha;
class CaptchaController extends Controller
{
    //生成验证码图片和存储验证码的值
    public function create()
    {
        $verify = new Captcha();
        $code = $verify->getCode();
        session(['logincode'=>$code]);//登录时生成的验证码
        return $verify->doimg();
    }
}
