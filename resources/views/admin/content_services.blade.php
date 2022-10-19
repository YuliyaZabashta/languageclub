@if($services)
<div class="services-block">
    <a href="/admin"> &#129044;В панель управления</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th style="width: 3%;">№</th>
                <th style="width: 5%;">Имя</th>
                <th style="width: 5%;">Псевдоним</th>
                <th style="width: 62%;">Текст</th>
                <th style="width: 20%;">Дата создания</th>
                <th style="width: 5%;">Удалить</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $k=>$service)
            <tr>
                <td style="width: 3%;">{{$service->id}}</td>
                <td style="width: 5%;">{!!Html::link(route('servicesEdit',['service'=>$service->id]),$service->name .' &#9998;Изменить')!!}</td>
                <td style="width: 5%;">{{$service->alias}}</td>
                <td style="width: 62%;">{{$service->text}}</td>
                <td style="width: 20%;">{{$service->created_at}}</td>
                <td style="width: 5%;">
                {!!Form::open(['url'=> route('servicesEdit',['service'=>$service->id]), 'class'=>'form-horizontal','method'=>'POST'])!!}
                    {{method_field('DELETE')}}
                    {!!Form::button('Удалить', ['class'=>'btn btn-danger','type'=>'submit'])!!}
                {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!!Html::link(route('servicesAdd',['service'=>""]),'Добавить',['class'=>'btn btn-primary'])!!}
</div>
@endif