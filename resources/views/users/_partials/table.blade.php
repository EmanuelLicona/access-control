<div class="table-responsive">
    <div class="d-flex justify-content-between">
        <form class="d-flex" role="search" method="GET" action="{{ route('users.index') }}">
            <input class="form-control me-2" type="search" name="search" placeholder="Buscar ..."
                value="{{ request()->get('search') }}" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
    </div>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Primer Nombre</th>
                <th scope="col">Primer Apellido</th>
                <th scope="col">Correo Electronico</th>
                <th scope="col">Tipo de usuario</th>
                <th scope="col">Codigo</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>


            {{-- Ocupo el objeto y el indice --}}
            @forelse ($users as $user)
                <tr>
                    <th scope="row">{{ ($users->currentPage() - 1) * $users->perPage() + $loop->index + 1 }}</th>

                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin ? 'Administrador' : 'Empleado' }}</td>
                    <td>{{ $user->code }}</td>

                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <a href="{{ route('access.create', $user->id) }}" class="btn btn-warning btn-sm">Generar
                            registro</a>
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

    {{ $users->appends(['search' => request()->get('search')])->links('pagination::bootstrap-5') }}
</div>
