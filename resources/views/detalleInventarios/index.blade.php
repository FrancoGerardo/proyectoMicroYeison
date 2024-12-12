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
            <h3><b>DETALLE</b></h3>
        </div>
    </div>

    <div class="card">
        

        <div class="card-body table-responsive">
            <table class="table table-striped table-bordered shadow-lg mt-4" id="inventarios">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">INGRESO</th>
                        <th class="text-center">PRODUCTO</th>
                        <th class="text-center">CANTIDAD</th>
                        <th class="text-center">PRECIO</th>
                        <th class="text-center">ELABORACION</th>
                        <th class="text-center">CADUCIDAD</th>

                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td class="text-center">{{$producto->id}}</td>
                            <td>{{$producto->fecha_ingreso}}</td>
                            <td>{{$producto->id_producto}}</td>
                            <td>{{$producto->cantidad}}</td>
                            <td>{{$producto->precio}}</td>
                            <td>{{$producto->fecha_elaboracion}}</td>
                            <td>{{$producto->fecha_caducidad}}</td>
                        </tr>
                    @endforeach
                  
                </tbody>
            </table>
        </div>
    </div>

@stop