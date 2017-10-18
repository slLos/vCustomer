<table class="table table-striped">
    <tr>
        <th>ISBN</th>
        <th>Titulo</th>
        <th>Resumen</th>
        <th>Total Paginas</th>
        <th>Tipo Libro</th>
        <th>Revista</th>
        <th>Monografia</th>
        <th>Codigo Editorial</th>
        <th>Acciones</th>
    </tr>
    @foreach($recursos as $recurso)
        <tr>

            <td>{{$recurso->ISBN}}</td>
            <td>{{$recurso->titulo}}</td>
            <td>{{$recurso->resumen}}</td>
            <td>{{$recurso->totalPaginas}}</td>
            <td>{{$recurso->tipoLibro}}</td>
            <td>{{$recurso->revista}}</td>
            <td>{{$recurso->monografia}}</td>
            <td>{{$recurso->codEditorial}}</td>
            <td>
                <a href="{{route('recurso.edit',$recurso)}}">Editar</a>
                @include('recurso.partials.delete')
            </td>
        </tr>
    @endforeach
</table>