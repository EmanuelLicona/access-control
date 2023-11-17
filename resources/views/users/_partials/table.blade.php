<div class="table-responsive">
    <table class="table">
       
        <caption>List of users</caption>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Primer Nombre</th>
                <th scope="col">Primer Apellido</th>
                <th scope="col">Correo Electronico</th>
                <th scope="col">Codigo</th>
            </tr>
        </thead>
        <tbody>


            {{-- Ocupo el objeto y el indice --}}
            @forelse ( $users as $user )
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->code }}</td>
                </tr>
                
            @empty
                <tr>
                    <td colspan="5">No hay registros</td>
                </tr>
            @endforelse
          
        </tbody>
    </table>
</div>
