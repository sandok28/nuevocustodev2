
<div class="col-md-12">
    @if(Session::get('tipo') == 'error')
        <div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 1em;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{Session::get('message')}}
        </div>
        <br>
    @endif

    @if(Session::get('tipo') == 'message')
        <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 1em;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{Session::get('message')}}
        </div>
        <br>
    @endif

    @if(count($errors)>0)
        <div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 0.1em;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            @if(count($errors) == 1)
                <h2>Un campo del formulario presenta problemas </h2>
            @else
                <h2>{{count($errors)}} campos del formulario presentan problemas </h2>
            @endif

            <ul>
                @foreach($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
        <br>

    @endif
</div>



