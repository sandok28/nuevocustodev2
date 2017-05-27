<div class="form-group">
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body row">
                         <div class="form-group col-xs-12">
                             {!!link_to_route('invitados.foto','TOMAR FOTO',['class'=>'btn btn-primary'])!!}
                         </div>
                        <div class="form-group col-xs-6">
                            {!!Form::label('name','NOMBRE:')!!}
                            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
                        </div>
                        <div class="form-group col-xs-6">
                            {!!Form::label('apellido','APELLIDO:')!!}
                            {!!Form::text('apellido',null,['class'=>'form-control','placeholder'=>'Ingresa el Apellido del usuario'])!!}
                        </div>
                        <div class="form-group col-xs-6">
                           {!!Form::label('cedula','CEDULA:')!!}
                           {!!Form::number('cedula',null,['class'=>'form-control','placeholder'=>'Ingresa el Cedula del usuario'])!!}
                        </div>
                        <div class="form-group col-xs-6">
                            {!!Form::label('celular','CELULAR:')!!}
                            {!!Form::number('celular',null,['class'=>'form-control','placeholder'=>'Ingresa el Numero de Celular del usuario'])!!}
                        </div>
                        <div class="form-group col-xs-6">
                            {!!Form::label('fecha_nacimiento','FECHA DE NACIMIENTO:')!!}
                            {!! Form::date('fecha_nacimiento', \Carbon\Carbon::now(),['class'=>'form-control'])!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

