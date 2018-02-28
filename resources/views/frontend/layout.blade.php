<!doctype html>
<html lang="cn_zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title or '量化币' }}</title>
    <script>
        (function (doc, win) {
            var docEle = doc.documentElement,
                evt = 'onorientationchange' in window ? 'orientationchange' : 'resize',

                fn = function () {
                    var width = docEle.clientWidth;

                    if (width > 750) {
                        width && (docEle.style.fontSize = 192 + 'px');
                    } else if (width < 320) {
                        width && (docEle.style.fontSize = 32 + 'px');
                    } else {
                        width && (docEle.style.fontSize = (width / 10) + 'px');
                    }
                };
            win.addEventListener(evt, fn, false);
            doc.addEventListener('DOMContentLoaded', fn, false);
        })(document, window);
    </script>
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
</head>
<body>

@section('content')
@show

@include('frontend.components.footer')

<script src="{{mix('/js/app.js')}}"></script>
</body>
</html>