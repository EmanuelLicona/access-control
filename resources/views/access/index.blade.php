@extends('layouts.app')

@section('title', 'Access Control')

@include('layouts._partials.header_admin')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h3>Lista de accesos registrados</h3>
        </div>

        @include('access._partials.table')
    </div>
@endsection
