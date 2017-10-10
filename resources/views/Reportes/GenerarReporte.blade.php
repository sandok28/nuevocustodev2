<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 31/07/2017
 * Time: 12:07 PM
 */?>

@extends('layouts.principal')
@section('title')
    Generar Reportes
@endsection

@section('content')
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Panel title</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>

                </div>
            </div>
            <div class="panel-body">
                {!! Form::open() !!}
                @include('Reportes.forms.formulario')
                {!! Form::button('Volver',['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection

@section('cargarjs')


    <!--Page Leve JS -->
    {!! Html::script('assets/plugins/icheck/js/icheck.min.js') !!}
    {!! Html::script('assets/plugins/validation/js/jquery.validate.min.js') !!}
    <!--Page Level JS-->
    {!! Html::script("assets/plugins/icheck/js/icheck.min.js") !!}
    {!! Html::script("assets/plugins/validation/js/jquery.validate.min.js") !!}
    {!! Html::script("assets/js/jquery-2.1.4.min.js") !!}
    {!! Html::script("assets/js/webcam.min.js") !!}
    {!! Html::script("assets/plugins/morris/css/morris.css") !!}
@endsection
