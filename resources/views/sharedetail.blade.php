
@extends('master')

@section('title','我的晒单')

@section('content')

<body fnav="1">


    <div id="loadingPicBlock">
        <div class="wx-show-pro">
            <!--晒单详情信息-->
            
                    <div class="show-head">
                        <h1>天选之子</h1>
                        <div class="show-user">
                            <a href="{{url('user/userpage')}}" class="photo">
                                <img src="{{url('picture/1.jpg')}}" alt="" width="50px" height="50px">
                            <a href="https://m.1yyg.com/v45/userpage/1016130281" class="name blue">{{$userInfo->user_tel}}</a>
                            <p class="about">
                                <span class="time">昨天 11:11</span>
                            </p>
                        </div>
                    </div>
                    <div class="show-info">
                        <a href="/v45/lottery/detail-10806757.do">
                            <div class="tail">
                                <p>获得商品：{{$data->goods_name}}</p>
                                <p>本潮参与：<em class="orange">3666</em> 人次</p>
                                <p>幸运潮购码：<em class="orange">10011034</em></p>
                                <p>揭晓时间：03月25日 19:58</p>
                            </div>
                        </a>
                        <div class="txt">
                            <p class="pro">{{$userInfo->order_text}}</p>
                            <p>
                                <img src="https://img.1yyg.net/UserPost/Big/20170706155454997.jpg" src2="picture/loading2.gif" border="0" alt="" >
                            </p>
                            <p>
                                <img src="https://img.1yyg.net/UserPost/Big/20170706155458704.jpg" src2="picture/loading2.gif" border="0" alt="" >
                            </p>
                            <p>
                                <img src="https://img.1yyg.net/UserPost/Big/20170706155501957.jpg" src2="picture/loading2.gif" border="0" alt="" >
                            </p>
                        </div>
                    </div>

</body>
@endsection

