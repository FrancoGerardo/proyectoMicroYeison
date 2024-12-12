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
        <div class="card-header  text-center">
            <h3><b>BITÁCORA</b></h3>
        </div>
    </div>
    <div class="card">
       
        <div class="card-body table-responsive">
            <div id="printableArea">
                
                <table class="table table-striped table-bordered shadow-lg mt-4" id="bitacora" style="width:100%">
                    <thead>

                        <tr>

                            <th scope="col">ID + USUARIO </th>
                            <th scope="col">ACCIÓN</th>
                            <th scope="col">GESTION</th>
                            <th  scope="col">ID IMPLICADO</th>
                     
                            <th class="text-center" scope="col">IP</th>
                            <th class="text-center" scope="col">FECHA</th>
                            <th scope="col">HORA</th>
                        </tr>

                    </thead>

                    <tbody>
                        @foreach ($actividades as $actividad)
                            <tr>

                                <td>{{ $actividad->user->name }}</td>
                                <td>{{ $actividad->accion }}</td>
                                <td>{{ $actividad->gestion }}</td>
                                <td class="text-center">{{ $actividad->id_implicado }}</td>
                                <td class="text-center">{{ $actividad->ip_usuario }}</td>
                                {{-- @foreach ($user as $users)
                            
                            @endforeach --}}
                                <td class="text-center" >{{ $actividad->fecha }}</td>

                                <td>{{ $actividad->hora }}</td>
                            </tr>
                        @endforeach
                    </tbody>
            </div>
            </table>

        </div>
    </div>
@stop


@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#bitacora').DataTable({
            autoWidth: false
        });
    </script>
@endsection
