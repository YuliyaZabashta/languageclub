<div class="services-block">
    <a href="/admin/services"> &#129044;К списку сервисов</a>
    <hr>
    <div class="wrapper container-fluid">
    {!!Form::open(['url'=> route('servicesAdd'), 'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data'])!!}
    <div class="form-group">
        {!!Form::label('name', 'Название сервиса:', ['class'=>'col-xs-2 control-label'])!!}
        <div class="col-xs-8">
            {!!Form::text('name', old('name'),['class'=>'form-control', 'placeholder'=>'Введите название сервиса'])!!}
        </div>
    </div>

    <div class="form-group">
        {!!Form::label('alias', 'Псевдоним:', ['class'=>'col-xs-2 control-label'])!!}
        <div class="col-xs-8">
            {!!Form::text('alias', old('alias'),['class'=>'form-control', 'placeholder'=>'Введите псевдоним'])!!}
        </div>
    </div>

    <div class="form-group">
        {!!Form::label('text', 'Текст:', ['class'=>'col-xs-2 control-label'])!!}
        <div class="col-xs-8">
            {!!Form::textarea('text', old('text'), ['class'=>'ckeditor form-control', 'placeholder'=>'Введите текст сервиса'])!!}
        </div>
    </div>

    <div class="form-group">
        {!!Form::label('images', 'Изображение:', ['class'=>'col-xs-2 control-label'])!!}
        <div class="col-xs-8">
            {!!Form::file('img', ['class'=>'filestyle'])!!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!!Form::button('Сохранить', ['class'=>'btn btn-primary','type'=>'submit'])!!}
        </div>
    </div>

    {!! Form::close() !!}

    <script type="text/javascript">
            ('.ckeditor').ckeditor;
    </script>
    </div>
</div>