
<div class="col-md-6">
    <div class=" form-group col-md-12">
        {!!Form::label('desde','Desde:',['class' =>'col-md-3'])!!}
        <div class="col-md-8">
            {!!Form::label('Hora','Hora:')!!}
            {!!Form::selectRange('desde_hora', 0, 23)!!}

            {!!Form::label('Minuto','Minuto:')!!}
            {!!Form::selectRange('desde_minuto', 0, 59)!!}
        </div>
    </div>
    <div class="form-group col-md-12">
        {!!Form::label('hasta','Hasta:', ['class' =>'col-md-3'])!!}
        <div class="col-md-8">
            {!!Form::label('Hora','Hora:')!!}
            {!!Form::selectRange('hasta_hora', 0, 23)!!}
            {!!Form::label('Minuto','Minuto:')!!}
            {!!Form::selectRange('hasta_minuto', 0,59)!!}
        </div>
    </div>
</div>

<div class="col-md-6 form-group">
    {!!Form::label('targeta_rfid','Targeta RFID:')!!}
    {!!Form::text('targeta_rfid',null,['class'=>'form-control','placeholder'=>'# targeta RFID'])!!}
</div>
