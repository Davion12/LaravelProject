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