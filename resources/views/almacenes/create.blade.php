@extends('adminlte::page')

@section('title', 'Micro_Mercado')

@section('content_header')
    <h1>Registrar almacén</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body shadow-lg">
            <form method="post" action="{{ route('almacenes.store') }}">
                @csrf
                <div class="form-group col-md-6">
                    <h5>Nombre del almacén:</h5>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                    @error('nombre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <h5>Ubicación:</h5>
                    <input type="text" name="ubicacion" class="form-control" placeholder="Ubicación" required>
                    @error('ubicacion')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <br>
                    <button class="btn btn-dark" type="submit">Registrar</button>
                    <a class="btn btn-danger" href="{{ route('almacenes.index') }}">Volver</a>
                </div>
            </form>
        </div>
    </div>
@stop