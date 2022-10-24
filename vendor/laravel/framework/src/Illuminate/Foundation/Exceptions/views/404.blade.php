<!DOCTYPE html>
<html lang="en">
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница не найдена</title>
</head>
<body>
<div class="header_box_position">
    <div class="header_box">
        <div class="header_logo"><a href="/"><h1>
            Language Education Club</h1><a>    
        </div>
    </div>
</div>
<div class="er404">
    <p>Страница <br> не найдена</p>
    <a href="/">&#8604;На главную</a>
</div>

@extends('layouts.site')
@section('footer')
    @include('site.footer') 
@endsection  
</body>
</html>