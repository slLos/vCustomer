@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Editoriales</div>
                    <div class="panel-body">
                        @include('editorial.partials.messages')
                        {!! Form::open(['route' => 'editorial.store','method' => 'POST'])!!}
                            @include('editorial.partials.fields')
                            <button type="submit" class="btn btn-info">Guardar</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
