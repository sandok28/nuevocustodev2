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
                            {!! Form::select('TIPO DE REPORTES', ['tipo 1' => 'opcion1', 'tipo2' => 'opcion2'],null,['class'=>'form-control']) !!}
                        </div>
                        <div class="row">
                            {!! Form::label('Fecha de Inicio', null, ['class' => 'control-label']) !!}
                            {!! Form::date('Fecha_Inicio', \Carbon\Carbon::now(),null,['class'=>'form-control']) !!}
                        </div>
                         <div class="row">
                             {!! Form::label('Fecha de Fin', null, ['class' => 'control-label']) !!}
                             {!! Form::date('Fecha_Fin', \Carbon\Carbon::now(),null,['class'=>'btn btn-primary']) !!}
                         </div>
                        <div class="row">
                            {!! Form::label('Hora de Inicio', null, ['class' => 'control-label']) !!}
                            {!! Form::label('Horas', null, ['class' => 'control-label']) !!}
                            {!! Form::selectRange('number', 0, 23) !!}
                            {!! Form::label('Minutos', null, ['class' => 'control-label']) !!}
                            {!! Form::selectRange('number', 0, 59) !!}
                         </div>
                        <div class="row">
                            {!! Form::label('Hora de Fin', null, ['class' => 'control-label']) !!}
                            {!! Form::label('Horas', null, ['class' => 'control-label']) !!}
                            {!! Form::selectRange('number', 0, 23,['class' => 'control-label']) !!}
                            {!! Form::label('Minutos', null, ['class' => 'control-label']) !!}
                            {!! Form::selectRange('number', 0, 59,['class' => 'control-label']) !!}
                        </div>
                    </div>
                    </div>
                </div>
            </div>
    </section>
</div>