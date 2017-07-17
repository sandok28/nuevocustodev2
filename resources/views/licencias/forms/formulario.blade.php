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
                            {!!Form::label('desde','Desde:')!!}
                            {!!Form::date('desde',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
                        </div>
                        <div class="form-group col-xs-6">
                            {!!Form::label('hasta','Hasta:')!!}
                            {!!Form::date('hasta',null,['class'=>'form-control','placeholder'=>'Ingresa el Apellido del usuario'])!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

