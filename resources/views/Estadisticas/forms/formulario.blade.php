<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 26/07/2017
 * Time: 9:31 AM
 */
?>


<div class="form-group">
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                    <div  class="panel-title">  GENERAR ESTADISTICAS <br><br></div>

                        <div class="row">
                            <div class="col-md-8">
                                {!! Form::select('TIPO DE REPORTES', ['cant_dias_fun' => 'Cantidad de dias de Licencias por Funcionario', 'cant_ingresos_area' => 'Cantidad de ingresos por Area'],null,['class'=>'form-control','id'=>'tipo']) !!}
                            </div>
                        </div><br><br>
                        <div class="row">
                            <div class="col-md-3">
                                {!! Form::label('Fecha de Inicio', null, ['class' => 'control-label']) !!}
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                        <input class="datepicker input-group date form-control" id="fecha_incio" name="fecha_inicio">
                                </div>
                            </div>
                        </div><br><br>
                         <div class="row">
                             <div class="col-md-3">
                             {!! Form::label('Fecha de Fin', null, ['class' => 'control-label']) !!}
                             </div>
                             <div class="col-md-3">
                                 <div class="form-group">
                                     <input class="datepicker input-group date form-control" id="fecha_fin" name="fecha_fin">
                                 </div>
                             </div>
                         </div><br><br>
                        <div id="hora">
                        <div class="row">
                            <div class="col-md-3">
                                {!! Form::label('Hora Inicio', null, ['class' => 'control-label']) !!}
                            </div>
                            <div class="form-group col-md-3">
                                <div class='input-group date' id='datetimepicker3'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                            </div>
                         </div>
                        <div class="row">
                            <div class="col-md-3">
                                {!! Form::label('Hora de Fin', null, ['class' => 'control-label']) !!}
                            </div>
                            <div class="form-group col-md-3">
                                <div class='input-group date' id='datetimepicker4'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
    </section>


</div>
