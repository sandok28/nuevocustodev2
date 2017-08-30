
<div class="col-md-6">
    <div class="form-group">
        {!!Form::label('Nombre','Nombre:')!!}
        {!!Form::label($funcionario->nombre,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
    </div>

    <div class="form-group">
        {!!Form::label('Apellido','Apellido:')!!}
        {!!Form::label($funcionario->apellido,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('Cedula','Cedula:')!!}
        {!!Form::label($funcionario->cedula,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('Celular','Celular:')!!}
        {!!Form::label($funcionario->celular,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        {!!Form::label('fecha_nacimiento','Fecha de nacimiento:')!!}
        {!!Form::label($funcionario->fecha_nacimiento,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('Correo','Email:')!!}
        {!!Form::label($funcionario->correo,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('tarjeta_rfid','Tarjeta RFID:')!!}
        {!!Form::label($funcionario->tarjeta_rfid,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('Cargo','Cargo:')!!}
        {!!Form::label($funcionario->cargo->nombre,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
    </div>
</div>
