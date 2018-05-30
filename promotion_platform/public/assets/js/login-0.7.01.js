;(function ($) {
    $.fn.logIn = function (_param) {
        var _para = $.extend({},_param);
        return this.each(function () {
            $(".nav-tabs-custom").find("li").on("click",function () {
               if($(this).hasClass("active")){
                   return false;
               } else {
                   $(".password").removeClass("danger").val("").next(".alert").html("").fadeOut();
                   $(".mobile").removeClass("danger").val("").next(".alert").html("").fadeOut();
                   $(".alert-message").remove();
                   return true;
               }
            });
            $(".mobile").blur(function () {
                var mobile = $(this).val();
                if(mobile.length == 0){
                    $(this).addClass("danger");
                    $(this).next(".alert").html("请输入登录账户").fadeIn();
                }else if(!/^1[3-9]\d{9}$/.test(mobile)){
                    $(this).addClass("danger");
                    $(this).next(".alert").html("请输入正确的登录账户").fadeIn();
                }else {
                    $(this).removeClass("danger");
                    $(this).next(".alert").html("").fadeOut();
                }
            }).focus(function () {
                $(this).removeClass("danger");
                $(this).next(".alert").html("").fadeOut();
                $(".alert-message").remove();
            });
            $(".password").blur(function () {
                var password = $(this).val();
                if(password.length == 0){
                    $(this).addClass("danger");
                    $(this).next(".alert").html("请输入登录密码").fadeIn();
                }else if(password.length < 6){
                    $(this).addClass("danger");
                    $(this).next(".alert").html("请输入正确的登录密码").fadeIn();
                }else {
                    $(this).removeClass("danger");
                    $(this).next(".alert").html("").fadeOut();
                }
            }).focus(function () {
                $(this).removeClass("danger");
                $(this).next(".alert").html("").fadeOut();
                $(".alert-message").remove();
            });
            $("form").submit(function () {
                var mobile = $(this).find(".mobile").val();
                if(mobile.length == 0){
                    $(this).find(".mobile").addClass("danger").focus();
                    $(this).find(".mobile").next(".alert").html("请输入登录账户").fadeIn();
                    return false;
                }else if(!/^1[3-9]\d{9}$/.test(mobile)){
                    $(this).find(".mobile").addClass("danger").focus();
                    $(this).find(".mobile").next(".alert").html("请输入正确的登录账户").fadeIn();
                    return false;
                }else {
                    $(this).find(".mobile").removeClass("danger");
                    $(this).find(".mobile").next(".alert").html("").fadeOut();
                }
                var password = $(this).find(".password").val();
                if(password.length == 0){
                    $(this).find(".password").addClass("danger").focus();
                    $(this).find(".password").next(".alert").html("请输入登录密码").fadeIn();
                    return false;
                }else if(password.length < 6){
                    $(this).find(".password").addClass("danger").focus();
                    $(this).find(".password").next(".alert").html("请输入正确的登录密码").fadeIn();
                    return false;
                }else {
                    $(this).find(".password").removeClass("danger");
                    $(this).find(".password").next(".alert").html("").fadeOut();
                }
            });
        });
    }
})(jQuery);