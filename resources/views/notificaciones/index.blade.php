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
        <div class="card-header  text-center">
            <h3><b>NOTIFICACIONES</b></h3>
        </div>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table" id="marcas">
                <thead class="thead-dark">
                    <tr>
                        <th thead-light class="text-center">ID </th>
                        <th thead-light class="text-center">MENSAJE</th>
                        {{-- @can('Modo Admin') --}}
                        <th thead-light class="text-center">ID_PRODUCTO</th>
                        {{-- @endcan --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($notificaciones as $notificacion)
                    <tr>
                        <td thead-light class="text-center">{{$notificacion->id}}</td>
                        <td thead-light class="text-center">{{$notificacion->mensaje}}</td>
                        <td thead-light class="text-center">{{$notificacion->id_producto}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>


@stop