@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Editoriales</div>

                    @if(Session::has('message'))

                        <p class="alert alert-success">{{ Session::get('message')  }}</p>
                    @endif
                    <div class="panel-body">
                        <p>
                            <a class="btn btn-info" href="{{route('editorial.create')}}" role="button">
                                Agregar Editorial
                            </a>
                        </p>
                        @include('editorial.partials.table')
                        {!!$editoriales->render()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
