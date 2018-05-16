var selectRole = 0;  // 渠道商Distributor: 0;  健康联络员Healthor:"1

$(function () {
    $(".nav_style1").css({"background-color": "#2db0f9", "color": "white"});

    $(".nav_style1").on("click", function () {
        if (selectRole !== 0) {
            selectRole = 0;
            transferDisplay();
        }
    });

    $(".nav_style2").on("click", function () {
        if (selectRole !== 1) {
            selectRole = 1;
            transferDisplay();
        }
    });
    //点击隐藏提示语
    $(".form_style").first().mousedown(function () {
            if ($(this).val() === "账号") {
                $(this).val("");
                $(this).css({"color": "black"});
            }
        }
    );

    $(".form_style").first().blur(function () {
            if ($(this).val() === "") {
                $(this).val("账号");
                $(this).css({"color": "#cecdcd"});
            }
        }
    );
    //点击隐藏提示语
    $(".form_style").first().next().mousedown(function () {
            if ($(this).val() === "密码") {
                $(this).val("");
                $(this).attr('type','password');
                $(this).css({"color": "black"});
            }
        }
    );

    $(".form_style").first().next().blur(function () {
            if ($(this).val() === "") {
                $(this).val("密码");
                $(this).attr('type','text');
                $(this).css({"color": "#cecdcd"});
            }
        }
    );
});

//变化角色选择
function transferDisplay() {
    var color = $(".nav_style1").css("color");
    if (color === "rgb(255, 255, 255)") {
        $(".nav_style2").css({"background-color": "#2db0f9", "color": "white"});
        $(".nav_style1").css({"background-color": "white", "color": "black"});
    } else {
        $(".nav_style1").css({"background-color": "#2db0f9", "color": "white"});
        $(".nav_style2").css({"background-color": "white", "color": "black"});
    }
}
//验证登录信息
function validateLoginInfo(){
    //检查是否输入
    if(($("#username").val() === "") || ($("#username").val() === "账号") || ($("#password").val() === "") || ($("#password").val() === "密码") ){
        showErrorMsg("请输入账号和密码");
        return false;
    }

    //检查输入格式
    if(!(/^1[3|4|5|8][0-9]\d{8}$/.test($("#username").val()))){
        showErrorMsg("请输入正确格式的手机号");
        return false;
    }
    var params = {
        "username": $("#username").val(),
        "password": $("#password").val()
    };
    //请求登录信息验证
    $.ajax({
        url: $('#validateUrl').attr('data-url'),
        type: 'post',
        dataType: 'json',
        data: params,
        success: function (data) {

        }
    });
}

function showErrorMsg(msg) {
    $("#error_msg").html("*"+msg);
}