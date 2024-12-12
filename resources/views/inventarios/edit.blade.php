@extends('adminlte::page')

@section('title', 'Micro_Mercado')

@section('content_header')
    <h1>Actualizar Inventario</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body shadow-lg">
            <form method="post" action="{{ route('inventarios.update', $inventario) }}">
                @csrf
                @method('PATCH')
                <div class="form-group col-md-3">
                    <h5>Categoria:</h5>
                    <input type="text" name="categoria" value="{{ $inventario->categoria->nombre }}"
                        class="focus border-dark  form-control" min="3" max="30" maxlength="30" size="0"
                        placeholder="Nombre" type="number" disabled>

                    <h5>Sub-Categoria:</h5>
                    <input type="text" name="sub-categoria" value="{{ $inventario->subcategoria->nombre }}"
                        class="focus border-dark  form-control" min="3" max="30" maxlength="30" size="0"
                        placeholder="Nombre" type="number" disabled>

                    <h5>Sucursal:</h5>
                    <input type="text" name="sucursal" value="{{ $inventario->sucursal->nombre }}"
                        class="focus border-dark  form-control" min="3" max="30" maxlength="30" size="0"
                        placeholder="Nombre" type="number" disabled>


                    <h5>Producto_ID:</h5>
                    <input type="text" name="producto" value="{{ $inventario->producto_id }}"
                        class="focus border-dark  form-control" min="3" max="30" maxlength="30" size="0"
                        placeholder="Nombre" type="number" disabled>


                    <h5>Cantidad:</h5>
                    <input type="text" name="cantidad" value="{{ $inventario->cantidad }}"
                        class="focus border-dark  form-control" min="0"  maxlength="30" size="0"
                        placeholder="Nombre" type="number" required>


                    <br>
                    <button type="submit" class="btn btn-dark"><i class="fas fa-pen-alt"></i> Guardar</button>
                    <a class="btn btn-danger" href="{{ route('inventarios.index') }}"><i class="fas fa-arrow-left"></i>
                        Volver</a>
                </div>
            </form>
        </div>
    </div>
@stop
