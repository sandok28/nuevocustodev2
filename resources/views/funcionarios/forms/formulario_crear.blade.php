<div class="form-group">
    <section id="main-content">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <img id="imgFotoOficial_Perfil" name="imgFotoOficial_Perfil" src="{{url('assets/img/avatarfuncionario.png')}}" alt="User Avatar">
                                    <canvas id="foto" class="col-md-12" style="display: none"></canvas>
                                    <input type="hidden" value="" id="fotocreada" name="fotocreada">
                                </div>
                            </div>
                             <div class="form-group">
                                 {!!Form::button('TOMAR FOTO',['class'=>'btn btn-primary btn-lg offset','data-toggle'=>'modal','data-target'=>'#basicModal'])!!}
                              </div>
                            <br><br>
                            <div class="form-group">
                                <div class="col-sm-3">
                                {!!Form::label('nombre','Nombre:')!!}
                                </div>
                                <div class="col-sm-9">
                                {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre'])!!}
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                                <div class="col-sm-3">
                                   {!!Form::label('apellido','Apellido:')!!}
                                </div>
                                <div class="col-sm-9">
                                    {!!Form::text('apellido',null,['class'=>'form-control','placeholder'=>'Apellido'])!!}
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                               <div class="col-sm-3">
                                   {!!Form::label('cedula','Cedula:')!!}
                               </div>
                               <div class="col-sm-9">
                                   {!!Form::number('cedula',null,['class'=>'form-control','placeholder'=>'Numero de cedula'])!!}
                               </div>
                            </div>
                        <br><br>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    {!!Form::label('celular','Celular:')!!}
                                </div>
                                <div class="col-sm-9">
                                    {!!Form::number('celular',null,['class'=>'form-control','placeholder'=>'Numero de celular'])!!}
                                </div>
                                </div>
                        <br><br>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Fecha de nacimiento:</label>
                                        <div class="col-sm-4">
                                            <input class="datepicker input-group date form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                                        </div>
                                </div>
                                        <br><br>
                                        <div class="form-group">
                                        <div class="col-sm-3">
                                            {!!Form::label('email','Correo electronico:')!!}
                                        </div>
                                        <div class="col-sm-9">
                                        {!!Form::text('correo',null,['class'=>'form-control','placeholder'=>'E-mail'])!!}
                                        </div>
                                </div>
                        <br><br>
                        <div class="form-group">
                            <div class="col-sm-3">
                                {!!Form::label('rfid','RFID:')!!}
                            </div>
                            <div class="col-sm-4">
                                {!!Form::text('tarjeta_rfid',null,['class'=>'form-control','placeholder'=>'Numero de la targeta RFID del funcionario'])!!}
                            </div>

                        </div>
                        <br><br>
                        <div class="form-group">
                            <div class="col-sm-3">
                                {!!Form::label('cargo','Cargo:')!!}
                            </div>
                            <div class="col-sm-9">
                                {!! Form::select('cargo_id',$cargos_array,null,['class'=>'form-control'])!!}

                            </div>

                        </div>
                        <br><br>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    {!!Form::label('horario_normal','Horario:')!!}
                                </label>
                                <div class="col-sm-6">
                                    <div class="radio">
                                        {{ Form::radio('horario_normal', 0, true,  ['class'=>'iradio_flat-grey checked','style'=>'position: relative'])}}<label>  Asignar horario general de la empresa</label><br>
                                        {{ Form::radio('horario_normal', 1, false, ['class'=>'iradio_flat-grey checked','style'=>'position: relative'])}}<label>   Asignar horario deacuerdo al empleado</label><br>
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
                    <h4 class="modal-title" id="myModalLabel">Capturar foto</h4>
                </div>
                <div class="modal-body">
                    <div id="webcam">
                        <!--tomar foto-->


                        <input id="txtFotoOficial_Perfil" type="hidden" class="form-control" value="">
                        <video id="camara" autoplay="autoplay" class="col-md-12 img-thumbnail" style="display: none"></video>
                        <canvas id="foto" class="col-md-12" style="display: none"></canvas>



                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                    <button type="button" class="camara btn btn-primary" title="Camara" onclick="cargarVideoCamara()">
                    <i class="fa fa-camera"></i></button>

                    <button type="button" class="captura btn btn-primary" title="captura" onclick="capturar()">
                    <i class="fa fa-picture-o"></i></button>

                </div>
            </div>
        </div>
    </div>

</div>
<script>
    //script para tomar fotos
    function cargarVideoCamara() {
        $('#imgFotoOficial_Perfil').hide();
        $('#camara').show();
        $('.captura').show();
        window.URL = window.URL || window.webkitURL;
        navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia ||
            function () {
                swal(
                    'Error!!',
                    'Su navegador no soporta navigator.getUserMedia().',
                    'error'
                );
            };

        window.datosVideo = {
            'StreamVideo': false,
            'url': null
        }
        navigator.getUserMedia({
            'audio': false,
            'video': true
        }, function (streamVideo) {
            datosVideo.StreamVideo = streamVideo;
            datosVideo.url = window.URL.createObjectURL(streamVideo);
            jQuery('#camara').attr('src', datosVideo.url);

        }, function () {
            swal(
                'Error!!',
                'No fue posible obtener acceso a la cámara.',
                'error'
            );
        });
    }


    function capturar(){
        $("#foto").show();
        oCamara = $('#camara');
        oFoto = $('#foto');
        w = oCamara.width();
        l = oCamara.height();
        oFoto.attr({
            'width': w,
            'height': l
        });
        oContexto = oFoto[0].getContext('2d');
        oContexto.drawImage(oCamara[0], 0, 0, w, l);
        imgSrc = oFoto[0].toDataURL("image/png");
        $('#imgFotoOficial_Perfil').attr('src',imgSrc);
        $('#fotocreada').attr('value',imgSrc);
    }
</script>





