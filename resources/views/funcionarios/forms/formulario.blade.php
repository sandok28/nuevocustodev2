<div class="form-group">
    {!!Form::label('name','Nombre:')!!}
    {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del funcionario'])!!}
    {!!Form::label('apellido','Apellido:')!!}
    {!!Form::text('apellido',null,['class'=>'form-control','placeholder'=>'Ingresa el Apellido del funcionario'])!!}
    {!!Form::label('cedula','Cedula:')!!}
    {!!Form::text('cedula',null,['class'=>'form-control','placeholder'=>'Ingresa el cedula del funcionario'])!!}
    {!!Form::label('fecha_nacimiento','Fecha de Nacimiento:')!!}
    {!!Form::text('fecha_de_nacimiento',null,['class'=>'form-control','placeholder'=>'Ingresa el fecha de nacimiento del funcionario'])!!}
    {!!Form::label('correo','Correo:')!!}
    {!!Form::text('correo',null,['class'=>'form-control','placeholder'=>'Ingresa el correo del funcionario'])!!}
    {!!Form::label('tarjeta_rfid','TARJETA RFID:')!!}
    {!!Form::text('tarjeta_rfid',null,['class'=>'form-control','placeholder'=>'Ingresa el tarjeta RFID del funcionario'])!!}
    {!!Form::label('dado_baja','DAR DE BAJA:')!!}
    {!!Form::text('dado_baja',null,['class'=>'form-control','placeholder'=>'Ingresa el dado de baja del funcionario'])!!}
</div>
