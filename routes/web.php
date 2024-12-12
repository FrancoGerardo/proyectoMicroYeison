<?php

use App\Http\Controllers\AgregaradministradoreController;
use App\Http\Controllers\AgregarvendedoreController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\DescuentoController;
use App\Http\Controllers\DeseoController;
use App\Http\Controllers\DetalleproductoController;
use App\Http\Controllers\DetalleventaController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\GestionaradministradoreController;
use App\Http\Controllers\GestionarclienteController;
use App\Http\Controllers\GestionarvendedoreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\NotaventaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TallaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubCategoriaController;
use App\Http\Controllers\NotificacionController;
use App\Models\Deseo;
use App\Models\SubCategoria;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AlmacenesController;
use App\Http\Controllers\NotaCompraController;
use App\Http\Controllers\NotaVentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProveedoresController;
use App\Models\Proveedor;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    $deseo = Deseo::all();
    //return view('welcome', compact('deseo')); //RETORNA LA VISTA WELCOME
    return view('auth.login');
});

Auth::routes();
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('auth/facebook', [SocialController::class, 'redirectFacebook']);
Route::get('auth/facebook/callback', [SocialController::class, 'callbackFacebook']);

Route::get('/quienesSomos', [HomeController::class, 'quienesSomos'])->name('quienesSomos');

/*HomeController::class = BUSCA EL METODO INVOKE CASO CONTRARIO ESPECIFICAR EL METODO */
/*[HomeController::class, 'index'] = class HomeController  metodo index  */
Route::get('/home', [HomeController::class, 'index'])->name('home');/*PANTALLA INICIO  */
Route::get('/inicio', [HomeController::class, 'create'])->name('inicio');/*PANTALLA INICIO  */


Route::resource('tallas', TallaController::class)->names('tallas'); /*CON ESTO SE VE LAS TALLAS EN PANTALLA */
/*cuando llamamos al metodo names indicamos que queremos darle otro nombre a nuestra ruta (opcional) */

Route::resource('marcas', MarcaController::class)->names('marcas');

Route::resource('descuentos', DescuentoController::class)->names('descuentos');

Route::resource('inventarios', InventarioController::class)->names('inventarios');

Route::resource('productos', ProductoController::class)->names('productos');

Route::resource('users', UserController::class)->names('users');

Route::resource('notaventas', NotaventaController::class)->names('notaventas');

Route::resource('detalleventas', DetalleventaController::class)->names('detalleventas');

Route::resource('bitacora', BitacoraController::class)->names('bitacora');

Route::resource('roles', RoleController::class)->names('roles');

Route::resource('facturas', FacturaController::class)->names('facturas');

Route::resource('ventas', VentaController::class)->names('ventas');
Route::resource('reportes', ReporteController::class)->names('reportes');
// RUTAS DE LA VISTA USUARIO WELCOME - INTERFAZ

Route::resource('deseos', DeseoController::class)->names('deseos');
///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////


//deseo nombre en la llamada seguido del .accion eg: deseo.index
//en el controller tenemos en la funcion index la ruta deseos.index 
//la cual hace referencia a la carpeta en la vista 
//llama a carpeta deseos y al index.blade (deseos.index.blade.php)
Route::resource('categorias', CategoriaController::class)->names('categorias');
Route::resource('subcategorias', SubCategoriaController::class)->names('subcategorias');

Route::resource('notificaciones', NotificacionController::class)->names('notificaciones');

Route::resource('almacenes', AlmacenesController::class)->names('almacenes');

//CON ESTA LINEA DE ABAJO HACEMOS LLAMADO A LA FUNCION "DETALLE "
//EN EL CONTROLADOR INVENTARIO CON LA RUTA DEFINIDA 'inventario/{id}/detalle'
//EL NAME ES EL NOMBRE QUE SE PUEDE USAR PARA LLAMAR LA RUTA
Route::get('inventario/{id}/detalle', [InventarioController::class, 'detalle'])->name('inventario.detalle');

Route::resource('notaventas', NotaVentController::class)->names('notaventas');
Route::resource('notacompra', NotaCompraController::class)->names('notacompra');
Route::resource('proveedores', ProveedoresController::class)->names('proveedores');

Route::get('notify', [NotificationController::class, 'notify']);
Route::view('/notification', 'notification');

///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////
/*
Route::resource('compras', VentaController::class)->names('compras');

Route::resource('promocion', PromocionController::class)->names('promocion');

Route::resource('contactos', ContactoController::class)->names('contactos');

Route::resource('catalogos', CatalogoController::class)->names('catalogos');

Route::resource('carritos', CarritoController::class)->names('carritos');

Route::resource('mensajes', MensajeController::class)->names('mensajes');
*/

Route::resource('detalleproductos', DetalleproductoController::class)->names('detalleproductos');

//Route::resource('perfil', UserController::class)->names('perfil');
Route::get('perfil', [UserController::class, 'indexPerfil'])->name('perfil.index');/*PANTALLA INICIO  */