@extends('frontend.layout')

@section('content')
    @include('frontend.components.header')

    <div class="p-gray-bg m-register">
        <div class="p-wrap-middle">
            <div class="row">
                <div class="col-sm-6 col-xs-12 m-form-wrap">
                    <h3 class="form-head">注册</h3>
                    <input type="text" class="form-input" placeholder="会员名称">
                    <input type="text" class="form-input" placeholder="邮箱">
                    <input type="text" class="form-input" placeholder="输入你的密码">
                    <input type="text" class="form-input" placeholder="再次输入你的密码">
                    <div class="checkbox-wrap">
                        <input type="checkbox" class="checkbox">
                        <span>已满18岁以上，并且同意用户协议和隐私政策</span>
                    </div>
                    <div class="p-btn">注册</div>
                </div>
                <div class="col-sm-6 col-xs-12 form-icon">
                    <img src="{{imgurl('form-login.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection