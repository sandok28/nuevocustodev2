<div class="form-group">
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                            //poner imagen en la pantalla
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{url('assets/img/favicon.ico')}}" alt class="img-responsive  form-inline">
                                </div>
                            </div>
                             <div class="form-group">
                                 {!!Form::button('TOMAR FOTO',['class'=>'btn btn-primary btn-lg','data-toggle'=>'modal','data-target'=>'#basicModal'])!!}
                              </div>
                            <br><br>
                            <div class="form-group">
                                <div class="col-sm-3">
                                {!!Form::label('nombre','NOMBRE:')!!}
                                </div>
                                <div class="col-sm-9">
                                {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                                <div class="col-sm-3">
                                   {!!Form::label('apellido','APELLIDO:')!!}
                                </div>
                                <div class="col-sm-9">
                                    {!!Form::text('apellido',null,['class'=>'form-control','placeholder'=>'Ingresa el Apellido del usuario'])!!}
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                               <div class="col-sm-3">
                                   {!!Form::label('cedula','CEDULA:')!!}
                               </div>
                               <div class="col-sm-9">
                                   {!!Form::number('cedula',null,['class'=>'form-control','placeholder'=>'Ingresa el Cedula del usuario'])!!}
                               </div>
                            </div>
                        <br><br>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    {!!Form::label('celular','CELULAR:')!!}
                                </div>
                                <div class="col-sm-9">
                                    {!!Form::number('celular',null,['class'=>'form-control','placeholder'=>'Ingresa el Numero de Celular del usuario'])!!}
                                </div>
                                </div>
                        <br><br>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">FECHA DE NACIMIENTO:</label>
                                        <div class="col-sm-4">
                                            <input class="datepicker input-group date form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                                        </div>
                                </div>
                                        <br><br>
                                        <div class="form-group">
                                        <div class="col-sm-3">
                                            {!!Form::label('email','E-MAIL:')!!}
                                        </div>
                                        <div class="col-sm-9">
                                        {!!Form::text('correo',null,['class'=>'form-control','placeholder'=>'Ingresa el E-mail del usuario'])!!}
                                        </div>
                                </div>
                        <br><br>
                        <div class="form-group">
                            <div class="col-sm-3">
                                {!!Form::label('rfid','RFID:')!!}
                            </div>
                            <div class="col-sm-4">
                                {!!Form::text('tarjeta_rfid',null,['class'=>'form-control','placeholder'=>'Ingresa el Numero de RFID del usuario'])!!}
                            </div>

                        </div>
                        <br><br>
                        <div class="form-group">
                            <div class="col-sm-3">
                                {!!Form::label('cargo','CARGO:')!!}
                            </div>
                            <div class="col-sm-9">
                                {!! Form::select('cargo_id',$cargos_array,null,['class'=>'form-control'])!!}

                            </div>

                        </div>
                        <br><br>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    {!!Form::label('horario_normal','HORARIO:')!!}
                                </label>
                                <div class="col-sm-6">
                                    <div class="radio">
                                        {{ Form::radio('horario_normal', 0, true, ['class'=>'iradio_flat-grey checked','style'=>'position: relative'])}}<label>  Asignar horario estandar de la empresa</label><br>
                                        {{ Form::radio('horario_normal', 1, false, ['class'=>'iradio_flat-grey checked','style'=>'position: relative'])}}<label>   Asignar horario especial deacuerdo al empleado</label><br>
                                        {{ Form::radio('horario_normal', 2, false, ['class'=>'iradio_flat-grey checked','style'=>'position: relative'])}}<label>   Asignar horario deacuerdo al cargo</label>

                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Modal -->
    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">CAPTURAR FOTO</h4>
                </div>
                <div class="modal-body">
                    <div id="webcam"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
                    <button type="button" class="btn btn-primary" onclick="alert('implementar')">CAPTURAR</button>
                    <button type="button" class="btn btn-primary"  onclick="">GUARDAR</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="js/say-cheese.js"></script>
<script>
    function capturar()
    {
        alert('deiby envia el codigo para analizarlo he implementarlo');
    }
</script>





