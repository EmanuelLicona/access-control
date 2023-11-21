@extends('layouts.app')

@include('layouts._partials.header_admin')

@section('title', 'Crear usuario')

@section('content')


    <div class="row mt-5 mx-md-3 ">
        <div class="col-md-6 border rounded mx-auto">
            <h1>Nuevo registro de acceso</h1>

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
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="inputFirstName" class="form-label">Primer Nombre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="inputFirstName" aria-describedby="emailHelp"
                            value="{{ $user->first_name }}" name="first_name" disabled required>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="inputLastName" class="form-label">Primer Apellido <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="inputLastName" aria-describedby="emailHelp"
                            value="{{ $user->last_name }}" name="last_name" disabled required>
                    </div>


                </div>

                <div class="mb-3">
                    <label for="inputCode" class="form-label">Codigo <span class="text-danger">*</span></label>
                    <input type="text" pattern="\d{4}" class="form-control" id="inputCode" aria-describedby="emailHelp"
                        name="code" maxlength="4" value="{{ $user->code }}" disabled required>
                </div>
                
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Tipo de registro</option>
                        <option value="a">Entrada</option>
                        <option value="b">Salida</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="inputDate" class="form-label">Fecha <span class="text-danger">*</span></label>
                    <input type="datetime-local"  class="form-control" id="inputDate" aria-describedby="emailHelp"
                        name="date" required>
                </div>
                
                <div class="d-flex gap-1">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>

    </div>
@endsection
