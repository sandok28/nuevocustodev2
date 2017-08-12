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
                            <div class="col-md-12">
                                {!! Form::select('TIPO DE REPORTES', ['PuertasFuncionarios' => 'Puertas por Funcionarios', 'HorarioFuncionarios' => 'Tipos de Horarios por Funcionarios'],null,['class'=>'form-control','id'=>'tipo']) !!}
                            </div>
                        </div><br><br>
                        <div class="row">
                            <div class="col-md-3">
                                {!! Form::label('Fecha de Inicio', null, ['class' => 'control-label']) !!}
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    {!! Form::date('Fecha_Inicio', \Carbon\Carbon::now(),['class'=>'form-control','id'=>'Fecha_Inicio']) !!}
                                </div>
                            </div>
                        </div><br><br>
                         <div class="row">
                             <div class="col-md-3">
                             {!! Form::label('Fecha de Fin', null, ['class' => 'control-label']) !!}
                             </div>
                             <div class="col-md-6">
                                 <div class="col-md-6">
                                     {!! Form::date('Fecha_Fin', \Carbon\Carbon::now(),['class'=>'form-control','id'=>'Fecha_Fin']) !!}
                                 </div>
                             </div>
                         </div><br><br>
                        <div class="row">
                            <div class="col-md-12">
                            {!! Form::label('Hora de Inicio', null, ['class' => 'control-label']) !!}
                            </div><br><br>
                            <div class="col-md-1">
                            {!! Form::label('Horas', null, ['class' => 'control-label']) !!}
                            </div>
                            <div class="col-md-2">
                            {!! Form::selectRange('horasinicio', 0, 23,null,['class' => 'form-control','id'=>'horasinicio']) !!}
                            </div>
                            <div class="col-md-1">
                            {!! Form::label('Minutos', null, ['class' => 'control-label']) !!}
                            </div>
                            <div class="col-md-2">
                            {!! Form::selectRange('minutosinicio', 0, 59,null,['class' => 'form-control','id'=>'minutosinicio']) !!}
                            </div><br><br>
                         </div>
                        <div class="row">
                            <div  class="col-md-12">
                                {!! Form::label('Hora de Fin', null, ['class' => 'control-label']) !!}
                            </div><br><br>
                            <div class="col-md-1">
                            {!! Form::label('Horas', null, ['class' => 'control-label']) !!}
                            </div>
                            <div class="col-md-2">
                            {!! Form::selectRange('horasfin', 0, 23,null,['class' => 'form-control','id'=>'horasfin']) !!}
                            </div>
                            <div class="col-md-1">
                            {!! Form::label('Minutos', null, ['class' => 'control-label']) !!}
                            </div>
                            <div class="col-md-2">
                            {!! Form::selectRange('minutosfin', 0, 59,null,['class' => 'form-control','id'=>'minutosfin']) !!}
                            </div>
                        </div>

                    </div>
                    </div>
                </div>
            </div>
    </section>


</div>