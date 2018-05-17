//重置密码的角色
var resetPasswordRole = 0;

$(function () {
    if(resetPasswordRole === 0){
        $('.select_area').show();
        $('.modify_area').hide();
    } else {
        $('.modify_area').show();
        $('.select_area').hide();
    }

    $('.role_style').first().on("mousedown", function () {
        //选择渠道商
        if(resetPasswordRole !== 1){
            transfer(1);
            resetPasswordRole = 1;
        }
    });

    $('.role_style').first().next().on("mousedown", function () {
        //选择健康联络员
        if(resetPasswordRole !== 2){
            transfer(2);
            resetPasswordRole = 2;
        }
    });

    $('.input_style').on("mousedown", function () {
        if(($(this).css("color") === "rgb(206, 203, 203)") || ($(this).val() === "")){
            $(this).val("");
            $(this).css("color", "black")
        }
    });
    
    $('.input_style').on("blur", function () {
        if($(this).val() === ""){
            $(this).css("color", "rgb(206, 203, 203)");
        }
    });

});

function transfer(id) {
    if(id === 1){
        $('.role_style').first().css("background-color", "#7099f3");
        $('.role_style').first().css("color", "white");
        $('.role_style').first().next().css("background-color", "white");
        $('.role_style').first().next().css("color", "black");
    } else {
        $('.role_style').first().css("background-color", "white");
        $('.role_style').first().css("color", "black");
        $('.role_style').first().next().css("background-color", "#7099f3");
        $('.role_style').first().next().css("color", "white");
    }
}

//显示修改手机的界面
function displayModify() {
    $('.modify_area').show();
    $('.select_area').hide();
}