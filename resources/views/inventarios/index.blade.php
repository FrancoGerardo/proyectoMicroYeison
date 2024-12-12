@extends('adminlte::page')

@section('title', 'Micro_Mercado')

@section('content_header')
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('style/font-awesome.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('js/imprimir.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#inventarios').DataTable({
            autoWidth: false
        });
    </script>
@endsection

@section('content')

    <br>
    <div class="card text-dark">
        <div class="card-header text-center">
            <h3><b>INVENTARIO</b></h3>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <a class="btn btn-dark" href="{{ route('inventarios.create') }}">
                <i class="fas fa-shoe-prints"></i> Registrar Inventario
            </a>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-striped table-bordered shadow-lg mt-4" id="inventarios">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Sucursal</th>
                        <th class="text-center">Cantidad Disponible</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inventarios as $inventario)
                        <tr>
                            <td class="text-center">{{ $inventario->id }}</td>
                            <td class="text-center">{{ $inventario->almacen->nombre }}</td>
                            <td class="text-center">{{ $inventario->cantidad_total }}</td> 

                            <td class="text-center">
                                <form action="{{ route('inventarios.destroy', $inventario) }}" method="POST">
                                    @csrf
                                    <a class="btn btn-dark btn-sm" href= "{{ route('inventario.detalle', $inventario->id) }}" >
                                        <i class="fas fa-eye"></i> Ver
                                    </a>
                                    
                                    <a class="btn btn-dark btn-sm" href="{{ route('inventarios.edit', $inventario) }}">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>

                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('¿ESTA SEGURO DE BORRAR?')" type="submit"
                                        value="Borrar" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop
