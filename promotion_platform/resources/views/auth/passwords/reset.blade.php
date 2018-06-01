@include("layouts.head")
<body>
<div class="row">
    <div class="col-md-12">
        <div class="an-single-component with-shadow">
            <div class="an-component-header">
                <h3>重置密码</h3>
            </div>
            <!--选择角色-->
            <div class="select-area">
                <p>请选择角色</p>
                <div>
                    <div class="role-style">渠道商</div>
                    <div class="role-style role-style-right">健康联络员</div>
                </div>
            </div>
            <!--重置密码界面开始-->
            <div class="an-component-body" style="display: none">
                <div class="an-helper-block">
                    <form class="form-horizontal" role="form" autocomplete="off" id="data_from" method="post"
                          style="margin:50px auto">
                        <div class="form-group">
                            <label for="doc_level" class="col-md-2 col-md-offset-1 control-label">手机号</label>
                            <div class="col-md-6 col-lg-word">
                                <input type="text" class="an-form-control an-form-position" id="mobile" name="mobile"   maxlength="13"
                                       placeholder="输入手机号码">
                            </div>
                            <div class="col-lg-3 col-lg-word">
                                <span class="span-moblie span-danger"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="doc_level" class="col-md-2 col-md-offset-1 control-label">验证码</label>
                            <div class="col-md-2">
                                <input type="text" class="an-form-control" id="verify_code" name="verify_code"
                                       maxlength="6" placeholder="6位数字的验证码"/>
                            </div>
                            <div class="col-lg-2">
                                <button type="button" id="verify_code_btn" class="an-btn an-btn-primary">获取验证码
                                </button>
                            </div>
                            <div class="col-lg-3 col-lg-word">
                                <span class="span-verify-code span-danger"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="doc_level" class="col-md-2 col-md-offset-1 control-label">设置新密码</label>
                            <div class="col-md-4">
                                <input type="password" class="an-form-control" id="password" name="password"
                                       maxlength="20"
                                       placeholder="6-20位区分大小写组合密码"/>
                            </div>
                            <div class="col-lg-3 col-lg-word">
                                <span class="span-password span-danger"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="doc_level" class="col-md-2 col-md-offset-1 control-label">确认新密码</label>
                            <div class="col-md-4">
                                <input type="password" class="an-form-control" id="confirm_password"
                                       name="confirm_password" maxlength="20"
                                       placeholder="再次输入密码"/>
                            </div>
                            <div class="col-lg-3 col-lg-word">
                                <span class="span-confirm-password span-danger"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="doc_level" class="col-md-2 col-md-offset-1 control-label">&nbsp;</label>
                            <div class="col-sm-2">
                                <button type="button" id="save_btn" class="an-btn an-btn-primary"><i
                                            class="icon-upload"></i> 提交
                                </button>
                            </div>
                            <div class="col-lg-3 col-lg-word">
                                <span class="span-message span-danger"></span>
                            </div>
                        </div>
                    </form>
                </div>
                <!--重置密码界面结束-->
            </div>
        </div>
    </div>
</div>
</body>
@include("layouts.js")

