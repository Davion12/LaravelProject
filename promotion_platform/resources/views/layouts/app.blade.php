@include('layouts.head')
<body>
<div class="main-wrapper">
    <div class="an-loader-container">
        <img src="{{url("/assets/image/loader.png")}}" alt="">
    </div>
    <header class="an-header wow fadeInDown">
        <div class="an-topbar-left-part">
            <h3 class="an-logo-heading">
                <a class="an-logo-link" href="{{url("/")}}">贵健康推广平台
                    <span>Promotion Platform</span>
                </a>
            </h3>
            <button class="an-btn an-btn-icon toggle-button js-toggle-sidebar">
                <i class="icon-list"></i>
            </button>
        </div>

        <div class="an-topbar-right-part">
            <div class="an-profile-settings">
                <div class="btn-group an-notifications-dropown  profile">
                    <button type="button" class="an-btn an-btn-icon dropdown-toggle"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="an-user-name">John Smith</span>
                        <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
                    </button>
                    <div class="dropdown-menu">
                        <p class="an-info-count">设置</p>
                        <ul class="an-profile-list">
                            <li><a href="#"><i class="icon-user"></i>个人信息</a></li>
                            <li><a href="#"><i class="icon-lock"></i>修改密码</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="icon-download-left"></i>登出</a></li>
                        </ul>
                    </div>
                </div>
            </div> <!-- end .AN-PROFILE-SETTINGS -->
        </div> <!-- end .AN-TOPBAR-RIGHT-PART -->
    </header> <!-- end .AN-HEADER -->

    <div class="an-page-content">
        <div class="an-sidebar-nav js-sidebar-toggle-with-click">
            <div class="an-sidebar-nav">
                <ul class="an-main-nav">
                    <li class="an-nav-item current active">
                        <a class=" js-show-child-nav" href="#">
                            <i class="icon-chart-stock"></i>
                            <span class="nav-title">Dashboard
                    <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
                  </span>
                        </a>

                        <ul class="an-child-nav js-open-nav">
                            <li><a href="index.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/index.html">Version 1</a></li>
                            <li><a href="index_2.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/index_2.html">Version 2</a></li>
                            <li><a href="index_3.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/index_3.html">Version 3</a></li>
                        </ul>
                    </li>
                    <li class="an-nav-item">
                        <a class=" js-show-child-nav" href="#">
                            <i class="icon-squares"></i>
                            <span class="nav-title">UI Layouts
                    <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
                  </span>
                        </a>
                        <ul class="an-child-nav js-open-nav">
                            <li><a href="ui-basics.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/ui-basics.html">Basic Ui</a></li>
                            <li><a href="ui-buttons.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/ui-buttons.html">Buttons</a></li>
                            <li><a href="ui-tabs.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/ui-tabs.html">Tabs</a></li>
                            <li><a href="ui-accordions.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/ui-accordions.html">Accordions</a></li>
                            <li><a href="ui-portlets.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/ui-portlets.html">Portlets</a></li>
                            <li><a href="ui-sweetalerts.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/ui-sweetalerts.html">Sweet Alerts</a></li>
                            <li><a href="ui-social-icons.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/ui-social-icons.html">Social Icons</a></li>
                            <li><a href="ui-typography.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/ui-typography.html">Typography</a></li>
                            <li><a href="ui-modals.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/ui-modals.html">Modals</a></li>
                            <li><a href="ui-notifications.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/ui-notifications.html">Notifications</a></li>
                        </ul>
                    </li>

                    <li class="an-nav-item">
                        <a class=" js-show-child-nav" href="#">
                            <i class="icon-grid"></i>
                            <span class="nav-title">Components
                    <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
                  </span>
                        </a>
                        <ul class="an-child-nav js-open-nav">
                            <li><a href="component-select.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/component-select.html">Select Box</a></li>
                            <li><a href="component-switch.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/component-switch.html">LC Switch</a></li>
                            <li><a href="component-bs-switch.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/component-bs-switch.html">Bootstrap switch</a></li>
                            <li><a href="component-clipboard.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/component-clipboard.html">Clipboard</a></li>
                            <li><a href="component-datetime.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/component-datetime.html">Date Time Picker</a></li>
                            <li><a href="component-range.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/component-range.html">Ion Range Slider</a></li>
                            <li><a href="component-tags.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/component-tags.html">Tags Input</a></li>
                        </ul>
                    </li>
                    <li class="an-nav-item">
                        <a class="" href="forms.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/forms.html">
                            <i class="icon-setting"></i>
                            <span class="nav-title">Forms</span>
                        </a>
                    </li>

                    <li class="an-nav-item">
                        <a class=" js-show-child-nav" href="#">
                            <i class="icon-board-list"></i>
                            <span class="nav-title">Tables
                    <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
                  </span>
                        </a>
                        <ul class="an-child-nav js-open-nav">
                            <li><a href="tables-basic.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/tables-basic.html">Basic tables</a></li>
                            <li><a href="tables-bootstrap.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/tables-bootstrap.html">Bootstrap tables</a></li>
                        </ul>
                    </li>

                    <li class="an-nav-item">
                        <a class="" href="charts.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/charts.html">
                            <i class="icon-chart"></i>
                            <span class="nav-title">Charts</span>
                        </a>
                    </li>

                    <li class="an-nav-item">
                        <a class="" href="maps.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/maps.html">
                            <i class="icon-marker"></i>
                            <span class="nav-title">Maps</span>
                        </a>
                    </li>

                    <li class="an-nav-item">
                        <a class="" href="inbox.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/inbox.html">
                            <i class="icon-chat-o"></i>
                            <span class="nav-title">Inbox <span class="an-arrow-nav count">3</span></span>
                        </a>
                    </li>

                    <li class="an-nav-item">
                        <a class=" js-show-child-nav" href="#">
                            <i class="icon-book"></i>
                            <span class="nav-title">App page
                    <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
                  </span>
                        </a>
                        <ul class="an-child-nav js-open-nav">
                            <li><a href="page-chats.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/page-chats.html">Chat Layout</a></li>
                            <li><a href="page-profile.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/page-profile.html">Profile Page</a></li>
                            <li><a href="page-profile-setting.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/page-profile-setting.html">Profile Setting</a></li>
                            <li><a href="page-login.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/page-login.html">Login Form</a></li>
                            <li><a href="page-signup.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/page-signup.html">Register Form</a></li>
                            <li><a href="page-contact-us.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/page-contact-us.html">Contact Us</a></li>
                            <li><a href="page-about-us.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/page-about-us.html">About Us</a></li>
                            <li><a href="page-pricing.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/page-pricing.html">Pricing Table</a></li>
                            <li><a href="page-portfolio.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/page-portfolio.html">Portfolio</a></li>
                            <li><a href="page-blog.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/page-blog.html">Blog List</a></li>
                            <li><a href="page-blog-post.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/page-blog-post.html">Blog Post </a></li>
                            <li><a href="page-construction.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/page-construction.html">Comming soon</a></li>
                            <li><a href="page-404.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/page-404.html">404 Page</a></li>
                        </ul>
                    </li>

                    <li class="an-nav-item">
                        <a class=" js-show-child-nav" href="#">
                            <i class="icon-dot-vertical"></i>
                            <span class="nav-title">Starter page
                    <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
                  </span>
                        </a>
                        <ul class="an-child-nav js-open-nav">
                            <li><a href="layout-default.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/layout-default.html">Layout Default</a></li>
                            <li><a href="layout-boxed.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/layout-boxed.html">Layout Boxed</a></li>
                            <li><a href="layout-fixed-header.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/layout-fixed-header.html">Layout Fixed Header</a></li>
                            <li><a href="layout-minimal-header.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/layout-minimal-header.html">Layout Minimal Header</a></li>
                            <li><a href="layout-without-breadcrumb.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/layout-without-breadcrumb.html">Layout Without Breadcrumb</a></li>
                            <li><a href="layout-white-bg.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/layout-white-bg.html">Layout White Bg</a></li>
                        </ul>
                    </li>

                    <li class="an-nav-item">
                        <a class=" js-show-child-nav" href="#">
                            <i class="icon-dot-horizontal"></i>
                            <span class="nav-title">Sidebar layouts
                    <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
                  </span>
                        </a>
                        <ul class="an-child-nav js-open-nav">
                            <li><a href="layout-sidebar-default.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/layout-sidebar-default.html">Default Sidebar</a></li>
                            <li><a href="layout-sidebar-hidden.html" tppabs="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2017/3/9/d48154e6953258e68ad588e8fb72520e/layout-sidebar-hidden.html">Hidden Sidebar</a></li>
                        </ul>
                    </li>
                </ul> <!-- end .AN-MAIN-NAV -->
            </div> <!-- end .AN-SIDEBAR-NAV -->
        </div> <!-- end .AN-SIDEBAR-NAV -->

        <div class="an-content-body">

        </div> <!-- end .AN-PAGE-CONTENT-BODY -->
    </div> <!-- end .AN-PAGE-CONTENT -->

    <footer class="an-footer">
        <p>COPYRIGHT 2017 © ANALOG. ALL RIGHTS RESERVED</p>
    </footer> <!-- end an-footer -->
</div> <!-- end .MAIN-WRAPPER -->
<script src="{{url('/assets/js/jquery-3.3.1.min.js')}}" type="text/javascript"></script>
<script src="{{url('/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{url('/assets/js/moment.min.js')}}" type="text/javascript"></script>
<script src="{{url("/assets/js/daterangepicker.js")}}" type="text/javascript"></script>
<script src="{{url("/assets/js/wow.min.js")}}" type="text/javascript"></script>
<script src="{{url("/assets/js/perfect-scrollbar.jquery.min.js")}}" type="text/javascript"></script>
<script src="{{url("/assets/js/selectize.min.js")}}" type="text/javascript"></script>
<script src="{{url("/assets/js/owl.carousel.min.js")}}" type="text/javascript"></script>
<script src="{{url("/assets/js/Chart.min.js")}}" type="text/javascript"></script>
<script src="{{url("/assets/js/circle-progress.min.js")}}" type="text/javascript"></script>

<!--  MAIN SCRIPTS START FROM HERE  above scripts from plugin   -->
<script src="{{url("/assets/js/customize-chart.js")}}" type="text/javascript"></script>
<script src="{{url("/assets/js/scripts.js")}}" type="text/javascript"></script>
</body>
</html>
