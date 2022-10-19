@if($prices)
<div class="services-block">
    <a href="/admin"> &#129044;В панель управления</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>№</th>
                <th>Язык</th>
                <th>Базовая стоимость</th>
                <th>Изображение</th>
                <th>Обновить</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
        @foreach($prices as $k=>$price)
        {!!Form::open(['url'=> route('prices',array('price'=>$price)), 'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data'])!!}
            @if($price['language'] != null)
            <tr>
                <td>{{$price->id}}{!!Form::hidden('id', $price['id'])!!}</td>
                <td>{!!Form::text('language', $price['language'], ['class'=>'form-control', 'placeholder'=>'Введите текст'])!!}</td>
                <td>{!!Form::text('base_price', $price['base_price'], ['class'=>'form-control', 'placeholder'=>'Введите текст'])!!}</td>
                <td>
                <div class="col-xs-offset-2 col-xs-10">
                    {!!Html::image('images/'.$price['img'],'',['class'=>'img-circle img-responsive','width'=>'30px','height'=>'30px'])!!}
                </div>
                <div class="col-xs-8">
                    {!!Form::file('img', ['class'=>'filestyle'])!!}
                </div>
                </td>
                <td style="width: 5%;">
                {!!Form::button('Обновить', ['class'=>'btn btn-primary','type'=>'submit'])!!}
                </td>
                <td style="width: 5%;">
                {!!Form::open(['url'=> route('prices',['price'=>$price->id]), 'class'=>'form-horizontal','method'=>'POST'])!!}
                    {{method_field('DELETE')}}
                    {!!Form::button('Удалить', ['class'=>'btn btn-danger','type'=>'submit'])!!}
                {!! Form::close() !!}
                </td>
            </tr>
           @endif 
        </tbody>
        {!! Form::close() !!}
        @endforeach
    </table>
    {!!Html::link(route('pricesAdd',['price'=>""]),'Добавить',['class'=>'btn btn-primary'])!!}

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>№</th>
                <th>Возраст</th>
                <th>Коэффициент цены</th>
                <th>Изображение</th>
                <th>Обновить</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
        @foreach($prices as $k=>$price)
        {!!Form::open(['url'=> route('prices',array('price'=>$price)), 'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data'])!!}
            @if($price['age'] != 0)
            <tr>
                <td>{{$price->id}}{!!Form::hidden('id', $price['id'])!!}</td>
                <td>{!!Form::text('age', $price['age'], ['class'=>'form-control', 'placeholder'=>'Введите текст'])!!}</td>
                <td>{!!Form::text('price_factor', $price['price_factor'], ['class'=>'form-control', 'placeholder'=>'Введите текст'])!!}</td>
                <td>
                <div class="col-xs-offset-2 col-xs-10">
                    {!!Html::image('images/'.$price['img'],'',['class'=>'img-circle img-responsive','width'=>'30px','height'=>'30px'])!!}
                </div>
                <div class="col-xs-8">
                    {!!Form::file('img', ['class'=>'filestyle'])!!}
                </div>
                </td>
                <td style="width: 5%;">
                {!!Form::button('Обновить', ['class'=>'btn btn-primary','type'=>'submit'])!!}
                </td>
                <td style="width: 5%;">
                {!!Form::open(['url'=> route('prices',['price'=>$price->id]), 'class'=>'form-horizontal','method'=>'POST'])!!}
                    {{method_field('DELETE')}}
                    {!!Form::button('Удалить', ['class'=>'btn btn-danger','type'=>'submit'])!!}
                {!! Form::close() !!}
                </td>
            </tr>
            @endif
        </tbody>
        {!! Form::close() !!}
        @endforeach
    </table>
    {!!Html::link(route('pricesAdd',['price'=>""]),'Добавить',['class'=>'btn btn-primary'])!!}

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>№</th>
                <th>График</th>
                <th>Коэффициент цены</th>
                <th>Изображение</th>
                <th>Обновить</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
        @foreach($prices as $k=>$price)
        {!!Form::open(['url'=> route('prices',array('price'=>$price)), 'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data'])!!}
            @if($price['class_schedule'] != 0)
            <tr>
                <td>{{$price->id}}{!!Form::hidden('id', $price['id'])!!}</td>
                <td>{!!Form::text('class_schedule', $price['class_schedule'], ['class'=>'form-control', 'placeholder'=>'Введите текст'])!!}</td>
                <td>{!!Form::text('price_factor', $price['price_factor'], ['class'=>'form-control', 'placeholder'=>'Введите текст'])!!}</td>
                <td>
                <div class="col-xs-offset-2 col-xs-10">
                    {!!Html::image('images/'.$price['img'],'',['class'=>'img-circle img-responsive','width'=>'30px','height'=>'30px'])!!}
                </div>
                <div class="col-xs-8">
                    {!!Form::file('img', ['class'=>'filestyle'])!!}
                </div>
                </td>
                <td style="width: 5%;">
                {!!Form::button('Обновить', ['class'=>'btn btn-primary','type'=>'submit'])!!}
                </td>
                <td style="width: 5%;">
                {!!Form::open(['url'=> route('prices',['price'=>$price->id]), 'class'=>'form-horizontal','method'=>'POST'])!!}
                    {{method_field('DELETE')}}
                    {!!Form::button('Удалить', ['class'=>'btn btn-danger','type'=>'submit'])!!}
                {!! Form::close() !!}
                </td>
            </tr>
            @endif
        </tbody>
        {!! Form::close() !!}
        @endforeach
    </table>
    {!!Html::link(route('pricesAdd',['price'=>""]),'Добавить',['class'=>'btn btn-primary'])!!}

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>№</th>
                <th>Тип занятий</th>
                <th>Коэффициент цены</th>
                <th>Изображение</th>
                <th>Обновить</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
        @foreach($prices as $k=>$price)
        {!!Form::open(['url'=> route('prices',array('price'=>$price)), 'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data'])!!}
            @if($price['class_type'] != 0)
            <tr>
                <td>{{$price->id}}{!!Form::hidden('id', $price['id'])!!}</td>
                <td>{!!Form::text('class_type', $price['class_type'], ['class'=>'form-control', 'placeholder'=>'Введите текст'])!!}</td>
                <td>{!!Form::text('price_factor', $price['price_factor'], ['class'=>'form-control', 'placeholder'=>'Введите текст'])!!}</td>
                <td>
                <div class="col-xs-offset-2 col-xs-10">
                    {!!Html::image('images/'.$price['img'],'',['class'=>'img-circle img-responsive','width'=>'30px','height'=>'30px'])!!}
                </div>
                <div class="col-xs-8">
                    {!!Form::file('img', ['class'=>'filestyle'])!!}
                </div>
                </td>
                <td style="width: 5%;">
                {!!Form::button('Обновить', ['class'=>'btn btn-primary','type'=>'submit'])!!}
                </td>
                <td style="width: 5%;">
                {!!Form::open(['url'=> route('prices',['price'=>$price->id]), 'class'=>'form-horizontal','method'=>'POST'])!!}
                    {{method_field('DELETE')}}
                    {!!Form::button('Удалить', ['class'=>'btn btn-danger','type'=>'submit'])!!}
                {!! Form::close() !!}
                </td>
            </tr>
            @endif
        </tbody>
        {!! Form::close() !!}
        @endforeach
    </table>
    {!!Html::link(route('pricesAdd',['price'=>""]),'Добавить',['class'=>'btn btn-primary'])!!}
</div>
@endif