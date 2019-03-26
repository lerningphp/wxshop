@extends('master')

@section('title','潮购记录')

@section('content')
<body>
<div class="buyrecord-con clearfix">
    <div class="record-img fl">
        <img src="{{url('image/goodsimg')}}/{{$data->goods_img}}" alt="" width="150px" height="150px">
    </div>
    <div class="record-con fl">
        <h3>{{$data->goods_name}}</h3>
        <p class="winner">获得者：<i>终于中了一次</i></p>
        <div class="clearfix">
            <div class="win-wrapp fl">
                <p class="w-time">{{$data->create_time}}</p>
                <p class="w-chao"><i>13579</i>潮购正在进行中...</p>
                <p class="re-code">购买价格：￥{{$data->self_price}}</p>
            </div>
            <div class="fr"><i class="buycart"></i></div>
        </div>
    </div>
</div>


</body>
@endsection

@section('my-js')

@endsection

