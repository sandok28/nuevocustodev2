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
    {!! Form::open() !!}
    @include('Reportes.forms.formulario')
    {!! Form::button('Volver',['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}

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
