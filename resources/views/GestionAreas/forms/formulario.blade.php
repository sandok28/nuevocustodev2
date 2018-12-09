<div class="form-group">
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-sm-3">
                                {!!Form::label('nombre','Nombre de la puerta:')!!}
                            </div>
                            <div class="col-sm-9">
                                {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre'])!!}
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <div class="col-sm-3">
                                {!!Form::label('Llave','Llave de encriptado:')!!}
                            </div>
                            <div class="col-sm-6">
                                {!!Form::number('llave_rfid',null,['class'=>'form-control','placeholder'=>'Llave','id'=>'llave_rfid','readonly'])!!}
                            </div>
                            <div class="col-sm-3">
                                {!!Form::button('Generar llave',['class'=>'btn btn-primary','onclick'=>'generarllaveencriptda()'])!!}
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <div class="col-sm-3">
                                {!!Form::label('ip','Direccion IP:')!!}
                            </div>
                            <div class="col-sm-9">
                                {!!Form::text('ip',null,['class'=>'form-control','placeholder'=>'0.0.0.0'])!!}
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                {!!Form::label('type','Tipo de puerta:')!!}
                            </label>
                            <div class="col-sm-6">
                                <div class="checkbox">
                                    {{ Form::radio('puerta_especial', 1, false,['class'=>'iradio_flat-grey checked','style'=>'position: relative'])}}<label>   Especial</label><br><br>
                                    {{ Form::radio('puerta_especial', 0,false,['class'=>'iradio_flat-grey checked','style'=>'position: relative'])}}<label>   Normal</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <br><br>

        </div>
    </section>

</div>

