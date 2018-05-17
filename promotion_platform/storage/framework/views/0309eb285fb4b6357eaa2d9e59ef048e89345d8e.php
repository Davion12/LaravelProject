<!DOCTYPE html>
<html>
<head>
    <title>贵健康推广后台登录</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="<?php echo e(URL::asset('/favion.ico')); ?>" type="image/x-icon"/>
    <link href="<?php echo e(URL::asset('/css/login.css')); ?>" rel="stylesheet" type="text/css">
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
        <form method="post" action="<?php echo e(url('/login')); ?>">
            <?php echo e(csrf_field()); ?>

            <input id="email" class="form_style" tabindex=-1 name="email" type="text" value="账号"
                   style="color:#cecdcd;position:  relative;top: 25px; font-size: large">
            <input id="password" class="form_style" tabindex=-1 name="password" type="text" value="密码"
                   style="color:#cecdcd;position:  relative;top: 60px;font-size: large">

            <input class="form_style submit_style" tabindex=-1 type="submit" value="登录">
            <a href="<?php echo e(url('/password/reset')); ?>" style="position:  relative;top: 98px;font-size: 15px;right:  -72px; text-decoration: none"><p>忘记密码</p></a>
        </form>
    </div>
</div>
</body>
<script type="text/javascript" src="<?php echo e(URL::asset("/js/jquery-1.11.2.min.js")); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset("/js/login.js")); ?>"></script>
</html>
