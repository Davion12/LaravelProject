<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="{{URL::asset('/css/login.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
    <div class="layout">
        <h3>{{$page_name}}</h3>
        <HR align=center width=1300 color=#987cb9 SIZE=1>
        @yield('content')
    </div>
    </body>
</html>
<script type="text/javascript" src="{{URL::asset("/js/jquery-1.11.2.min.js")}}"></script>
<script src="{{URL::asset('/js/resetPassword.js')}}" type="text/javascript"></script>



