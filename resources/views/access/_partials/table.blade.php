<div class="table-responsive">
    <table class="table">
       
        <caption>Lista de registros de acceso</caption>

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Primer Nombre</th>
                <th scope="col">Primer Apellido</th>
                <th scope="col">Codigo</th>
                <th scope="col">Fecha</th>
            </tr>
        </thead>
        <tbody>


            @forelse ( $access as $item )
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->user->first_name }}</td>
                    <td>{{ $item->user->last_name }}</td>
                    <td>{{ $item->user->code }}</td>
                    <td>{{ $item->created_at }}</td>
                </tr>
                
            @empty
                <tr>
                    <td colspan="5">No hay registros</td>
                </tr>
            @endforelse
          
        </tbody>
    </table>
</div>
