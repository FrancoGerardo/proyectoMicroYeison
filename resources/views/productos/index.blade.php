@extends('adminlte::page')

@section('title', 'Micro_Mercado')

@section('content_header')

@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('style/font-awesome.min.css') }}">

@endsection

@section('js')
    <script src="<?php echo asset('js/imprimir.js'); ?>"></script>


    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#productos').DataTable({
            autoWidth: false
        });
    </script>


@endsection

@section('content')

    <br>
    <div class="card text-dark">
        <div class="card-header  text-center">
            <h3><b>PRODUCTOS</b></h3>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            {{-- @can('Modo Admin') --}}
            <a class="btn btn-dark" href="{{ route('productos.create') }}"><i class="fas fa-shoe-prints"></i> Registrar
                producto</a>

            {{-- Boton imprimir- --}}
            
            {{-- Imprimir-- --}}
            {{-- @endcan --}}
        </div>

        <div class="card-body table-responsive">
            <div id="printableArea">
                
                </div>

                <table class="table table-striped table-bordered shadow-lg mt-4" id="productos">
                    <thead>
                        <tr class="table-active">
                            <th scope="col">ID</th>
                            <th scope="col">CODIGO</th>
                            <th scope="col">DESCRIPCION</th>
                           
                            <th scope="col">FOTO</th>
                            {{-- <th scope="col">Descuento</th> --}}
                            <th scope="col">ACCIONES</th>
                           
                            
                            {{-- @can('Modo Admin') --}}
                           
                            {{-- @endcan --}}
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($producto as $productos) {{-- hereeeeee --}}

                            <tr>
                                <td>{{ $productos->id }}</td>
                                <td>{{ $productos->codigo }}</td>
                                <td>{{ $productos->descripcion }}</td>
                                {{-- <td>{{ $productos->color }}</td> --}}
                                

                               
                                
                               
                                {{--
                                @foreach ($inventario as $inventarios)
                                    @if ($productos->id_inventario == $inventarios->id)
                                        <td style="color: rgb(5, 5, 5);">{{ $inventarios->cant_disponible }}
                                        </td>
                                    @endif
                                @endforeach
                                --}}


                                

                          

                                <td><img src="{{ asset($productos->foto) }}" width="150" height="90" /></td>

                                {{-- @can('Modo Admin') --}}
                                {{-- <td>{{ $productos->foto }}</td> --}}
                                <td>
                                    <form action="{{ route('productos.destroy', $productos) }}" method="POST">
                                        <a class="btn btn-dark btn-sm" href="{{ route('productos.show', $productos) }}">
                                            <i class="fas fa-eye"></i> Ver</a>
                                        <div style="padding-top: 0.50rem"></div>
                                        <a class="btn btn-dark btn-sm" href="{{ route('productos.edit', $productos) }}">
                                            <i class="fas fa-edit"></i> Editar</a>
                                        @csrf
                                        @method('delete')

                                        <button style="margin-top: 0.50rem"
                                            onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" type="submit"
                                            value="Borrar" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>
                                            Eliminar</button>
                                    </form>

                                </td>
                                {{-- @endcan --}}
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @stop

    @section('js')



@endsection
