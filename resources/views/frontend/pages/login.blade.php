@extends('frontend.layout')

@section('content')
    @include('frontend.components.header')

    <div class="p-gray-bg m-login">
        <div class="p-wrap-narrow">
            <div class="m-form-wrap">
                <h3 class="form-head">登陆</h3>
                <input type="text" class="form-input" placeholder="会员名称/邮箱/手机号">
                <input type="text" class="form-input" placeholder="输入密码">
                <div class="clearfix">
                    <input type="text" class="form-small-input" placeholder="图片验证">
                    <img src="{{imgurl('verify-img.png')}}" alt="" class="verify-img">
                </div>
                <div class="checkbox-wrap">
                    <input type="checkbox" class="checkbox">
                    <span>已满18岁以上，并且同意用户协议和隐私政策</span>
                </div>
                <div class="p-btn">注册</div>
            </div>
        </div>
    </div>
@endsection