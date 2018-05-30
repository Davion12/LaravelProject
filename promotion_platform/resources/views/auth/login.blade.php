@include('layouts.head',["title"=>"登录"])
<body>
<div class="main-wrapper">
    <div class="an-loader-container">
        <img src="{{url("/assets/image/loader.png")}}" alt="">
    </div>
    <div class="an-page-content">
        <div class="an-flex-center-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="an-login-container">
                            <div class="back-to-home">
                                <h3 class="an-logo-heading text-center wow fadeInDown">
                                    <a class="an-logo-link" href="{{url("/")}}">贵健康推广平台
                                        <span>Promotion Platform</span>
                                    </a>
                                </h3>
                            </div>
                            <div class="an-single-component with-shadow">
                                <div class="an-vertical-tab">
                                    <div class="an-tab-control listview" style="margin-bottom: 0">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs nav-tabs-custom text-center" role="tablist">
                                            <li role="presentation"
                                                @if (!$errors->has('guard') || $errors->first('guard') != "liaison") class="active" @endif>
                                                <a href="#channel_login" aria-controls="diska" role="tab"
                                                   data-toggle="tab">渠道商</a>
                                            </li>
                                            <li role="presentation"
                                                @if ($errors->has('guard') &&  $errors->first('guard') == "liaison") class="active" @endif><a
                                                        href="#liaison_login"
                                                        aria-controls="diskb" role="tab"
                                                        data-toggle="tab">健康联络员</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Tab panes -->
                                    <div class="an-component-body">
                                        <div class="tab-content">

                                            <div role="tabpanel" class="tab-pane fade  @if (!$errors->has('guard') || $errors->first('guard') != "liaison") in active @endif" id="channel_login">
                                                <form class="form-horizontal" autocomplete="off" role="form"
                                                      method="POST"
                                                      action="{{ url('/login') }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="guard" value="channel">
                                                    <label>账号</label>
                                                    <div class="an-input-group">
                                                        <div class="an-input-group-addon"><i
                                                                    class="ion-ios-telephone-outline"></i>
                                                        </div>
                                                        <input type="tel" name="mobile"
                                                               class="mobile an-form-control  @if ($errors->has('mobile')) danger @endif"
                                                               value="{{ old('mobile') }}">
                                                        <div class="alert alert-danger alert-dismissible fade in"
                                                             @if ($errors->has('mobile'))style="display: block"
                                                             @else style="display: none" @endif role="alert">
                                                            {{ $errors->first('mobile') }}
                                                        </div>
                                                    </div>

                                                    <label>密码</label>
                                                    <div class="an-input-group">
                                                        <div class="an-input-group-addon"><i class="ion-key"></i></div>
                                                        <input type="password" name="password"
                                                               class="password an-form-control @if ($errors->has('password')) danger @endif">
                                                        <div class="alert alert-danger alert-dismissible fade in"
                                                             @if ($errors->has('password'))style="display: block"
                                                             @else style="display: none" @endif role="alert">
                                                            {{ $errors->first('password') }}
                                                        </div>
                                                    </div>
                                                    <div class="remembered-section">
                                                        <a href="{{url("/password/reset")}}">忘记密码?</a>
                                                    </div>
                                                    <button class="an-btn an-btn-default fluid">登录</button>
                                                </form>
                                            </div> <!-- end .TAB-PANE -->

                                            <div role="tabpanel" class="tab-pane fade @if ($errors->has('guard') &&  $errors->first('guard') == "liaison") in active @endif" id="liaison_login">
                                                <form class="form-horizontal" autocomplete="off" role="form"
                                                      method="POST"
                                                      action="{{ url('/login') }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="guard" value="liaison">
                                                    <label>账号</label>
                                                    <div class="an-input-group">
                                                        <div class="an-input-group-addon"><i
                                                                    class="ion-ios-telephone-outline"></i>
                                                        </div>
                                                        <input type="tel" name="mobile"
                                                               class="mobile an-form-control  @if ($errors->has('mobile')) danger @endif"
                                                               value="{{ old('mobile') }}">
                                                        <div class="alert alert-danger alert-dismissible fade in"
                                                             @if ($errors->has('mobile'))style="display: block"
                                                             @else style="display: none" @endif role="alert">
                                                            {{ $errors->first('mobile') }}
                                                        </div>
                                                    </div>

                                                    <label>密码</label>
                                                    <div class="an-input-group">
                                                        <div class="an-input-group-addon"><i class="ion-key"></i></div>
                                                        <input type="password" name="password"
                                                               class="password an-form-control @if ($errors->has('password')) danger @endif">
                                                        <div class="alert alert-danger alert-dismissible fade in"
                                                             @if ($errors->has('password'))style="display: block"
                                                             @else style="display: none" @endif role="alert">
                                                            {{ $errors->first('password') }}
                                                        </div>
                                                    </div>
                                                    <div class="remembered-section">
                                                        <a href="{{url("/password/reset")}}">忘记密码?</a>
                                                    </div>
                                                    <button class="an-btn an-btn-default fluid">登录</button>
                                                </form>
                                            </div> <!-- end .TAB-PANE -->
                                            <br/>
                                            <div class="alert alert-message alert-danger alert-dismissible fade in"
                                                 @if ($errors->has('message'))style="display: block"
                                                 @else style="display: none" @endif role="alert">
                                                {{ $errors->first('message') }}
                                            </div>
                                        </div>
                                    </div> <!-- end .TAB-CONTENT -->
                                </div> <!-- end .AN-BOOTSTRAP-CUSTOM-TAB -->

                            </div> <!-- end .AN-SINGLE-COMPONENT -->
                        </div> <!-- end an-login-container -->
                    </div>
                </div> <!-- end row -->
            </div>
        </div> <!-- end an-flex-center-center -->
    </div> <!-- end .AN-PAGE-CONTENT -->
    <footer class="an-footer">
        <p>Copyright {{@date("Y")}} © Longmaster Inc.All Rights Reserved.网站备案/许可证号：黔B2-20090050-14</p>
    </footer> <!-- end an-footer -->
</div> <!-- end .MAIN-WRAPPER -->
@include('layouts.js')

<script src="{{url("/assets/js/login-0.7.01.min.js")}}" type="text/javascript"></script>
<script type="text/javascript">
    $(".container").logIn({});
</script>
</body>
</html>
