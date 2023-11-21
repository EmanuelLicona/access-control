<div class="table-responsive">
    <table class="table">
       
        <caption>List of users</caption>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Primer Nombre</th>
                <th scope="col">Primer Apellido</th>
                <th scope="col">Correo Electronico</th>
                <th scope="col">Tipo de usuario</th>
                <th scope="col">Codigo</th>
                <th scope="col" >Acciones</th>
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
                    <td>{{ ($user->is_admin) ? 'Administrador' : 'Empleado' }}</td>
                    <td>{{ $user->code }}</td>

                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <a href="{{ route('access.create', $user->id) }}" class="btn btn-warning btn-sm">Generar registro</a>
                        {{-- <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger btn-sm">Eliminar</a> --}}
                    </td>
                </tr>
                
            @empty
                <tr>
                    <td colspan="5">No hay registros</td>
                </tr>
            @endforelse
          
        </tbody>
    </table>
</div>
