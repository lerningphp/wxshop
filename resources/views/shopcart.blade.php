@extends('master')


@section('title','购物车')

@section('content')
<body id="loadingPicBlock" class="g-acc-bg">
    <input name="hidUserID" type="hidden" id="hidUserID" value="-1" />
    <div>
        <!--首页头部-->
        <div class="m-block-header">
            <a href="/" class="m-public-icon m-1yyg-icon"></a>
            <a href="/" class="m-index-icon">编辑</a>
        </div>
        <!--首页头部 end-->
        <div class="g-Cart-list">
            <ul id="cartBody">
                @foreach($data as $k=>$v)
                <li>
                    <s class="xuan current"></s>
                    <a class="fl u-Cart-img" href="/v44/product/12501977.do">
                        <img src="{{url('image/goodsimg')}}/{{$v->goods_img}}" border="0" alt="">
                    </a>
                    <div class="u-Cart-r">
                        <a href="{{url('index/shopcontent')}}/{{$v->goods_id}}" class="gray6">{{$v->goods_name}}</a>
                        <span class="gray9">
                            剩余<em>{{$v->goods_num-$v->buy_number}}</em>人次
                        </span>
                        <div class="num-opt">
                            <em class="num-mius dis min"><i></i></em>
                            <input class="text_box" name="num" maxlength="6" type="text" value="{{$v->buy_number}}" codeid="12501977">
                            <em class="num-add add"><i></i></em>
                        </div>
                        <a href="javascript:;" name="delLink" cid="12501977" isover="0" class="z-del"><s></s></a>
                    </div>
                </li>
                @endforeach
            </ul>
            <div id="divNone" class="empty" style="display: none"><s></s><p>您的购物车还是空的哦~</p><a href="https://m.1yyg.com" class="orangeBtn">立即潮购</a></div>
        </div>
        <div id="mycartpay" class="g-Total-bt g-car-new" style="">
            <dl>
                <dt class="gray6">
                    <s class="quanxuan current"></s>全选
                    <p class="money-total">合计<em class="orange total"><span>￥</span>17.00</em></p>
                    
                </dt>
                <dd>
                    <a href="javascript:;" id="a_payment" class="orangeBtn w_account remove">删除</a>
                    <a href="javascript:;" id="a_payment" class="orangeBtn w_account">去结算</a>
                </dd>
            </dl>
        </div>
        <div class="hot-recom">
            <div class="title thin-bor-top gray6">
                <span><b class="z-set"></b>人气推荐</span>
                <em></em>
            </div>
            <div class="goods-wrap thin-bor-top">
                <ul class="goods-list clearfix">
                    @foreach($goodsinfo as $k=>$v)
                    <li>
                        <a href="{{url('index/shopcontent')}}/{{$v->goods_id}}" class="g-pic">
                            <img src="{{url('image/goodsimg')}}/{{$v->goods_img}}" width="136" height="136">
                        </a>
                        <p class="g-name">
                            <a href="https://m.1yyg.com/v44/products/23458.do">{{$v->goods_name}}</a>
                        </p>
                        <ins class="gray9">价值:￥{{$v->self_price}}</ins>
                        <div class="btn-wrap">
                            <div class="Progress-bar">
                                <p class="u-progress">
                                    <span class="pgbar" style="width:1%;">
                                        <span class="pging"></span>
                                    </span>
                                </p>
                            </div>
                            <div class="gRate" data-productid="23458">
                                <a href="javascript:;"class="cartadd" goods_id="{{$v->goods_id}}"><s></s></a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <input type="hidden" id="_token" value="{{csrf_token()}}">
<div class="footer clearfix">
    <ul>
        <li class="f_home"><a href="{{url('index')}}"><i></i>潮购</a></li>
        <li class="f_announced"><a href="{{url('index/allshops')}}/0" ><i></i>所有商品</a></li>
        <li class="f_single"><a href="{{url('index')}}" ><i></i>万万没想到</a></li>
        <li class="f_car"><a id="btnCart" href="{{url('cart/shopcart')}}" class="hover"><i></i>购物车</a></li>
        <li class="f_personal"><a href="{{url('index/userpage')}}" ><i></i>我的潮购</a></li>
    </ul>
</div>
</body>
@endsection

@section('my-js')
<!---商品加减算总数---->
    <script type="text/javascript">
    $(function () {
        layui.use(['layer'],function () {
            $('#div-header').attr('style','display:none');
            $('.cartadd').click(function () {
                // layer.msg('hahah');
                var goods_id = $(this).attr('goods_id');
                var _token = $('#_token').val();
                // console.log(goods_id);
                $.post(
                    "{{url('cart/cartadd')}}",
                    {_token:_token,goods_id:goods_id},
                    function (res) {
                        // console.log(res);
                        layer.msg(res.font,{icon:res.code});
                        if(res.code == 1){
                            window.location.reload()
                        }
                    },
                    'json'
                );
            })
            $(".add").click(function () {
                var t = $(this).prev();
                t.val(parseInt(t.val()) + 1);
                GetCount();
            })
            $(".min").click(function () {
                var t = $(this).next();
                if(t.val()>1){
                    t.val(parseInt(t.val()) - 1);
                    GetCount();
                }
            })
        })
    });
    </script>

    <script>
    // 全选        
    $(".quanxuan").click(function () {
        if($(this).hasClass('current')){
            $(this).removeClass('current');

             $(".g-Cart-list .xuan").each(function () {
                if ($(this).hasClass("current")) {
                    $(this).removeClass("current"); 
                } else {
                    $(this).addClass("current");
                } 
            });
            GetCount();
        }else{
            $(this).addClass('current');

             $(".g-Cart-list .xuan").each(function () {
                $(this).addClass("current");
                // $(this).next().css({ "background-color": "#3366cc", "color": "#ffffff" });
            });
            GetCount();
        }
        
        
    });
    // 单选
    $(".g-Cart-list .xuan").click(function () {
        if($(this).hasClass('current')){
            

            $(this).removeClass('current');

        }else{
            $(this).addClass('current');
        }
        if($('.g-Cart-list .xuan.current').length==$('#cartBody li').length){
                $('.quanxuan').addClass('current');

            }else{
                $('.quanxuan').removeClass('current');
            }
        // $("#total2").html() = GetCount($(this));
        GetCount();
        //alert(conts);
    });
  // 已选中的总额
    function GetCount() {
        var conts = 0;
        var aa = 0; 
        $(".g-Cart-list .xuan").each(function () {
            if ($(this).hasClass("current")) {
                for (var i = 0; i < $(this).length; i++) {
                    conts += parseInt($(this).parents('li').find('input.text_box').val());
                    // aa += 1;
                }
            }
        });
        
         $(".total").html('<span>￥</span>'+(conts).toFixed(2));
    }
    GetCount();
</script>
@endsection


