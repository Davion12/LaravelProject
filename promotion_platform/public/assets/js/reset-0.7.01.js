;(function ($) {
    var _param = $.extend({
        selectRole: 0,   //选择的角色， 0--表示渠道商， 1--表示健康推广员
        verifyCodeLock: false,
        countdownTime: 60,
        verifyRequestUrl: "/getVerifyCode/",
        resetPasswordLock: false
    }, _param);

    $(".role-style").on("click", function () {
        $(this).css("background-color", "blue");
        $(this).css("color", "white");
        var className = String($(this).attr("class"));
        if (className === "role-style") {
            _param.selectRole = 0;
        } else {
            _param.selectRole = 1;
        }
        setTimeout(function () {
            $(".select-area").hide();
            $(".an-component-body").show();
        }, 300);
    });
    var _post = function (url, data, callback) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'post',
            timeout: 20000,
            data: data,
            dataType: 'json',
            success: function (res) {
                callback(res);
            },
            error: function () {
            }
        });
    };
    var _countdown = function () {
        var countdownTime = _param.countdownTime;
        var _i = setInterval(function () {
            if (countdownTime <= 1) {
                clearInterval(_i);
                $("#verify_code_btn").html("重获验证码").addClass("an-btn-primary");
                _param.verifyCodeLock = false;
            } else {
                countdownTime--;
                $("#verify_code_btn").html("重获验证码（" + countdownTime + "）").removeClass("an-btn-primary");
            }

        }, 1000)
    };
    var _verifyMobile = function () {
        var mobile = $("#mobile").val();
        if(!/^\d{11}$/.test(mobile)){
            $(".span-moblie").html("请输入11位正确格式手机号");
            $("#mobile").addClass("danger");
            return false;
        } else {
            $(".span-moblie").html("");
            $("#mobile").removeClass("danger");
            _param.phonenum = $("#mobile").val();
            return true;
        }
    };
    var _verifyCode = function () {
        var verifyCode = $("#verify_code").val();
        if (!/^\d{6}$/.test(verifyCode)) {
            $(".span-verify-code").html("请输入六位数字验证码");
            $("#verify_code").addClass("danger").focus();
            return false;
        } else {
            $(".span-verify-code").html("");
            $("#verify_code").removeClass("danger");
            _param.verifyCode = verifyCode;
            return true;
        }
    };
    var _verifyPassword = function () {
        var password = $("#password").val();
        if (password.length < 6 || password.length > 20) {
            $(".span-password").html("请输入6-20位区分大小写组合密码");
            $("#password").addClass("danger").focus();
            return false;
        } else if (/^(\d{6,20}|[a-zA-Z]{6,20}|[!@#$%^&*`~\(\)]{6,20})$/.test(password)) {
            $(".span-password").html("请使用字母、数字或特殊符号（除空格外）区分大小写任意两种组合，长度6-20位");
            $("#password").addClass("danger").focus();
            return false;
        } else {
            _param.password = password;
            $(".span-password").html("");
            $("#password").removeClass("danger");
            return true;
        }
    };
    var _verifyConfirmPassword = function () {
        var confirmPassword = $("#confirm_password").val();
        if (confirmPassword.length == 0) {
            $(".span-confirm-password").html("请再次输入密码");
            $("#confirm_password").addClass("danger").focus();
            return false;
        } else if (confirmPassword != _param.password) {
            $(".span-confirm-password").html("两次密码输入不一致");
            $("#confirm_password").addClass("danger").focus();
            return false;
        } else {
            $(".span-confirm-password").html("");
            $("#confirm_password").removeClass("danger");
            return true;
        }
    };
    var _resetCallBack = function (res) {
        console.log(res);
        if (res.code == 0) {
            location.replace(res.url);
        } else {
            $(".span-message").html(res.message || "修改密码失败");
        }
    };

    $(this).each(function () {
        $("#mobile").blur(function () {
            _verifyMobile();
        });
        $("#verify_code_btn").on("click", function () {
            if(_verifyMobile()){
                if (_param.verifyCodeLock) return;
                _param.verifyCodeLock = true;
                _param.verifyRequestUrl += $("#mobile").val();
                if(_param.selectRole === 0){
                    _param.verifyRequestUrl += "?role=channel";
                } else {
                    _param.verifyRequestUrl += "?role=promoter";
                }
                $.ajax({
                    url: _param.verifyRequestUrl,
                    type: 'get',
                    timeout: 20000,
                    success: function (res) {
                        var result = $.parseJSON(res);
                        if(result.code === -1){
                            $(".span-moblie").html(result.message);
                            $("#mobile").addClass("danger");
                            return false;
                        }
                    },
                    error: function () {
                    }
                });
                _countdown();
            }
        });
        $("#verify_code").blur(function () {
            _verifyCode();
        });

        $("#password").blur(function () {
            _verifyPassword();
        });
        $("#confirm_password").blur(function () {
            _verifyConfirmPassword();
        });
        $("#save_btn").on("click", function () {
            if (_param.resetPasswordLock) return false;
            if (!_verifyCode()) return false;
            if (!_verifyPassword()) return false;
            if (!_verifyConfirmPassword()) return false;
            $(".span-message").html("");
            _post(location.href, {role: _param.selectRole, phonenum:_param.phonenum, verify_code: _param.verifyCode, password: _param.password}, _resetCallBack);
        })
    });
})(jQuery);