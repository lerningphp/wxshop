@extends('master')


@section('title','地址管理')
<link rel="stylesheet" href="{{url('css/sm.css')}}">
@section('content')


<body>
    

<div class="addr-wrapp">
    <input type="hidden" id="_token" value="{{csrf_token()}}">
    @foreach($addressInfo as $v)
    <div class="addr-list">
         <ul address_id="{{$v->address_id}}">
            <li class="clearfix">
                <span class="fl">{{$v->address_name}}</span>
                <span class="fr">{{$v->address_tel}}</span>
            </li>
            <li>
                <p>{{$v->address_detail}}</p>
            </li>
            <li class="a-set">
                @if($v->is_default == 1)
                    <s class="z-set" style="margin-top: 6px;"></s>
                @else
                    <s class="z-defalt" style="margin-top: 6px;"></s>
                @endif
                <span>设为默认</span>
                <div class="fr">
                    <span class="edit">编辑</span>
                    <span class="remove">删除</span>
                </div>
            </li>
        </ul>  
    </div>
    @endforeach
</div>

</body>
@endsection
@section('my-js')


<!-- 单选 -->
<script>
    

     // 删除地址
    $(document).on('click','.remove', function () {
        var _this = $(this);
        var _token = $('#_token').val();
        var address_id = $(this).parents('ul').attr('address_id');
        // console.log(address_id);
        $.post(
            "{{url('user/deladd')}}",
            {address_id:address_id,_token:_token},
            function (res) {
                // console.log(res);
                if(res.code == 1){
                    layer.msg(res.font,{icon:res.code});
                    window.location.reload();
                }else{
                    layer.msg(res.font,{icon:res.code});
                    return false;
                }
            },
            'json'
        );
        var groups = [buttons1, buttons2];
        $.actions(groups);
    });
</script>

<script>
    var $$=jQuery.noConflict();
    $$(document).ready(function(){
            // jquery相关代码
            $$('.addr-list .a-set s').toggle(
            function(){
                if($$(this).hasClass('z-set')){
                    
                }else{
                    $$(this).removeClass('z-defalt').addClass('z-set');
                    $$(this).parents('.addr-list').siblings('.addr-list').find('s').removeClass('z-set').addClass('z-defalt');
                }   
            },
            function(){
                if($$(this).hasClass('z-defalt')){
                    $$(this).removeClass('z-defalt').addClass('z-set');
                    $$(this).parents('.addr-list').siblings('.addr-list').find('s').removeClass('z-set').addClass('z-defalt');
                }
                
            }
        )

    });
    
</script>

@endsection

