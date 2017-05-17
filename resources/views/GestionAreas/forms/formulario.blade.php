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
                                {!!Form::number('llave',null,['class'=>'form-control','placeholder'=>'Genere Llave de Area'])!!}
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
                                    {{ Form::checkbox('puerta_especial',1)}}<label>Puerta Especila</label>
                                    <br><br>
                                    {{ Form::checkbox('puerta_especial',0,true)}}<label>Puerta Normal</label>
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

