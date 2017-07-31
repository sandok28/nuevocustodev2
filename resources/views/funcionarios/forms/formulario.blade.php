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
                                    {!!Form::text('apelido',null,['class'=>'form-control','placeholder'=>'Ingresa el Apellido del usuario'])!!}
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
                                        <div class="col-sm-6">
                                        <input type="text" class="form-control" name="fecha_nacimiento" required="" placeholder="DD/MM/YYYY">
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
                            <div class="col-sm-6">
                                {!!Form::text('tarjeta_rfid',null,['class'=>'form-control','placeholder'=>'Ingresa el Numero de RFID del usuario'])!!}
                            </div>
                            <div class="col-sm-3">
                                {!!Form::button('GENERAR',['class'=>'btn btn-primary','onclick'=>'alert("generar RFID")'])!!}
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <div class="col-sm-3">
                                {!!Form::label('cargo','CARGO:')!!}
                            </div>
                            <div class="col-sm-9">
                                <select class="form-control">
                                    @foreach($cargos as $cargo)
                                        <option>{{$cargo->nombre}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <br><br>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-6">
                                    <div class="radio">
                                        {{ Form::radio('horario', 0, false,['class'=>'iradio_flat-grey checked','style'=>'position: relative'])}}<label>  Asignar Horario Asignado al Cargo</label><br><br>
                                        {{ Form::radio('horario', 0,false,['class'=>'iradio_flat-grey checked','style'=>'position: relative'])}}<label>   Asignar Horario Especial</label>
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
                    <button type="button" class="btn btn-primary" onclick="capturar()">CAPTURAR</button>
                    <button type="button" class="btn btn-primary"  onclick="">GUARDAR</button>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    function capturar()
    {
        var sayCheese = new SayCheese('#webcam', { snapshots: true });

        sayCheese.on('start', function() {
            // do something when started
            this.takeSnapshot();
        });

        sayCheese.on('error', function(error) {
            // handle errors, such as when a user denies the request to use the webcam,
            // or when the getUserMedia API isn't supported
        });

        sayCheese.on('snapshot', function(snapshot) {
            // do something with a snapshot canvas element, when taken
        });

        sayCheese.start();

    }
    </script>




