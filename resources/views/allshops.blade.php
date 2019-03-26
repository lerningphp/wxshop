@extends('master')

@section('title','所有商品')

@section('content')
    <body class="g-acc-bg" fnav="0" style="position: static">
    <div class="page-group">
    <div id="page-infinite-scroll-bottom" class="page">

        <div class="pro-s-box thin-bor-bottom" id="divSearch">
            <div class="box">
                <div class="border">
                    <div class="border-inner"></div>
                </div>
                <div class="input-box">
                    <i class="s-icon"></i>
                    <input type="text" placeholder="输入“汽车”试试" id="txtSearch" />
                    <i class="c-icon" id="btnClearInput" style="display: none"></i>
                </div>
            </div>
            <a href="javascript:;" class="s-btn" id="btnSearch">搜索</a>
        </div>

        <!--搜索时显示的模块-->
        <div class="search-info" style="display: none;">
            <div class="hot">
                <p class="title">热门搜索</p>
                <ul id="ulSearchHot" class="hot-list clearfix"><li wd='iPhone'><a class="items">iPhone</a></li><li wd='三星'><a class="items">三星</a></li><li wd='小米'><a class="items">小米</a></li><li wd='黄金'><a class="items">黄金</a></li><li wd='汽车'><a class="items">汽车</a></li><li wd='电脑'><a class="items">电脑</a></li></ul>
            </div>
            <div class="history" style="display: none">
                <p class="title">历史记录</p>
                <div class="his-inner" id="divSearchHotHistory">
                    <ul class="his-list thin-bor-top">
                        <li wd="小米移动电源" class="thin-bor-bottom"><a class="items">小米移动电源</a></li>

                    </ul>
                    <div class="cle-cord thin-bor-bottom" id="btnClear">清空历史记录</div>
                </div>
            </div>
        </div>

        <div class="all-list-wrapper">

            <div class="menu-list-wrapper" id="divSortList">
                <ul id="sortListUl" class="list">
                    @foreach($cateInfo as $k=>$v)
                        <li sortid='100' reletype='1' linkaddr=''>
                            <span class='items' id="cate_id" cate_id="{{$v->cate_id}}">{{$v->cate_name}}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="good-list-wrapper">
                <div class="good-menu thin-bor-bottom">
                    <ul class="good-menu-list" id="ulOrderBy">

                        <li orderflag="20">
                            <a href="javascript:;" id="is_hot" field="is_hot">热卖</a>
                        </li>
                        <li orderflag="50">
                            <a href="javascript:;" id="is_new" field="is_new">新品</a>
                        </li>
                        <li orderflag="30">
                            <a href="javascript:;" id="self_price" field="self_price">价格
                                <span>↑</span>
                            </a>
                        </li>
                        <!--价值(由高到低30,由低到高31)-->
                    </ul>
                </div>
                
                <div class="good-list-inner">
                    <div class="good-list-box  mui-content mui-scroll-wrapper">
                        <div class="goodList mui-scroll">
                            <ul id="ulGoodsList" class="mui-table-view mui-table-view-chevron">
                                @foreach($goodsInfo as $k=>$v)
                                <li id="">
                                    <a href="{{url('index/shopcontent')}}/{{$v->goods_id}}">
                                        <span class="gList_l fl">
                                                <img class="lazy" src="{{url('image/goodsimg')}}/{{$v->goods_img}}">
                                        </span>
                                    </a>
                                    <div class="gList_r">
                                            <h3 class="gray6">{{$v->goods_name}}</h3>
                                        <em class="gray9">价值：￥{{$v->self_price}}</em>

                                        <div class="gRate">            
                                            <div class="Progress-bar">    
                                                <p class="u-progress">
                                                    <span style="width: 91.91286930395593%;" class="pgbar">
                                                            <span class="pging"></span>
                                                    </span>
                                                </p>                
                                                <ul class="Pro-bar-li">
                                                    <li class="P-bar01"><em>7342</em>已参与</li>
                                                    <li class="P-bar02"><em>7988</em>总需人次</li>
                                                    <li class="P-bar03"><em>646</em>剩余</li>
                                                </ul>            
                                            </div>
                                            <a codeid="12785750" canbuy="646" class="cartadd" goods_id="{{$v->goods_id}}"><s></s></a>
                                        </div>    
                                    </div>
                                </li>
                                    @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
                   
            </div>
        </div>
        <input type="hidden" id="_token" value="{{csrf_token()}}">
        <div class="footer clearfix">
            <ul>
                <li class="f_home"><a href="{{url('index')}}"><i></i>潮购</a></li>
                <li class="f_announced"><a href="{{url('index/allshops')}}/0" class="hover"><i></i>所有商品</a></li>
                <li class="f_car"><a id="btnCart" href="{{url('cart/shopcart')}}" ><i></i>购物车</a></li>
                <li class="f_personal"><a href="{{url('user/userpage')}}" ><i></i>我的潮购</a></li>
                <li class="f_home"><a href="{{url('index')}}"><i></i>首页</a></li>

            </ul>
        </div>
    </div>
</div>
</body>
@endsection

@section('my-js')

<script>
    $(function () {
        layui.use(['layer'],function () {
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
                            location.href = "{{url('cart/shopcart')}}";
                        }
                    },
                    'json'
                );
            })

            $(document).on('click','#cate_id',function () {
                var _this=$(this);
                var cate_id = _this.attr('cate_id');
                var _token = $('#_token').val();
                $('#self_price').css('color','');
                $('#is_new').css('color','');
                $('#is_hot').css('color','');
                // console.log(cate_id);
                // console.log(_token);
                _this.parent("li").siblings('li').removeClass('current');
                _this.parent("li").addClass('current');
                $.post(
                    "{{url('index/shopajax')}}",
                    {_token:_token,cate_id:cate_id},
                    function (res) {
                       $('.good-list-inner').html(res);
                    }
                );
            })

            $('#div-header').attr('style','display:none');
            jQuery(document).ready(function() {
                $("img.lazy").lazyload({
                    placeholder : "{{url('images/loading2.gif')}}",
                    effect: "fadeIn",
                });
            });
            // 点击切换类别
            $('#sortListUl li').click(function(){
                $(this).addClass('current').siblings('li').removeClass('current');
            })

            mui.init({
                pullRefresh: {
                    container: '#pullrefresh',
                    down: {
                        contentdown : "下拉可以刷新",//可选，在下拉可刷新状态时，下拉刷新控件上显示的标题内容
                        contentover : "释放立即刷新",//可选，在释放可刷新状态时，下拉刷新控件上显示的标题内容
                        contentrefresh : "正在刷新...",
                        callback: pulldownRefresh
                    },
                    up: {
                        contentrefresh: '正在加载...',
                        callback: pullupRefresh
                    }
                }
            });
            /**
             * 下拉刷新具体业务实现
             */
            function pulldownRefresh() {
                setTimeout(function() {
                    var table = document.body.querySelector('.mui-table-view');
                    var cells = document.body.querySelectorAll('.mui-table-view-cell');
                    for (var i = cells.length, len = i + 3; i < len; i++) {
                        var li = document.createElement('li');
                        var str='';
                        // li.className = 'mui-table-view-cell';
                        str += '<span class="gList_l fl">';
                        str += '<img class="lazy" data-original="https://img.1yyg.net/GoodsPic/pic-200-200/20160908104402359.jpg" src="https://img.1yyg.net/GoodsPic/pic-200-200/20160908104402359.jpg" style="display: block;"/>';
                        str += '</span>';
                        str += '<div class="gList_r">';
                        str += '<h3 class="gray6">(第'+i+'云)苹果（Apple）iPhone 7 Plus 256G版 4G手机</h3>';
                        str += '<em class="gray9">价值：￥7988.00</em>';
                        str += '<div class="gRate">';
                        str += '<div class="Progress-bar">'
                        str += '<p class="u-progress">';
                        str += '<span style="width: 91.91286930395593%;" class="pgbar">';
                        str += '<span class="pging"></span>';
                        str += '</span>';
                        str += '</p>';
                        str += '<ul class="Pro-bar-li">';
                        str += '<li class="P-bar01"><em>7342</em>已参与</li>';
                        str += '<li class="P-bar02"><em>7988</em>总需人次</li>';
                        str += '<li class="P-bar03"><em>646</em>剩余</li>';
                        str += '</ul>';
                        str += '</div>';
                        str += '<a codeid="12785750" class="" canbuy="646"><s></s></a>';
                        str += '</div>';
                        str += '</div>';
                        //下拉刷新，新纪录插到最前面；
                        li.innerHTML = str;
                        table.insertBefore(li, table.firstChild);
                    }
                    mui('#pullrefresh').pullRefresh().endPulldownToRefresh(); //refresh completed
                }, 1500);
            }
            var count = 0;
            /**
             * 上拉加载具体业务实现
             */
            function pullupRefresh() {
                setTimeout(function() {
                    mui('#pullrefresh').pullRefresh().endPullupToRefresh((++count > 2)); //参数为true代表没有更多数据了。
                    var table = document.body.querySelector('.mui-table-view');
                    var cells = document.body.querySelectorAll('.mui-table-view-cell');
                    for (var i = cells.length, len = i + 20; i < len; i++) {
                        var li = document.createElement('li');
                        // li.className = 'mui-table-view-cell';
                        // var str='';
                        // str += '<span class="gList_l fl">';
                        // str += '<img class="lazy" data-original="https://img.1yyg.net/GoodsPic/pic-200-200/20160908104402359.jpg" src="https://img.1yyg.net/GoodsPic/pic-200-200/20160908104402359.jpg" style="display: block;"/>';
                        // str += '</span>';
                        // str += '<div class="gList_r">';
                        // str += '<h3 class="gray6">(第'+i+'云)苹果（Apple）iPhone 7 Plus 256G版 4G手机</h3>';
                        // str += '<em class="gray9">价值：￥7988.00</em>';
                        // str += '<div class="gRate">';
                        // str += '<div class="Progress-bar">'
                        // str += '<p class="u-progress">';
                        // str += '<span style="width: 91.91286930395593%;" class="pgbar">';
                        // str += '<span class="pging"></span>';
                        // str += '</span>';
                        // str += '</p>';
                        // str += '<ul class="Pro-bar-li">';
                        // str += '<li class="P-bar01"><em>7342</em>已参与</li>';
                        // str += '<li class="P-bar02"><em>7988</em>总需人次</li>';
                        // str += '<li class="P-bar03"><em>646</em>剩余</li>';
                        // str += '</ul>';
                        // str += '</div>';
                        // str += '<a codeid="12785750" class="" canbuy="646"><s></s></a>';
                        // str += '</div>';
                        // str += '</div>';
                        // li.innerHTML = str;
                        // table.appendChild(li);
                    }
                }, 1500);
            }
            /** 点击热卖 */
            $(document).on('click','#is_hot',function () {
                var _token = $('#_token').val();
                $(this).css('color','red');
                $('#self_price').css('color','');
                $('#is_new').css('color','');
                $.post(
                    "{{url('index/ishot')}}",
                    {_token:_token},
                    function (res) {
                        $('.good-list-inner').html(res);
                    }
                );
            })
            /** 点击新品 */
            $(document).on('click','#is_new',function () {
                var _token = $('#_token').val();

                $(this).css('color','red');
                $('#self_price').css('color','');
                $('#is_hot').css('color','');
                $.post(
                    "{{url('index/isnew')}}",
                    {_token:_token},
                    function (res) {
                        $('.good-list-inner').html(res);
                    }
                );
            })
            /** 点击价格 */
            $(document).on('click','#self_price',function () {
                var _token=$("#_token").val();
                var self_price=$(this).children().html();

                $("#is_new").css("color",'');
                $("#is_hot").css("color",'');
                var type='';
                if(self_price=='↑'){
                    type=1;
                    $(this).children().html("↓");
                }else{
                    type=2;
                    $(this).children().html("↑");
                }
                $(this).css("color",'red');
                $.post(
                    "{{url('index/price')}}",
                    {_token:_token,type:type},
                    function(res){
                        $(".good-list-inner").html(res);
                    }
                );
            })
        })
    })
</script>
@endsection

