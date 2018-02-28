@extends('frontend.layout')

@section('content')
    <div class="m-home">
        <div class="section-top">
            <div id="particles-js"></div>

            <div class="center-text-wrap">
                <img src="{{imgurl('white-logo.png')}}" alt="" class="center-logo">
                <img src="{{imgurl('center-text.png')}}" alt="" class="big-text">
            </div>

            <div class="drop-down"></div>
        </div>

        @include('frontend.components.header')

        {{--视频--}}
        <div class="section-video">
            <div class="p-wrap">
                <div class="section-title">
                    <div class="img-title"></div>
                    <h3 class="text-title">量化币项目展示</h3>
                </div>

                <div class="video-wrap">
                    <video src="http://tx.acgvideo.com/8/ae/5636696-1.mp4?txTime=1503315096&platform=html5&txSecret=de2988175a7ef1cef7b7d4ace2db8631&oi=771245542&rate=97947&hfb=3f6ef0f36bdbbf909ca0b9a6fa0b2fa3"
                           preload="auto" autoplay="" controls=""></video>
                </div>

                <div class="text-wrap">
                    <h3 class="file-name">技术白皮书及商业白皮书</h3>
                    <button class="p-btn">点击下载</button>
                </div>
            </div>
        </div>

        {{--众筹--}}
        <div class="section-funding">
        <div class="container">
            <div class="section-title">
                <div class="img-title"></div>
                <h3 class="text-title">量化币ICO众筹</h3>
            </div>
        </div>
        </div>

        {{--平台--}}
        <div class="section-platform">
            <div class="container">
                <div class="section-title white">
                    <div class="img-title"></div>
                    <h3 class="text-title">其他参与平台</h3>
                </div>

                <div class="row">
                    @foreach(range(1,12) as $item)
                        <div class="col-md-2 col-sm-3 col-xs-4 platform-wrap">
                            <img src="{{imgurl('platform-item-1.png')}}" class="platform-item">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{--技术--}}
        <div class="section-technology">
            <div class="container">
                <div class="section-title">
                    <div class="img-title black"></div>
                    <h3 class="text-title">量化币技术</h3>
                </div>

                <div class="row">
                    @foreach(range(1,3) as $item)
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="tech-item">
                                <div class="p-icon icon-tech-1"></div>
                                <div class="item-text">
                                    <div class="item-title">量化交易API及联通交易所的 低延迟服务器(co-location)</div>
                                    <div class="item-subtitle">对标上期技术, 中金技术</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="tech-item">
                                <div class="p-icon icon-tech-1"></div>
                                <div class="item-text">
                                    <div class="item-title">量化交易API及联通交易所的 低延迟服务器(co-location)</div>
                                    <div class="item-subtitle">对标上期技术, 中金技术</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        {{--创始人--}}
        <div class="section-founder">
            <div class="container">
                <div class="section-title">
                    <div class="img-title black"></div>
                    <h3 class="text-title">量化币团队</h3>
                </div>

                <div class="row">
                    @foreach(range(1,6) as $item)
                        <div class="col-lg-4 col-sm-6 col-xs-12">
                            <div class="founder-item">
                                <img src="{{imgurl('founder-avatar.png')}}" alt="" class="founder-avatar">
                                <h3 class="founder-name">联合创始人&CEO 马学韬 先生</h3>
                                <div class="founder-title">Co-Founder & CEO  Mr. Ma Xuetao</div>
                                <div class="founder-intro">
                                    上海交通大学控制科学与工程硕士、学士。8年主流大型金融机构投资银行从业经历参与、主导多个大型国有金融机构和央企的改制上市与资本
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{--动态--}}
        <div class="section-news">
            <div class="container">
                <div class="section-title">
                    <div class="img-title"></div>
                    <h3 class="text-title">量化币动态及行业动态</h3>
                </div>

                <div class="row">
                    @foreach(range(1,6) as $item)
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="news-item">
                                <div class="news-img">
                                    <img src="{{imgurl('news-img.png')}}" alt="">
                                    <div class="news-text">
                                        <h3 class="news-title">博客标题</h3>
                                        <div class="news-desc">全球数字代币量化和电子交易专业级生态链ICO即将启动</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{--媒体--}}
        <div class="section-media">
            <div class="container">
                <div class="section-title white">
                    <div class="img-title"></div>
                    <h3 class="text-title">量化币动态及行业动态</h3>
                </div>

                <div class="row">
                    @foreach(range(1,24) as $item)
                        <div class="col-md-2 col-sm-3 col-xs-6 media-item">
                            <img src="{{imgurl('media-img.png')}}" alt="">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{--联系我们--}}
        <div class="section-contact">
            <div class="container">
                <div class="section-title">
                    <div class="img-title"></div>
                    <h3 class="text-title">量化币 联系我们</h3>
                </div>

                <div class="row">
                    @foreach(range(1,3) as $item)
                        <div class="col-sm-4 col-xs-12">
                            <input type="text" class="contact-input" placeholder="昵称">
                        </div>
                    @endforeach
                </div>

                <textarea class="contact-textarea" placeholder="请填写留言内容"></textarea>

                <div class="p-btn">提交</div>
            </div>
        </div>
    </div>
@endsection