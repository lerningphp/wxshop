<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        li {
            list-style: none;
            margin:2%;
            float: left;
        }
    </style>
</head>
<body>
    <div id="content">
        <input type="text" name="search" id="search" value="{{$search}}">
        <input type="button" id="btn" value="搜索">
        <input type="hidden" id="_token" value="{{csrf_token()}}">
        <table border="1">
            <tr>
                <td>商品名称</td>
            </tr>

                @foreach($goodsInfo as $k=>$v)
                <tr>
                    <td>
                        {{$v->goods_name}}
                    </td>
                </tr>
                @endforeach

        </table>
            {!! $goodsInfo->appends(['search'=>$search])->render() !!}
    </div>
</body>
</html>
<script src="{{url('js/jquery-3.1.1.min.js')}}"></script>
<script>
    $(function () {
        $("#btn").click(function () {
            var search = $('#search').val();
            var _token = $('#_token').val();
            $.post(
                "{{url('goods/index')}}",
                {search:search,_token:_token},
                function(res){
                    $("#content").html(res);
                }
            );
        })
    })
</script>