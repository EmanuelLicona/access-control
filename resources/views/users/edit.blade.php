@extends('layouts.app')

@include('layouts._partials.header_admin')

@section('title', 'Crear usuario')

@section('content')



    <div class="row mt-5 mx-md-5 ">
        <div class="col-md-6 border rounded mx-auto">
            <h1>Editar empleado</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="inputFirstName" class="form-label">Primer Nombre <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="inputFirstName" aria-describedby="emailHelp"
                        name="first_name" value="{{ $user->first_name }}" required>
                </div>

                <div class="mb-3">
                    <label for="inputLastName" class="form-label">Primer Apellido <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="inputLastName" aria-describedby="emailHelp"
                        name="last_name" value="{{ $user->last_name }}" required>
                </div>

                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Correo Electronico</label>
                    <input type="text" class="form-control" id="inputEmail" aria-describedby="emailHelp" name="email"
                      value="{{ $user->email }}">
                </div>

                <div class="mb-3">
                    <label for="inputDni" class="form-label">DNI</label>
                    <input type="text" class="form-control" id="inputDni" aria-describedby="emailHelp" name="dni"
                      value="{{ $user->dni }}">
                </div>

                <div class="mb-3">
                    <label for="inputPhone" class="form-label">Telefono</label>
                    <input type="text" class="form-control" id="inputPhone" aria-describedby="emailHelp" name="phone"
                      value="{{ $user->phone }}">
                </div>

                <div class="mb-3">
                    <label for="inputCode" class="form-label">Codigo <span class="text-danger">*</span></label>
                    <input type="text" pattern="\d{4}" class="form-control" id="inputCode" aria-describedby="emailHelp"
                         maxlength="4"
                         value="{{ $user->code }}"
                         disabled>
                    <small id="emailHelp" class="form-text text-muted">El codigo debe ser de 4 digitos.</small>
                </div>

                <div class="d-flex gap-1">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>

    </div>

@endsection


@section('scripts')
    <script>

    </script>
@endsection