@extends('adminlte::page')

@section('title', 'Micro_Mercado')

@section('content_header')
    <h1>Editar almacén</h1>
@stop

@section('content')
    <form method="post" action="{{ route('almacenes.update', $almacenes) }}">
        @csrf
        @method('PATCH')
        <div class="form-group col-md-6">
            <h5>Nombre del almacén:</h5>
            <input type="text" name="nombre" value="{{ $almacenes->nombre }}" class="form-control" required>
            @error('nombre')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <h5>Ubicación:</h5>
            <input type="text" name="ubicacion" value="{{ $almacenes->ubicacion }}" class="form-control" required>
            @error('ubicacion')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <br>
            <button type="submit" class="btn btn-dark">Guardar</button>
            <a class="btn btn-danger" href="{{ route('almacenes.index') }}">Volver</a>
        </div>
    </form>
@stop