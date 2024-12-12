@extends('adminlte::page')

@section('title', 'Micro_Mercado')

@section('content_header')
    <h1>Registrar Inventario</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body shadow-lg">
        <form method="post" action="{{ route('inventarios.store') }}">
                @csrf {{-- token --}}
                
                <div>
                    <label for="id_almacen">Seleccione un Sucursal</label>
                    <select name="id_almacen" id="id_almacen" class="focus border-dark  form-control form-group col-md-3"
                       >
                        @foreach ($sucursales as $sucursal)
                        <option value="">Seleccionar Sucursal</option>
                            <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
                        @endforeach
                    </select>
                    @error('id_almacen')
                        <small>*{{ $message }}</small>
                        <br><br>
                    @enderror
                    <br>
                </div>
                {{-- separador --}}

                    <br>
                    <button class="btn btn-dark" type="submit">Registrar</button>
                    <a class="btn btn-danger" href="{{ route('inventarios.index') }}"><i class="fas fa-arrow-left"></i>
                        Volver</a>
                </div>
        </div>
    </div>
@stop
