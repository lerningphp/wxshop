<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title')</title>
    <meta content="app-id=518966501" name="apple-itunes-app" />
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" name="viewport" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <link href="{{url('css/goods.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/comm.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/member.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/cartlist.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/fsgallery.css')}}" rel="stylesheet" charset="utf-8">
    <link href="{{url('css/swiper.min.css')}}" rel="stylesheet">
    <link href="{{url('layui/css/layui.css')}}" rel="stylesheet" >
    <link rel="stylesheet" href="{{url('css/buyrecord.css')}}">
    <link href="{{url('css/single.css')}}" rel="stylesheet" type="text/css" />
    {{--<script src="{{url('js/jquery-1.8.3.min.js')}}"></script>--}}
    <script src="{{url('js/jquery-1.11.2.min.js')}}"></script>
    <script src="{{url('js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{url('layui/layui.js')}}"></script>
    <script src="{{url('js/all.js')}}"></script>
    <script src="{{url('js/index.js')}}"></script>
    <script src="{{url('js/lazyload.min.js')}}"></script>
    <script src="{{url('js/mui.min.js')}}"></script>
    <script src="{{url('js/swiper.min.js')}}"></script>
    <script src="{{url('js/photo.js')}}" charset="utf-8"></script>
    <script src="http://cdn.bootcss.com/flexslider/2.6.2/jquery.flexslider.min.js"></script>

    {{--<script src="{{url('js/jquery190_1.js')}}" language="javascript" type="text/javascript"></script>--}}
</head>

<!--触屏版内页头部-->
<div class="m-block-header" id="div-header">
    <strong id="m-title"></strong>
    <a href="javascript:history.back();" class="m-back-arrow"><i class="m-public-icon"></i></a>
    <a href="/index" class="m-index-icon"><i class="home-icon"></i></a>
</div>

        @yield('content')

        @yield('my-js')


</html>