<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>注册</title>
    <meta content="app-id=984819816" name="apple-itunes-app" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="{{url('css/comm.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/login.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/vccode.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{url('layui/css/layui.css')}}">
    {{--<link rel="stylesheet" href="{{url('css/modipwd.css')}}">--}}
    {{--<link href="{{url('css/findpwd.css')}}" rel="stylesheet" type="text/css" />--}}
    <script src="{{url('js/jquery-1.11.2.min.js')}}"></script>
    <script src="{{url('layui/layui.js')}}"></script>

</head>
<body>
    
<!--触屏版内页头部-->
<div class="m-block-header" id="div-header">
    <strong id="m-title">注册</strong>
    <a href="{{url('index')}}" class="m-back-arrow"><i class="m-public-icon"></i></a>
    <a href="{{url('index')}}" class="m-index-icon"><i class="m-public-icon"></i></a>
</div>
    <div class="wrapper">
        <input name="hidForward" type="hidden" id="hidForward" />
        <input type="hidden" id="_token" value="{{csrf_token()}}">
        <div class="registerCon">
            <ul>
                <li class="accAndPwd">
                    <dl>
                        <s class="phone"></s>
                        <input id="user_tel" maxlength="11" type="number" placeholder="请输入您的手机号码" value="" />
                        <span class="clear">x</span>
                    </dl>
                    <dl>
                        <s class="phone"></s>
                        <input id="usercode" maxlength="4" type="number" placeholder="请输入您的验证码" value="" />
                        <span class="clear">x</span>
                        <button class="sendcode" id="btn" style="float:right;width: 100px;height: 43px;">获取验证码</button>
                    </dl>

                    </dl>
                    <br>
                    <br>

                    <dl>
                        <s class="password"></s>
                        <input class="pwd" maxlength="11" id="user_pwd" type="text" placeholder="6-16位数字、字母组成" value="" />
                        <input class="pwd" maxlength="11" type="password" placeholder="6-16位数字、字母组成" value="" style="display: none" />
                        <span class="mr clear">x</span>
                        <s class="eyeclose"></s>
                    </dl>
                    <dl>
                        <s class="password"></s>
                        <input class="conpwd" id="user_pwds" maxlength="11" type="text" placeholder="请确认密码" value="" />
                        <input class="conpwd"  maxlength="11" type="password" placeholder="请确认密码" value="" style="display: none" />
                        <span class="mr clear">x</span>
                        <s class="eyeclose"></s>
                    </dl>
                    <dl class="a-set">
                        <i class="gou"></i><p>我已阅读并同意《666潮人购购物协议》</p>
                    </dl>
                    <li>换了手机号码或遗失？请致电客服解除绑定400-666-2110</li>

                </li>
                <li><a id="btnNext" href="javascript:;" class="orangeBtn loginBtn">注册</a></li>
            </ul>
        </div>
        

<div class="footer clearfix" style="display:none;">
    <ul>
        <li class="f_home"><a href="/v44/index.do" ><i></i>云购</a></li>
        <li class="f_announced"><a href="/v44/lottery/" ><i></i>最新揭晓</a></li>
        <li class="f_single"><a href="/v44/post/index.do" ><i></i>晒单</a></li>
        <li class="f_car"><a id="btnCart" href="/v44/mycart/index.do" ><i></i>购物车</a></li>
        <li class="f_personal"><a href="/v44/member/index.do" ><i></i>我的云购</a></li>
    </ul>
</div>
<div class="layui-layer-move"></div>
<script>
    $(function () {
        $(document).on('click','#btn',function () {
            var _token = $('#_token').val();
            var user_tel = $('#user_tel').val();
            if(user_tel == ''){
                layer.msg("请输入手机号");
                return false;
            }
            if(!(/^1[345789]\d{9}$/.test(user_tel))){
                layer.msg("请输入正确的手机号码");
                return false;
            }
            $.post(
                "{{url('index/phone')}}",
                {_token:_token,user_tel:user_tel},
                function (res) {
                    if(res==1){
                        layer.msg('短信发送成功！');
                    }else{
                        layer.msg('短信发送失败！');
                    }
                }
            );
        })

        $('.registerCon input').bind('keydown',function(){
            var that = $(this);
            if(that.val().trim()!=""){

                that.siblings('span.clear').show();
                that.siblings('span.clear').click(function(){
                    console.log($(this));

                    that.parents('dl').find('input:visible').val("");
                    $(this).hide();
                })

            }else{
               that.siblings('span.clear').hide();
            }

        })
        function show(){
            if($('.registerCon input').attr('type')=='password'){
                $(this).prev().prev().val($("#passwd").val());
            }
        }
        function hide(){
            if($('.registerCon input').attr('type')=='text'){
                $(this).prev().prev().val($("#passwd").val());
            }
        }
        $('.registerCon s').bind({click:function(){
            if($(this).hasClass('eye')){
                $(this).removeClass('eye').addClass('eyeclose');
                $(this).prev().prev().prev().val($(this).prev().prev().val());
                $(this).prev().prev().prev().show();
                $(this).prev().prev().hide();
            }else{
                    console.log($(this  ));
                    $(this).removeClass('eyeclose').addClass('eye');
                    $(this).prev().prev().val($(this).prev().prev().prev().val());
                    $(this).prev().prev().show();
                    $(this).prev().prev().prev().hide();
                 }
             }
         })

        function registertel(){
            // 手机号失去焦点
            $('#userMobile').blur(function(){
                reg=/^1(3[0-9]|4[57]|5[0-35-9]|8[0-9]|7[06-8])\d{8}$/;//验证手机正则(输入前7位至11位)
                var that = $(this);

                if( that.val()==""|| that.val()=="请输入您的手机号")
                {
                    layer.msg('请输入您的手机号！');
                }
                else if(that.val().length<11)
                {
                    layer.msg('您输入的手机号长度有误！');
                }
                else if(!reg.test($("#userMobile").val()))
                {
                    layer.msg('您输入的手机号不存在!');
                }
                else if(that.val().length == 11){
                    // ajax请求后台数据
                }
            })
            // 密码失去焦点
            $('.pwd').blur(function(){
                reg=/^[0-9a-zA-Z]{6,16}$/;
                var that = $(this);
                if( that.val()==""|| that.val()=="6-16位数字或字母组成")
                {
                    layer.msg('请设置您的密码！');
                }else if(!reg.test($(".pwd").val())){
                    layer.msg('请输入6-16位数字或字母组成的密码!');
                }
            })

            // 重复输入密码失去焦点时
            $('.conpwd').blur(function(){
                var that = $(this);
                var pwd1 = $('.pwd').val();
                var pwd2 = that.val();
                if(pwd1!=pwd2){
                    layer.msg('您俩次输入的密码不一致哦！');
                }
            })

        }
            registertel();
        // 购物协议
        $('dl.a-set i').click(function(){
            var that= $(this);
            if(that.hasClass('gou')){
                that.removeClass('gou').addClass('none');
                $('#btnNext').css('background','#ddd');

            }else{
                that.removeClass('none').addClass('gou');
                $('#btnNext').css('background','#f22f2f');
            }

        })
        // 下一步提交
        $('#btnNext').click(function(){
            var _token = $("#_token").val();
            var usercode = $("#usercode").val();
            var user_tel = $("#user_tel").val();
            var user_pwd = $("#user_pwd").val();
            var user_pwds = $("#user_pwds").val();
            if(user_tel == ''){
                layer.msg("请输入手机号");
                return false;
            }
            if(!(/^1[345789]\d{9}$/.test(user_tel))){
                layer.msg("请输入正确的手机号码");
                return false;
            }
            if(usercode==''){
                layer.msg("请输入验证码");
                return false;
            }
            if(user_pwd==''){
                layer.msg("请输入密码");
                return false;
            }
            if(user_pwds==''){
                layer.msg("请输入确认密码");
                return false;
            }
            if(user_pwd!=user_pwds){
                layer.msg("两次密码不一致");
                return false;
            }
            $.post(
                "{{url('/registerdo')}}",
                {_token:_token,usercode:usercode,user_pwd:user_pwd,user_tel:user_tel},
                function(res){

                    if(res==1){
                        layer.msg("手机号码错误");
                    }else if(res==3){
                        layer.msg("验证码错误");
                    }else if(res==4){
                        layer.msg("注册成功");
                        location.href= "{{url('index')}}";
                    }else if(res==5){
                        layer.msg("注册失败");
                    }
                }

            );
        })

    })
</script>
<script src="js/all.js"></script>
</body>
</html>
