@if($orders)
<div class="services-block">
    <a href="/admin"> &#129044;В панель управления</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>№</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Статус</th>
                <th>Дата создания</th>
                <th>Дата изменения</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $k=>$order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->telephone}}</td>
                <td>
                    @if($order->status == 0)
                    Новая
                    {!!Form::open(['url'=> route('orders',['order'=>$order->id]),'method'=>'POST'])!!}
                    {!!Form::hidden('id', $order->id)!!}
                    {!!Form::button('Подтвердить', ['class'=>'btn btn-danger','type'=>'submit'])!!}
                {!! Form::close() !!}
                    @else
                    Завершена
                    @endif
                </td>
                <td>{{$order->created_at}}</td>
                <td>{{$order->updated_at}}</td>
                <td>
                {!!Form::open(['url'=> route('orders',['order'=>$order->id]),'method'=>'POST'])!!}
                    {{method_field('DELETE')}}
                    {!!Form::hidden('id', $order->id)!!}
                    {!!Form::button('Удалить', ['class'=>'btn btn-danger','type'=>'submit'])!!}
                {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="services-block">
    <a href="/admin"> &#129044;В панель управления</a>
     Заявок нет
</div>
@endif