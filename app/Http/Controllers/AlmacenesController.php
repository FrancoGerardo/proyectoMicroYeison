<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacenes;

class AlmacenesController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');

    }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Mostrar el listado de almacenes (index)
    public function index()
    {
        // Obtener todos los almacenes
        $almacenes = Almacenes::all();

        // Retornar la vista index de almacenes con los datos
        return view('almacenes.index', compact('almacenes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Mostrar el formulario para crear un nuevo almacén (create)
    public function create()
    {
        // Retornar la vista para crear un almacén
        return view('almacenes.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Guardar un nuevo almacén en la base de datos (store)
    public function store(Request $request)
    {
        date_default_timezone_set("America/La_Paz");
        $request->validate([
            'nombre' => 'required|unique:almacenes',
            'ubicacion' => 'required|unique:almacenes'
        ]);

        $almacenes = new Almacenes();
        $almacenes->nombre = $request->input('nombre');
        $almacenes->ubicacion = $request->input('nombre');
        $almacenes->save();

        return redirect()->route('almacenes.index');
    }
           /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Mostrar el formulario para editar un almacén existente (edit)
    public function edit($id)
    {
        $almacenes = Almacenes::findOrFail($id);

        return view('almacenes.editar', compact('almacenes'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Actualizar un almacén en la base de datos (update)
    public function update(Request $request, $id)
    {
        // Validar los datos actualizados
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
        ]);
        $almacenes = Almacenes::findOrFail($id);

        $almacenes->nombre = $request->input('nombre');
        $almacenes->ubicacion = $request->input('ubicacion');
        $almacenes->save();
        return redirect()->route('almacenes.index');

    }

    // Eliminar un almacén de la base de datos (destroy)
    public function destroy($id)
    {
        $almacenes = Almacenes::findOrFail($id);
        $almacenes->delete();
        //bitacora
    
        return redirect()->route('almacenes.index');
    }
    
}
