<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 21/08/2017
 * Time: 3:54 PM
 */?>

@if(count($errors)>0)
    <div class="alert alert-danger alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
        <ul>
            @foreach($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif

