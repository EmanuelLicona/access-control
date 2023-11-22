@extends('layouts.app')

@include('layouts._partials.header_admin')

@section('title', 'Access Control')

@section('content')

    <div class="row mt-5 mx-md-5 ">
        <div class="col-md-6 border rounded mx-auto">
            <h3>Editar perfil del administrador</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update', $user->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="inputFirstName" class="form-label">Primer Nombre <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="inputFirstName" name="first_name"
                        value="{{ $user->first_name }}" required>
                </div>

                <div class="mb-3">
                    <label for="inputLastName" class="form-label">Primer Apellido <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="inputLastName" name="last_name"
                        value="{{ $user->last_name }}" required>
                </div>

                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Correo Electronico</label>
                    <input type="text" class="form-control" id="inputEmail" name="email" value="{{ $user->email }}">
                </div>

                <div class="mb-3">
                    <label for="inputDni" class="form-label">DNI</label>
                    <input type="text" class="form-control" id="inputDni" name="dni" value="{{ $user->dni }}">
                </div>

                <div class="mb-3">
                    <label for="inputPhone" class="form-label">Telefono</label>
                    <input type="text" class="form-control" id="inputPhone" name="phone" value="{{ $user->phone }}">
                </div>

                <div class="mb-3">
                    <label for="inputCode" class="form-label">Codigo <span class="text-danger">*</span></label>
                    <input type="text" pattern="\d{4}" class="form-control" id="inputCode" maxlength="4" name="code"
                        value="{{ $user->code }}">
                    <small id="emailHelp" class="form-text text-muted">El codigo debe ser de 4 digitos.</small>
                </div>

                <div class="d-flex gap-1">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Volver</a>
                </div>
            </form>
        </div>
    </div>




    <div class="row my-5 mx-md-5 ">
        <div class="col-md-6 border rounded mx-auto">
            <h3>Editar contraseña</h3>

            <form method="POST" action="{{ route('profile.password', $user->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Contraseña actual <span
                            class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="inputPassword" name="old_password"
                        value="{{ old('old_password') }}" required>
                </div>

                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Contraseña <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="inputPassword" name="password"
                        value="{{ old('password') }}" required>
                </div>

                <div class="mb-3">
                    <label for="inputPasswordConfirmation" class="form-label">Confirmar contraseña <span
                            class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="inputPasswordConfirmation" name="password_confirmation"
                        value="{{ old('password_confirmation') }}" required>
                </div>


                <div class="d-flex gap-1">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Volver</a>
                </div>
            </form>
        </div>
    </div>
@endsection
