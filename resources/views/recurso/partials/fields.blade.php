<div class="form-group">
    {!! Form::label('ISBN','ISBN')!!}
    {!! Form::text('ISBN',null,['class' => 'form-control','placeholder' => 'Por favor introduzca el ISBN'])!!}
</div>
<div class="form-group">
    {!! Form::label('titulo','Titulo')!!}
    {!! Form::text('titulo',null,['class' => 'form-control','placeholder' => 'Por favor introduzca el titulo'])!!}
</div>
<div class="form-group">
    {!! Form::label('resumen','Resumen')!!}
    {!! Form::text('resumen',null,['class' => 'form-control','placeholder' => 'Por favor introduzca el resumen'])!!}
</div>
<div class="form-group">
    {!! Form::label('totalPaginas','Total de Paginas')!!}
    {!! Form::text('totalPaginas',null,['class' => 'form-control','placeholder' => 'Por favor introduzca el total de Paginas'])!!}
</div>
<div class="form-group">
    {!! Form::label('tipoLibro','Tipo de Libro')!!}
    {!! Form::text('tipoLibro',null,['class' => 'form-control','placeholder' => 'Por favor introduzca el tipo de Libro'])!!}
</div>
<div class="form-group">
    {!! Form::label('revista','Revista')!!}
    {!! Form::text('revista',null,['class' => 'form-control','placeholder' => 'Por favor introduzca el nombre de la Revista'])!!}
</div>
<div class="form-group">
    {!! Form::label('monografia','Monografia')!!}
    {!! Form::text('monografia',null,['class' => 'form-control','placeholder' => 'Por favor introduzca el nombre de la Monografia'])!!}
</div>
<div class="form-group">
    {!! Form::label('codEditorial','Editorial')!!}
    {!! Form::select('codEditorial',['' => 'Seleccione una Editorial','123' => 'Norma', '124' => 'Santillana'],null,['class' => 'form-control'])!!}
</div>