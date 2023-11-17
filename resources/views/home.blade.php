@extends('layouts.app')

@include('layouts._partials.header_admin')

@section('title', 'Access Control')

@section('content')

    <div class="container text-center">
        <h1>Home</h1>
        <p>Hola {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
    </div>
@endsection
