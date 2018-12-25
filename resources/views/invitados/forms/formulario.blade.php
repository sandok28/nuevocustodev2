<div class="form-group col-xs-6">
    {!!Form::label('nombre','Nombres:')!!}
    {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
</div>
<div class="form-group col-xs-6">
    {!!Form::label('apellido','Apellidos:')!!}
    {!!Form::text('apellido',null,['class'=>'form-control','placeholder'=>'Ingresa el Apellido del usuario'])!!}
</div>
<div class="form-group col-xs-6">
   {!!Form::label('cedula','Cedula:')!!}
   {!!Form::number('cedula',null,['class'=>'form-control','placeholder'=>'Ingresa el Cedula del usuario'])!!}
</div>
<div class="form-group col-xs-6">
    {!!Form::label('celular','Celular:')!!}
    {!!Form::number('celular',null,['class'=>'form-control','placeholder'=>'Ingresa el Numero de Celular del usuario'])!!}
</div>
<div class="form-group col-xs-6">
    {!!Form::label('correo','Correo:')!!}
    {!!Form::email('correo',null,['class'=>'form-control','placeholder'=>'Ingresa el E-mail del usuario'])!!}
</div>
<div class="form-group col-xs-6">
    <label class="control-label">Fecha de nacimiento:</label><br>
    <input class="datepicker input-group date form-control" id="fecha_nacimiento" name="fecha_nacimiento">
</div>




