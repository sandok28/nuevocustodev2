<div class="form-group">
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                             <div class="form-group">
                                 {!!Form::submit('TOMAR FOTO',['class'=>'btn btn-primary'])!!}
                             </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                {!!Form::label('name','NOMBRE:')!!}
                                </div>
                                <div class="col-sm-9">
                                {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
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
                                        <div class="col-sm-6">
                                        <input type="text" class="form-control" name="input1" id="input1" required="" placeholder="DD/MM/YYYY">
                                        </div>
                                </div>
                                <br><br>
                                <div class="form-group">
                                <div class="col-sm-3">
                                    {!!Form::label('email','E-MAIL:')!!}
                                </div>
                                <div class="col-sm-9">
                                {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingresa el E-mail del usuario'])!!}
                                </div>
                                </div>
                        <br><br>
                        <div class="form-group">
                            <div class="col-sm-3">
                                {!!Form::label('rfid','RFID:')!!}
                            </div>
                            <div class="col-sm-9">
                                {!!Form::number('rfid',null,['class'=>'form-control','placeholder'=>'Ingresa el Numero de RFID del usuario'])!!}
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <div class="col-sm-3">
                                {!!Form::label('cargo','CARGO:')!!}
                            </div>
                            <div class="col-sm-9">
                                {!!Form::select('CARGO',[
                                    'Cats' => ['leopard' => 'Leopard'],
                                    'Dogs' => ['spaniel' => 'Spaniel'],
                                ],null,['class'=>'form-control','placeholder'=>'Ingresa el Cargo del usuario'])!!}
                            </div>
                        </div>
                        <br><br>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-6">
                                    <div class="radio">
                                        {{ Form::radio('R1', 0, false)}}<label>Asignar Horario Asignado al Cargo</label>
                                    </div>
                                    <div class="radio">
                                        {{ Form::radio('R2', 0,false)}}<label>Asignar Horario Especial</label>
                                     </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page Level JS-->
    <script src="assets/plugins/icheck/js/icheck.min.js"></script>
    <script src="assets/plugins/validation/js/jquery.validate.min.js"></script>
</div>

