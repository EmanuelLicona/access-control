@extends('layouts.app')

@include('layouts._partials.header_single_page')

@section('title', 'Login')

@section('content')
    <div class="row mt-5">
        <div class="col-md-6 mx-auto p-5 border rounded">
            <h1 class="text-center">Inicio de sesión</h1>
            {{-- Errores --}}
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('auth.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp"
                        value="admin@example.com" name="email">
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="inputPassword" value="password" name="password">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="inputRemember" name="remember">
                    <label class="form-check-label" for="inputRemember">Recuerdame</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
