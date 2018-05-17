@extends('auth.passwords.reset')

@section('content')
    <!--选择角色-->
<div class="select_area">
    <p>请选择角色</p>
    <div>
        <div class="role_style">渠道商</div>
        <div class="role_style" style="left: 330px;top: -100px;">健康联络员</div>
        <button class="button_style" onclick="displayModify()">下一步</button>
    </div>
</div>
    <!--修改密码-->
<div class="modify_area">
    <div class="">
        <div>
            <p>手机号</p>
            <input class="input_style" id="name" type="text" value="11位手机号">
        </div>
        <div>
            <p>验证码</p>
            <input class="input_style" type="text" id="validate_code" style="width: 100px;" value="短信验证码">
            <button style="width: 100px;position: relative;left: 130px;top: -36px;height: 26px;background-color: #7099f3;border: none;color: white;">验证码发送</button>
        </div>
        <div style="position: relative;top: 120px;">
            <p>设置新密码</p>
            <input class="input_style" id="newPwd" type="text" value="6-20位区分大小写组合密码">
            <p>确认新密码</p>
            <input class="input_style" id="confirmPwd" type="text" value="再次输入密码">
            <button style="position: relative;left: -140px;top: 20px; height: 27px;width: 100px;background-color: #7099f3;border: none;color: white">提交</button>
        </div>

    </div>
</div>
@endsection