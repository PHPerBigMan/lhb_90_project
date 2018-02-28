<div class="m-header-pc">
    <div class="container header-top">
        <div class="row ">
            <img src="{{imgurl('color-logo.png')}}" alt="" class="logo">

            <div class="head-btn-wrap">
                <button>登陆</button>
                <button>注册</button>
            </div>
        </div>
    </div>

    <div class="nav-bar">
        <div class="container">
            <div class="row">
                @foreach(range(1,9) as $item)
                    <div class="nav-item">首页</div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="m-header-mobile clearfix">
    <img src="{{imgurl('mobile-logo.png')}}" class="mobile-logo">
    <div class="nav-btn active">
        <div class="line"></div>
    </div>
</div>