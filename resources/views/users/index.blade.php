@extends('layouts.app')

@include('layouts._partials.header_admin')

@section('content')
 
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-4 ">
            <h1>Lista de empleados</h1>
            <a href="{{ route('users.create') }}" class="btn btn-primary my-auto">Nuevo</a>
        </div>

        @include('users._partials.table')
    </div>
@endsection
