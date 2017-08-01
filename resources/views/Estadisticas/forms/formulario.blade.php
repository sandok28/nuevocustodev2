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
                                {!! Form::select('TIPO DE REPORTES', ['tipo 1' => 'opcion1', 'tipo2' => 'opcion2'],null,['class'=>'form-control']) !!}
                            </div>
                        </div><br><br>
                        <div class="row">
                            <div class="col-md-3">
                                {!! Form::label('Fecha de Inicio', null, ['class' => 'control-label']) !!}
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    {!! Form::date('Fecha_Inicio', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div><br><br>
                         <div class="row">
                             <div class="col-md-3">
                             {!! Form::label('Fecha de Fin', null, ['class' => 'control-label']) !!}
                             </div>
                             <div class="col-md-6">
                                 <div class="col-md-6">
                                     {!! Form::date('Fecha_Fin', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
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
                            {!! Form::selectRange('horas', 0, 23,null,['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-1">
                            {!! Form::label('Minutos', null, ['class' => 'control-label']) !!}
                            </div>
                            <div class="col-md-2">
                            {!! Form::selectRange('minutos', 0, 59,null,['class' => 'form-control']) !!}
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
                            {!! Form::selectRange('horas', 0, 23,null,['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-1">
                            {!! Form::label('Minutos', null, ['class' => 'control-label']) !!}
                            </div>
                            <div class="col-md-2">
                            {!! Form::selectRange('minutos', 0, 59,null,['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
    </section>


</div>