<div class="form-group">
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-sm-3">
                                {!!Form::label('nombre','NOMBRE DE LA PUERTA:')!!}
                            </div>
                            <div class="col-sm-9">
                                {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del Area'])!!}
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <div class="col-sm-3">
                                {!!Form::label('Llave','LLAVE:')!!}
                            </div>
                            <div class="col-sm-6">
                                {!!Form::number('llave_rfid',null,['class'=>'form-control','placeholder'=>'Genere Llave de Area','id'=>'llave_rfid'])!!}
                            </div>
                            <div class="col-sm-3">
                                {!!Form::button('GENERAR',['class'=>'btn btn-primary','onclick'=>'generarllaveencriptda()'])!!}
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <div class="col-sm-3">
                                {!!Form::label('ip','IP:')!!}
                            </div>
                            <div class="col-sm-9">
                                {!!Form::text('ip',null,['class'=>'form-control','placeholder'=>'Ingresa IP de Puerta'])!!}
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
                                <div class="checkbox">
                                    {{ Form::radio('puerta_especial', 1, false,['class'=>'iradio_flat-grey checked','style'=>'position: relative'])}}<label> Puerta Especila</label><br><br>
                                    {{ Form::radio('puerta_especial', 0,false,['class'=>'iradio_flat-grey checked','style'=>'position: relative'])}}<label>  Puerta Normal</label>
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

