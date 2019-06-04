<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>活动列表</title>
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<table class="table table-striped">
    <tr>
        <td>id</td>
        <td>商品名称</td>
        <td>商品图片</td>
        <td>拼团价格</td>
        <td>店铺价格</td>
        <td>拼团人数</td>
        <td>限购</td>
        <td>开始时间</td>
        <td>结束时间</td>
        <td>活动状态</td>
        <td colspan="2">操作</td>
    </tr>
    @foreach($res as $v)
    <tr>
        <td>{{$v->a_id}}</td>
        <td>{{$v->a_name}}</td>
        <td><img src="/storage/{{$v->a_img}}" width="25" height="25"></td>
        <td>{{$v->a_price}}</td>
        <td>{{$v->g_price}}</td>
        <td>{{$v->a_people}}</td>
        <td>{{$v->a_num}}</td>
        <td>{{$v->start_time}}</td>
        <td>{{$v->end_time}}</td>
        <td>{{$v->status}}</td>
        <td><a href="{{route('goods.listGoods')}}?id={{$v->a_id}}">详情</a></td>
        <td><a href="{{route('goods.addAcform')}}">添加</a></td>
    </tr>
        @endforeach
</table>
</body>
</html>