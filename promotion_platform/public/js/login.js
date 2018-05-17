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

    $("#email").on("mousedown", function () {
        if($(this).val() === "账号"){
            $(this).val("");
            $(this).css("color", "black");
        }
    });

    $("#email").on("blur", function () {
        if(($(this).val() === "") || ($(this).val() === "账号")){
            $(this).val("账号");
            $(this).css("color", "#cecdcd");
        }
    })

    $("#password").on("mousedown", function () {
        if($(this).val() === "密码"){
            $(this).val("");
            $(this).css("color", "black");
            $(this).attr("type","password");
        }
    });

    $("#password").on("blur", function () {
        if(($(this).val() === "") || ($(this).val() === "密码")){
            $(this).val("密码");
            $(this).css("color", "#cecdcd");
            $(this).attr("type","text");
        }
    })

});

//变化角色选择
function transferDisplay() {

    $("#email").val("账号");
    $("#email").css("color", "#cecdcd");
    $("#password").val("密码");
    $("#password").attr("type", "text");
    $("#password").css("color", "#cecdcd");

    var color = $(".nav_style1").css("color");
    if (color === "rgb(255, 255, 255)") {
        $(".nav_style2").css({"background-color": "#2db0f9", "color": "white"});
        $(".nav_style1").css({"background-color": "white", "color": "black"});
    } else {
        $(".nav_style1").css({"background-color": "#2db0f9", "color": "white"});
        $(".nav_style2").css({"background-color": "white", "color": "black"});
    }
}