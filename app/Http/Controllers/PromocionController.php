<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Carrito;
use App\Models\Descuento;
use App\Models\Deseo;
use App\Models\Inventario;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\talla;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;

class PromocionController extends Controller
{
    public function index()
    {
        $id_usuario = Auth::id();
        $bitacora = new Bitacora();
        $bitacora->registrarActividad("ACCEDIO", "PROMOCION", 0);


        $deseo = Deseo::all();
        $producto = Producto::all();
        //$user = User::all();
        $inventario = Inventario::all();
        $marca = Marca::all();
        $descuento = Descuento::all();
        $talla = talla::all();
        $carrito = Carrito::all();
        return view('promociones.index', compact('deseo','producto', 'inventario', 'marca', 'descuento', 'talla','carrito'));
    }
}
