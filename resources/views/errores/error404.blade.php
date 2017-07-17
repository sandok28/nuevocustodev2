@extends('layouts.base')

@section('title')
    Erro 404
@endsection
@section('content')

    <section id="error-container">

        <div class="block-error">

            <header>
                <h1 class="error">404</h1>
                <p class="text-center">Page not found</p>
            </header>

            <p class="text-center">Houston, we have a problem. We're having trouble loading the page you are looking for.</p>
            <div class="row">
                <div class="col-md-6">
                    {!!link_to_route('errores.error404', 'Back to Dashboard', null,['class'=>'btn btn-info btn-block btn-3d'])!!}
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary btn-block btn-3d" onclick="history.back();">Previous Page</button>
                </div>
            </div>
        </div>
    </section>
@endsection