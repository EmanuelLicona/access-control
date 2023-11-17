@extends('layouts.app')

@include('layouts._partials.header_admin')

@section('content')
    <div class="container">
        <h1>
            {{-- Hola {{ auth()->user()->name }} --}}
            Hola Nombre del usuario
        </h1>
    </div>

    <div class="container">
        <div class="d-flex justify-content-between">
            <h3>Lista de usuarios</h3>
            <a href="{{ route('users.create') }}" class="btn btn-primary">Crear usuario</a>
        </div>

        @include('users._partials.table')
    </div>
@endsection
