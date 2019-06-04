<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>详情页</title>
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class="row">
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="/storage/{{$res->a_img}}">
            <div class="caption">
                <h3 style="color: deepskyblue">{{$res->a_name}}</h3>
                <p style="color: red"><b>拼团：</b>{{$res->a_price}}</p>
                <p>拼团人数：{{$res->a_people}}</p>
                <p>{{$res->status}}</p>
                <p>开始时间：{{$res->start_time}}</p>
                <p>结束时间：{{$res->end_time}}</p>
                <p>限购：{{$res->a_num}}</p>
                <p><a href="{{route('goods.listActive')}}"><button class="btn btn-info">返回列表</button></a></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>