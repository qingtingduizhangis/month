<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加</title>
</head>
<body>
<form action="{{route('goods.addAc')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    商品名：<input type="text" name="a_name"><p></p>
    图片：<input type="file" name="a_img"><p></p>
    拼团价格：<input type="text" name="a_price"><p></p>
    店铺价格：<input type="text" name="g_price"><p></p>
    拼团人数：<input type="text" name="a_people"><p></p>
    限购：<input type="text" name="a_num"><p></p>
    开始时间：<input type="date" name="start_time"><p></p>
    结束时间：<input type="date" name="end_time"><p></p>
    状态：<input type="text" name="status"><p></p>
    <input type="submit" value="添加">
</form>
</body>
</html>