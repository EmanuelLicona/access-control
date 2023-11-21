@extends('layouts.app')

@include('layouts._partials.header_admin')

@section('title', 'Crear usuario')

@section('content')



    <div class="row mt-5 mx-md-5 ">
        <div class="col-md-6 border rounded mx-auto">
            <h1>Nuevo empleado</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="inputFirstName" class="form-label">Primer Nombre <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="inputFirstName" aria-describedby="emailHelp"
                        name="first_name"
                        value="{{ old('first_name') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="inputLastName" class="form-label">Primer Apellido <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="inputLastName" aria-describedby="emailHelp"
                        name="last_name"
                        value="{{ old('last_name') }}"
                        required>
                </div>


                <div class="mb-3">
                    <label for="inputCode" class="form-label">Codigo <span class="text-danger">*</span></label>
                    <input type="text" pattern="\d{4}" class="form-control" id="inputCode" aria-describedby="emailHelp" name="code"
                        maxlength="4"
                        value="{{ old('code') }}"
                        required
                    >
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
