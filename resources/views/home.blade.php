@extends('layouts.app')

@include('layouts._partials.header_admin')

@section('title', 'Access Control')

@section('content')

    <div class="container mt-5">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">AccessTrace Manager</h1>
                <p class="col-md-8 fs-4">
                    Hola, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}.
                </p>
                <a class="btn btn-primary btn-lg" href="{{ route('auth.destroy') }}" role="button">Cerrar sesión</a>
            </div>
        </div>
    </div>
@endsection
