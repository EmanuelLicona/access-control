<div class="table-responsive">

    {{-- Buscador --}}
    <div class="d-flex justify-content-between">
        <form class="d-flex" role="search" method="GET" action="{{ route('access.index') }}">
            <input class="form-control me-2" type="search" name="search" placeholder="Buscar ..." value="{{ request()->get('search') }}" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Primer Nombre</th>
                <th scope="col">Primer Apellido</th>
                <th scope="col">Tipo</th>
                <th scope="col">Codigo</th>
                <th scope="col">Fecha</th>
            </tr>
        </thead>
        <tbody>


            @forelse ( $access as $item )
                <tr>
                    <th scope="row">{{ ($access->currentPage() - 1) * $access->perPage() + $loop->index + 1 }}</th>
                    <td>{{ $item->user->first_name }}</td>
                    <td>{{ $item->user->last_name }}</td>
                    <td>
                        @if ($item->type == 'in')
                            <span class="badge bg-success">Entrada</span>
                        @else
                            <span class="badge bg-danger">Salida</span>
                        @endif
                    </td>
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

    {{-- Pagination --}}
    {{-- {{ $access->links('pagination::bootstrap-5') }} --}}

    {{ $access->appends(['search' => request()->get('search')])->links('pagination::bootstrap-5') }}
</div>
