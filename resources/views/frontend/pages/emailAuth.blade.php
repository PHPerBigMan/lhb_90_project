@extends('frontend.layout')

@section('content')
    @include('frontend.components.header')

    <div class="p-gray-bg m-login">
        <div class="p-wrap-narrow">
            <div class="m-form-wrap">
                <h3 class="form-head">安全验证</h3>
                <input type="text" class="form-input" placeholder="已验证邮箱">
                <div class="clearfix">
                    <input type="text" class="form-small-input" placeholder="邮箱验证码">
                    <div class="verify-btn">发送验证码</div>
                </div>
                <div class="p-btn">确认修改</div>
            </div>
        </div>
    </div>
@endsection