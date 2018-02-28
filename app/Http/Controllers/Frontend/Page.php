<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Page extends Controller
{
    // 首页
    public function home()  {
        return view('frontend.pages.home');
    }

    // 注册
    public function register()  {
        return view('frontend.pages.register');
    }

    // 登录
    public function login()  {
        return view('frontend.pages.login');
    }

    // 用户认证
    public function userAuth()  {
        return view('frontend.pages.userAuth');
    }

    // 个人中心
    public function user()  {
        return view('frontend.pages.user');
    }

    // 邮箱安全验证
    public function emailAuth()  {
        return view('frontend.pages.emailAuth');
    }

    // 认购
    public function purchase()  {
        return view('frontend.pages.purchase');
    }

    // 修改密码
    public function changePwd()  {
        return view('frontend.pages.changePwd');
    }
}
