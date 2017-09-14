<div class="form-group">
    {!!Form::label('name','Nombre:')!!}
    {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
</div>
<div class="form-group">
    {!!Form::label('password','Contraseña:')!!}
    {!!Form::password('password',['class'=>'form-control','placeholder'=>'Contraseña'])!!}
</div>
<div class="form-group">
    {!!Form::label('password_confirmacion','Repetir Contraseña:')!!}
    {!!Form::password('password_confirmacion',['class'=>'form-control','placeholder'=>'Repetir Contraseña'])!!}
</div>