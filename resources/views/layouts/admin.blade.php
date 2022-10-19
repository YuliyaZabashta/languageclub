<!DOCTYPE html>
<html lang="en">
<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1200">
    <link rel="icon" type="image/png" sizes="512x512" href="/images/logo.png">
    <title>{{$title}}</title>
</head>
<body>
    @yield('header')
    @if(session('status'))
        <div style="color: #528E0F;">
            <h3>{{ session('status')}}</h3>
        </div> 
    @endif
    @if(count($errors)>0)
        <div style="color: #F20000; font-size:20px; margin-top:0px; margin-bottom:-15px;float: left; margin-right: 500px; font-weight:bold;">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div> 
    @endif
    @yield('content') 

    
    <script src="{{ asset('/js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/jquery.nav.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/my.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    
</body>
</html>