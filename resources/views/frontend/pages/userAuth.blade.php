@extends('frontend.layout')

@section('content')
    @include('frontend.components.header')

    <div class="p-gray-bg m-login">
        <div class="p-wrap-narrow">
            <div class="m-form-wrap">
                <h3 class="form-head">身份认证</h3>
                <input type="text" class="form-input" placeholder="你的真实姓名">
                <input type="text" class="form-input" placeholder="你的身份证号">
                <input type="text" class="form-input" placeholder="手机号码">
                <div class="clearfix">
                    <input type="text" class="form-small-input" placeholder="验证码">
                    <div class="verify-btn">获取验证码</div>
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