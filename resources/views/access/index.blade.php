@extends('layouts.app')

@section('title', 'Access Control')

@include('layouts._partials.header_admin')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-4 ">
            <h1>Lista de registros de acceso</h1>
            {{-- <a href="{{ route('access.create') }}" class="btn btn-primary my-auto">Nuevo</a> --}}
        </div>

        @include('access._partials.table')
    </div>
@endsection
