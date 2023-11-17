@extends('layouts.app')

@include('layouts._partials.header_admin')

@section('title', 'Crear usuario')

@section('content')



    <div class="row mt-5 mx-md-5 ">
        <div class="col-md-6 border rounded mx-auto">
            <h1>Crear nuevo usuario</h1>

            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="inputFirstName" class="form-label">Primer Nombre</label>
                    <input type="text" class="form-control" id="inputFirstName" aria-describedby="emailHelp"
                        name="first_name">
                </div>

                <div class="mb-3">
                    <label for="inputLastName" class="form-label">Primer Apellido</label>
                    <input type="text" class="form-control" id="inputLastName" aria-describedby="emailHelp"
                        name="last_name">
                </div>

                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Correo Electronico</label>
                    <input type="text" class="form-control" id="inputEmail" aria-describedby="emailHelp"
                        name="email">
                </div>

                <div class="mb-3">
                    <label for="inputCode" class="form-label">Codigo</label>
                    <input type="text" class="form-control" id="inputCode" aria-describedby="emailHelp"
                        name="code">
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>

    </div>

@endsection
