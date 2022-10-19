<!DOCTYPE html>
<html lang="en">
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1200">
    <link rel="icon" type="image/png" sizes="512x512" href="/images/logo.png">
    <title>Language Education Club</title>
</head>
<body>
    <div id="pop-up">
        <div>
            <p><b>Добрый день/вечер/ночь! :)</b></p>
            <p>Данный проект - учебный, создан при освоении автором<br>практических задач, предназначен для демонстрации в НЕКОММЕРЧЕСКИХ целях. Для создания сайта были использованы материалы из публичного доступа сети Интернет (картинки, шрифты, фото, форумы).<br> Данный сайт вымышленной организации, и он не имеет никакого отношения к представленным на нём фото, предложениям, людям</p>
            <button type="button" onclick="popYes()"><b>Ясненько</b></button>
        </div>
    </div>
    @yield('slider')  
    @yield('header')
    @yield('content')   
    @yield('footer') 
    
    <script defer src="{{ asset('/js/simple-adaptive-slider.min.js') }}"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
    // инициализация слайдера
    var slider = new ItcSimpleSlider('.itcss', {
        loop: true,
        autoplay: true,
        swipe: true,
        interval: 3000,
    });
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/jquery.nav.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/validator.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/validator.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/my.js') }}" type="text/javascript"></script>
</body>
</html>