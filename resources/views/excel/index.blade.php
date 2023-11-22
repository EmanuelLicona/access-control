@extends('layouts.app')

@include('layouts._partials.header_admin')

@section('title', 'Exportaciones')

@section('content')

    <div class="container mt-5">
        <div class=" mb-4 ">

            <div class="container mt-5 p-3 border">
                <h4>Exportar Empleados</h4>

                <div class="mt-3">
                    <a href="{{ route('exports.employees') }}" class="btn btn-primary">Exportar</a>
                </div>
            </div>

            <div class="container mt-5 p-3 border">
                <h4>Exportar Registros de Accesos</h4>

                {{-- Errors --}}

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('exports.access') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="inputStartDate" class="form-label">Fecha inicio <span
                                    class="text-danger">*</span></label>
                            <input type="datetime-local" class="form-control" id="inputStartDate" name="start_date"
                                value="{{ old('start_date') ?? date('Y-m-d') . 'T00:00' }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="inputEndDate" class="form-label">Fecha fin <span
                                    class="text-danger">*</span></label>
                            <input type="datetime-local" class="form-control" id="inputEndDate" name="end_date"
                                value="{{ old('end_date') ?? now()->format('Y-m-d\TH:i') }}" required>
                        </div>

                        <div class="mb-3 mt-3">
                          <select class="form-select" aria-label="Default select example" name="type" required>
                              <option value="all"  @if (old('type') == 'all') selected @endif>Todos</option>
                              <option value="in" @if (old('type') == 'in') selected @endif >Entrada</option>
                              <option value="out" @if (old('type') == 'out') selected @endif >Salida</option>
                          </select>
                      </div>


                    </div>

                    <div class=" mt-3">
                        <button type="submit" class="btn btn-primary">Exportar</button>
                    </div>
                </form>

            </div>



        </div>
    </div>

@endsection
