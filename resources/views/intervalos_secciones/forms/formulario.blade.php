<div class="col-md-5">
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

<div class="form-group">
    {!!Form::label('dia','Dias:')!!}
</div>

<div class="form-group">
    <div class="row">
        <div style="padding-left: 1em; display: inline-block;">
            {!! Form::checkbox(10001, 1) !!}
            {!! Form::label('Lunes') !!}
        </div>
        <div style="padding-left: 1em; display: inline-block;">
            {!! Form::checkbox(10002, 2) !!}
            {!! Form::label('Martes') !!}
        </div>
        <div style="padding-left: 1em; display: inline-block;">
            {!! Form::checkbox(10003, 3) !!}
            {!! Form::label('Miercoles') !!}
        </div>
        <div style="padding-left: 1em; display: inline-block;">
            {!! Form::checkbox(10004, 4) !!}
            {!! Form::label('Jueves') !!}
        </div>
        <div style="padding-left: 1em; display: inline-block;">
            {!! Form::checkbox(10005, 5) !!}
            {!! Form::label('Viernes') !!}
        </div>
        <div style="padding-left: 1em; display: inline-block;">
            {!! Form::checkbox(10006, 6) !!}
            {!! Form::label('Sabado') !!}
        </div>
        <div style="padding-left: 1em; display: inline-block;">
            {!! Form::checkbox(10007, 7) !!}
            {!! Form::label('Domingo') !!}
        </div>

    </div>


</div>

