<div class="services-block">
    <a href="/admin"> &#129044;В панель управления</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th style="width: 8%;">Язык</th>
                <th style="width: 17%;">Базовая стоимость</th>
                <th style="width: 8%;">Изображение</th>
            </tr>
        </thead>
        <tbody>
        {!!Form::open(['url'=> route('pricesAdd',array('price'=>'')), 'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data'])!!}
            <tr>
                <td>{!!Form::text('language', '', ['class'=>'form-control', 'placeholder'=>'Язык'])!!}</td>
                <td>{!!Form::text('base_price', '', ['class'=>'form-control', 'placeholder'=>'Базовая цена'])!!}</td>
                <td>
                <div class="col-xs-8">
                    {!!Form::file('img', ['class'=>'filestyle'])!!}
                </div>
                </td>
            </tr>
        </tbody>
        <tr>
            <td colspan="8">{!!Form::button('Сохранить', ['class'=>'btn btn-primary','type'=>'submit'])!!}</td>
        </tr>
        {!! Form::close() !!}
    </table>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th style="width: 9%;">Возраст</th>
                <th style="width: 11%;">Коэффициент</th>
                <th style="width: 8%;">Изображение</th>
            </tr>
        </thead>
        <tbody>
        {!!Form::open(['url'=> route('pricesAdd',array('price'=>'')), 'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data'])!!}
            <tr>
                <td>{!!Form::text('age', '', ['class'=>'form-control', 'placeholder'=>'Возраст'])!!}</td>
                <td>{!!Form::text('price_factor', '', ['class'=>'form-control', 'placeholder'=>'Коэффициент'])!!}</td>
                <td>
                <div class="col-xs-8">
                    {!!Form::file('img', ['class'=>'filestyle'])!!}
                </div>
                </td>
            </tr>
        </tbody>
        <tr>
            <td colspan="8">{!!Form::button('Сохранить', ['class'=>'btn btn-primary','type'=>'submit'])!!}</td>
        </tr>
        {!! Form::close() !!}
    </table>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th style="width: 9%;">График</th>
                <th style="width: 11%;">Коэффициент</th>
                <th style="width: 8%;">Изображение</th>
            </tr>
        </thead>
        <tbody>
        {!!Form::open(['url'=> route('pricesAdd',array('price'=>'')), 'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data'])!!}
            <tr>
                <td>{!!Form::text('class_schedule', '', ['class'=>'form-control', 'placeholder'=>'График'])!!}</td>
                <td>{!!Form::text('price_factor', '', ['class'=>'form-control', 'placeholder'=>'Коэффициент'])!!}</td>
                <td>
                <div class="col-xs-8">
                    {!!Form::file('img', ['class'=>'filestyle'])!!}
                </div>
                </td>
            </tr>
        </tbody>
        <tr>
            <td colspan="8">{!!Form::button('Сохранить', ['class'=>'btn btn-primary','type'=>'submit'])!!}</td>
        </tr>
        {!! Form::close() !!}
    </table>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th style="width: 9%;">Тип занятий</th>
                <th style="width: 11%;">Коэффициент</th>
                <th style="width: 8%;">Изображение</th>
            </tr>
        </thead>
        <tbody>
        {!!Form::open(['url'=> route('pricesAdd',array('price'=>'')), 'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data'])!!}
            <tr>
                <td>{!!Form::text('class_type', '', ['class'=>'form-control', 'placeholder'=>'Тип занятий'])!!}</td>
                <td>{!!Form::text('price_factor', '', ['class'=>'form-control', 'placeholder'=>'Коэффициент'])!!}</td>
                <td>
                <div class="col-xs-8">
                    {!!Form::file('img', ['class'=>'filestyle'])!!}
                </div>
                </td>
            </tr>
        </tbody>
        <tr>
            <td colspan="8">{!!Form::button('Сохранить', ['class'=>'btn btn-primary','type'=>'submit'])!!}</td>
        </tr>
        {!! Form::close() !!}
    </table>
</div>