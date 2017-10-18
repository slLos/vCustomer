@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Recursos</div>
                    <div class="panel-body">
                        @include('recurso.partials.messages')
                        {!! Form::open(['route' => 'recurso.store','method' => 'POST'])!!}
                            @include('recurso.partials.fields')
                            <button type="submit" class="btn btn-info">Guardar</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
