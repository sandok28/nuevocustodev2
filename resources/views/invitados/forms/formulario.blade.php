<div class="form-group">
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body row">
                         <div class="form-group col-xs-12">
                             <<  Agregar foto  >>
                         </div>
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
                            {!!Form::label('fecha_nacimiento','Fecha de nacimiento:')!!}
                            {!! Form::date('fecha_nacimiento', \Carbon\Carbon::now(),['class'=>'form-control'])!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

