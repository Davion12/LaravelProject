<!DOCTYPE html>
<html>
<head>
    <title>贵健康推广后台登录</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="{{URL::asset('/favion.ico')}}" type="image/x-icon" />
    <link href="{{URL::asset('/css/login.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <div class="nav_style1">
        <div class="center"><span>渠道商</span></div>
    </div>
    <div class="nav_style2">
        <div class="center"><span>健康联络员</span></div>
    </div>
    <div class="login_form">
        <form method="post">
            <input class="form_style" name="username" type="text" value="账号" style="color:#cecdcd;position:  relative;top: 25px;">
            <input class="form_style" name="password" type="text" value="密码" style="color:#cecdcd;position:  relative;top: 60px;">
        </form>
        <input class="form_style submit_style" type="submit" value="登录" onclick="validate()">
        <a href="http://baidu.com" ><p style="position:  relative;top: 98px;font-size: 15px;right:  -72px;">忘记密码</p></a>
    </div>
</div>
</body>
<script type="text/javascript" src="{{URL::asset("/js/jquery-1.11.2.min.js")}}"></script>
<script type="text/javascript" src="{{URL::asset("/js/login.js")}}"></script>
</html>
