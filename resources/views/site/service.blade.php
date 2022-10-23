@extends('layouts.site')

@section('header')
<div class="header_box_position">
    <div class="header_box">
        <div class="header_logo"><a href="/"><h1>
            Language Education Club</h1><a>    
        </div>
        <a onclick="showTest()"><button id="test" class="btn btn-primary" type="submit">Тест</button></a>
        <div class="bigmenu">
            <div class="dropdown">  
                <a href="/">Главная</a>
                <a href="#calc">Цены</a>
                <a onclick="myFunction()" class="dropbtn">Услуги</a>
                <div id="myDropdown" class="dropdown-content">
                    @foreach($services as $service)
                    <a href="#{{$service['alias']}}">{{$service['name']}}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="hamburger-menu">
            <a onclick="myMenu()" class="menubtn">	&#9776;</a>
            <div id="mymenu" class="menu-content">
                <a href="/">Главная</a>
                @foreach($services as $service)
                <a href="#{{$service['alias']}}">{{$service['name']}}</a>
                @endforeach
                <a href="#calc">Цены</a>
            </div> 
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="test" id="myTest"> 
    @include('site.test') 
</div>
<div class="container">
    <div class="servicepage">     
        @foreach($services as $service)
        <section class="section" id="{{$service['alias']}}">
            <div class="servicename">{{$service['name']}}</div>
            <div class="serviceblock">
                <img src="/images/{{$service['img']}}">
                <?=$service['text']; ?>
                <a onclick="showModal()"><button  class="btn btn-primary" type="submit">Записаться</button></a>
                <a href="\service#calc"><button  class="btn btn-primary" type="submit">Узнать стоимость</button></a>
            </div>
        </section>
        @endforeach
    </div>   
    <section class="section" id="calc">
        <div class="serviceblock">
            <div id="calcparametr">
                <div class="servicename">Рассчитать стоимость</div>
                <div id="calcerror">
                    @if(session('status'))
                    <span id="success">{{ session('status')}}</span>
                    @endif
                    <span id="error"> </span >
                    <span id="error1"> </span> 
                    <span id="error2"></span>
                    <span id="error3"> </span> 
                </div> 
                <div class="calc">
                    @if($languages)
                    <p>Выберите язык</p>
                        @foreach($languages as $language)
                        <label>
                        <input type="radio" name="language" id="language" value="{{$language->base_price}}" />
                        <img src="images/{{$language->img}}">
                        </label>  
                        @endforeach
                    @endif
                </div>
                <div class="calc">
                    @if($class_schedules)
                    <p>График</p>
                        @foreach($class_schedules as $class_schedule)
                        <label>
                        <input type="radio" name="class_schedule" id="class_schedule" value="{{$class_schedule->price_factor}}" />
                        <img src="images/{{$class_schedule->img}}">
                        </label> 
                        <!--{!!Form::label('class_schedule', $class_schedule->class_schedule)!!}
                        {!!Form::radio('class_schedule', $class_schedule->price_factor)!!}-->
                        @endforeach
                    @endif
                </div>
                <div class="calc">
                    @if($ages)
                    <p>Выберите возраст</p>
                        @foreach($ages as $age)
                        <label>
                        <input type="radio" name="age" id="age" value="{{$age->price_factor}}" />
                        <img src="images/{{$age->img}}">
                        </label>  
                        <!--{!!Form::label('age', $age->age);!!}
                        {!!Form::radio('age', $age->price_factor)!!}-->
                        @endforeach
                    @endif
                </div>
                <div class="calc">
                    @if($class_types)
                    <p>Тип занятий</p>
                        @foreach($class_types as $class_type)
                        <label>
                        <input type="radio" name="class_type" id="class_type" value="{{$class_type->price_factor}}" />
                        <img src="images/{{$class_type->img}}">
                        </label> 
                        <!--{!!Form::label('class_type', $class_type->class_type)!!}
                        {!!Form::radio('class_type', $class_type->price_factor)!!}-->
                        @endforeach
                    @endif
                </div>
                <button type="button" id="check_button" class='btn btn-primary' onclick="checkButton()" > Узнать стоимость </button>
            </div>
                
            <div class="calcres" id="calcres">
            <div class="servicename">Оплата составит:</div>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>
                            </th>
                            <th id="year" colspan="2" >Оплата за учебный год/курс</th>
                            </tr>
                            <tr>
                            <th></th>
                            <th>
                                <p>В месяц</p>
                            </th>
                            <th id="year">
                                <p>При оплате в 2 этапа</p>
                            </th>
                            <th id="year">
                                <p>При единоразовой оплате</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>
                                <p>Сумма платежа</p>
                            </th>
                            <td><h4 id="disp"> </h4></td>
                            <td id="year"><h4 id="disp1"></h4></td>
                            <td id="year"><h4 id="disp2"></h4></td>
                        </tr>
                    </tbody>
                </table>
                <p> Оплата за год рассчитывается за 72 академических часа (9 месяцев)
                    <br>Действует система скидок 
                </p>   
                <button id="check_button" class="btn btn-primary" onclick="location.reload();">Изменить параметры</button>
                <a onclick="showModal()"><button id="check_button" class="btn btn-primary" type="submit">Записаться</button></a>
            </div>  
            <div id="myModal" class="modal-content" data-backdrop="static" data-keyboard="false">
                <a onclick="exitModal()">&#9587;</a>
                <div class="feedback">
                    <h3>Оставьте заявку</h3>
                    <p>Наш администратор свяжется с Вами в ближайшее время</p>
                    <!--<form action="{{route('service/feedback')}}" method="post">
                    <input type="text" class="feedbackinput" name="name" value="{{ old('name') }}" placeholder="Ваше имя">
                    <input type="tel"  class="feedbackinput" name="telephone" value="{{ old('telephone') }}" placeholder="+7 (999) 999-99-99" minlength="11" maxlength="12" data-phonemask-without-code="(999) 999-99-99">
                    <input type="submit"  class="btn-success" value="Отправить">-->
                    <form action="{{route('service/feedback')}}" method="post" role="form" data-toggle="validator">
                        <div class="form-group has-feedback">
                            <input type="text" name="name" class="feedbackinput" id="name" placeholder="Имя" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="tel" name="telephone" class="feedbackinput" id="telephone" placeholder="+7(999)999 99 99" data-minlength="12" maxlength="12" value="{{ old('telephone') }}" data-phonemask-without-code="(999) 999-99-99" required>
                        </div>
                        <button type="submit" class="btn btnsuccess">Отправить</button>
                    {{ csrf_field() }}
                    </form>
                </div>
            </div>              
        </div>
    </section>
</div> 
@endsection
@section('footer')
    @include('site.footer') 
@endsection