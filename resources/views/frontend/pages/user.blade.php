@extends('frontend.layout')

@section('content')
    @include('frontend.components.header')

    <div class="p-gray-bg m-user">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-5 user-left">
                    <div class="user-avatar">
                        <img src="{{imgurl('user-avatar.png')}}" alt="">
                    </div>
                    <div class="user-name">会员名称</div>
                    <div class="user-last-login">上次登录 2017.07.01 18：55</div>
                    <div class="p-btn light">已实名认证</div>
                    <div class="p-btn">邮箱认证</div>
                </div>

                <div class="col-xs-12 col-sm-7 user-right">
                    <div class="user-head">
                        量化钱包
                    </div>

                    <span class="user-head-desc">账户说明：账户余额为钱包现有的量化币数量，锁定金额为暂时不能交易的账户金额</span>

                    <div class="user-money">
                        <div class="user-money-value">2048.00</div>
                        <div class="user-money-key">账户余额(￥)</div>
                    </div>

                    <div class="user-money">
                        <div class="user-money-value">1024.00</div>
                        <div class="user-money-key">锁定金额(￥)</div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="user-head" colspan="6">认购记录</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(range(1,6) as $item)
                            <tr>
                                <td>量化币认购数量</td>
                                <td class="blue">1000.00</td>
                                <td>消耗ETC （根据选择的币种显示）数量</td>
                                <td class="blue">32.00</td>
                                <td class="gray">认购时间：2017.08.02 12:52:22</td>
                                <td class="blue">认购中</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection