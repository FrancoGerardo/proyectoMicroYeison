@extends('adminlte::page')

@section('title', 'Micro_Mercado')

@section('content_header')

@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')

    <br>
    <div class="card text-dark">
        <div class="card-header text-center">
            <h3><b>ALMACENES</b></h3>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <a class="btn btn-dark" href="{{ route('almacenes.create') }}"><i class="fas fa-warehouse"></i> Registrar
                almacén</a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-bordered shadow-lg mt-4" id="almacenes">
                <thead>
                    <tr>
                        <th>
                            <center>Id</center>
                        </th>
                        <th>
                            <center>Nombre del almacén</center>
                        </th>
                        <th>
                            <center>Ubicación</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($almacenes as $almacen)
                        <tr>
                            <td>
                                <center>{{ $almacen->id }}</center>
                            </td>
                            <td>
                                <center>{{ $almacen->nombre }}</center>
                            </td>
                            <td>
                                <center>{{ $almacen->ubicacion }}</center>
                            </td>
                            <td>
                                <center>
                                    <form action="{{ route('almacenes.destroy', $almacen) }}" method="POST">
                                         
                                        <a class="btn btn-dark btn-sm" href="{{ route('almacenes.edit', $almacen) }}"><i
                                                class="fas fa-edit"></i> Editar</a>
                                        @csrf
                                        @method('delete')

                                        <button onclick="return confirm('¿ESTA SEGURO DE BORRAR?')" type="submit"
                                            value="Borrar" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>
                                            Eliminar</button>
                                    </form>
                                </center>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#almacenes').DataTable({
            autoWidth: false
        });
    </script>
@endsection