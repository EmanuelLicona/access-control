<table>
    <thead>
        <tr>
            <th>Id</th>

            <th>Nombre</th>
            <th>Apellido</th>

            <th>Code</th>

            <th>Tipo</th>

            <th>Fecha</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($access as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->user->first_name }}</td>
                <td>{{ $item->user->last_name }}</td>
                <td>{{ $item->user->code }}</td>
                <td>
                    @if ($item->type == 'in')
                        Entrada
                    @else
                        Salida
                    @endif
                </td>

                <td>{{ $item->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
