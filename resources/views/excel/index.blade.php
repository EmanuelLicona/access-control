@extends('layouts.app')

@include('layouts._partials.header_admin')

@section('title', 'Exportaciones')

@section('content')

<div class="container mt-5">
  <div class=" mb-4 ">

    <div class="container mt-5 border">
        <h4>Exportar Empleados</h4>

        <div class="mt-3">
            <a href="{{ route('exports.employees') }}" class="btn btn-primary">Exportar</a>
        </div>
    </div>
  </div>
</div>

@endsection
