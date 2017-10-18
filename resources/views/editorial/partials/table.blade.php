<table class="table table-striped">
    <tr>
        <th>Codigo</th>
        <th>Nombre Editorial</th>
        <th>Acciones</th>
    </tr>
    @foreach($editoriales as $editorial)
        <tr>

            <td>{{$editorial->codigo}}</td>
            <td>{{$editorial->nombreEditorial}}</td>
            <td>
                <a href="{{route('editorial.edit',$editorial)}}">Editar</a>
                @include('editorial.partials.delete')
            </td>
        </tr>
    @endforeach
</table>