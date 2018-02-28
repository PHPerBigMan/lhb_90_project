@extends('frontend.layout', ['title' => '修改密码'])

@section('content')
    @include('frontend.components.header')

    <div class="p-gray-bg m-login">
        <div class="p-wrap-narrow">
            <div class="m-form-wrap">
                <h3 class="form-head">修改密码</h3>
                <input type="text" class="form-input" placeholder="请输入新密码">
                <input type="text" class="form-input" placeholder="请再次输入新密码">
                <div class="p-btn">确认修改</div>
            </div>
        </div>
    </div>
@endsection