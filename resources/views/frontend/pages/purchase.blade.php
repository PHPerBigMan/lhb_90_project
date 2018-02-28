@extends('frontend.layout')

@section('content')
    @include('frontend.components.header')

    <div class="p-gray-bg m-purchase">
        <div class="p-wrap-narrow">
            <h3 class="purchase-head">量化币 —— 未来最有价值的数字货币</h3>
            <div class="purchase-seclect">
                <span class="purchase-label">请选择货币类型</span>
                <input type="checkbox" class="purchase-check">ETC
                <input type="checkbox" class="purchase-check">BTC
            </div>
            <div class="purchase-label">请输入要购买的量化币数量</div>
            <div class="purchase-convert">
                <div class="purchase-input">
                    <input type="number">
                    <div class="unit">ETC</div>
                    <span class="value">等于12000量化币</span>
                </div>
            </div>
            <div class="purchase-label">钱包地址</div>
            <div class="purchase-link">
                <button class="copy-btn">复制地址</button>
                <div class="link-input">
                    <input type="text" readonly value="http">
                </div>
            </div>

            <div class="purchase-qrcode">
                <img src="{{imgurl('qrcode-img.png')}}" alt="">
            </div>

            <div class="p-btn">返回</div>
        </div>
    </div>
@endsection