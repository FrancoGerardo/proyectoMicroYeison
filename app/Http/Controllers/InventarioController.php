<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventario;
use App\Models\Almacenes;
use App\Models\Bitacora;
use App\Models\DetalleInventario;
use Pusher\Pusher;
use App\Models\Notificacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use JeroenNoten\LaravelAdminLte\View\Components\Widget\Alert;

class InventarioController extends Controller
{
    public function index()
    {
        $id_usuario = Auth::id();
        $bitacora = new Bitacora();
        $bitacora->registrarActividad("ACCEDIO", "INVETARIOS", 0);

        $inventarios = Inventario::all();
        return view('inventarios.index', compact('inventarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sucursales = Almacenes::all(); // Obtener todas las sucursales
        return view('inventarios.create', compact('sucursales')); // Retorna la vista con las sucursales para asociar a inventario
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            //'categoria_id' => 'required|exists:categorias,id', // Asegura que exista
            //'subcategoria_id' => 'required|exists:subcategorias,id', // Asegura que exista
            //'id_almacen' => 'required|exists:sucursales,id', // Asegura que exista
            //'cantidad' => 'required|integer', // Asegúrate que sea un número entero
        ]);

        $inventario = new Inventario();
        $inventario->id_almacen = $request->input('id_almacen');
        $inventario->cantidad_total = 0;
        $inventario->save();

      
        $bitacora = new Bitacora();
        $bitacora->registrarActividad("CREO", "INVENTARIO", $inventario->id);

        return redirect()->route('inventarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventario = Inventario::findOrFail($id); // Encuentra el inventario por su ID
        return view('inventarios.show', compact('inventario')); // Retorna la vista de detalle de inventario
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventario = Inventario::findOrFail($id); // Encuentra el inventario por su ID
        $sucursales = Almacenes::all(); // Obtiene todas las sucursales
        return view('inventarios.edit', compact('inventario', 'sucursales')); // Retorna la vista de edición de inventario
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inventario = Inventario::findOrFail($id); // Encuentra el inventario por su ID

        // Actualiza la cantidad
        $inventario->cantidad = $request->input('cantidad');

        // Guarda los cambios en la base de datos
        $inventario->save();

        // Verifica si la cantidad es menor o igual a 10 para invocar la función notify
        if ($inventario->cantidad <= 10) {
            $this->notify($inventario->producto_id); // Llama a la función notify y pasa el inventario como parámetro
        }

        return redirect()->route('inventarios.index'); // Redirige al listado de inventarios después de actualizar
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventario = Inventario::findOrFail($id); // Encuentra el inventario por su ID
        $inventario->delete(); // Elimina el inventario de la base de datos

        return redirect()->route('inventarios.index'); // Redirige al listado de inventarios después de eliminar
    }

    /**
     * Display a listing of the resource filtered by sucursal.
     *
     * @param  int  $sucursal_id
     * @return \Illuminate\Http\Response
     */
    public function sucursalInventario($sucursal_id)
    {
        $sucursal = Almacenes::findOrFail($sucursal_id); // Encuentra la sucursal por su ID
        $inventarios = Inventario::where('sucursal_id', $sucursal_id)->get(); // Filtra inventarios por sucursal
        return view('inventarios.sucursal', compact('sucursal', 'inventarios')); // Retorna la vista de inventarios filtrados por sucursal
    }



    public function notify($id_producto)
    {
        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data['message'] = 'Bajo Stock del Producto con ID:';
        $notificacion = new Notificacion();
        $notificacion->mensaje = 'Bajo Stock del Producto con ID:';
        $notificacion->id_producto = $id_producto;
        $notificacion->save();
        $pusher->trigger('notify-channel', 'App\Events\Notify', $data);
    }

    public function detalle($id){
        //$productos = DetalleInventario::where('id_inventario', 1)->get();
        $productos = DB::select('SELECT * FROM detalle_inventarios  WHERE id_inventario = ?', [$id]);
        //echo("hola mundo");
        return view('detalleInventarios.index', compact('productos'));
    }
}
