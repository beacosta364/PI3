<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\GestionDelSistema;
use App\Http\Controllers\MovimientoProductoController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\PdfController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



/*con middleware auth protejo mis rutas*/
Route::middleware('auth')->group(function () {

    // Ruta para la página principal o home
    Route::get('/home', function () {
        return view('layouts.plantilla');
    });


    // Ruta para la gestión de inventarios
    Route::get('/gestioninventarios', [GestionDelSistema::class, 'index'])->name('gestioninventarios');


    Route::get('/productos/agotados', [ProductoController::class, 'agotados'])->name('productos.agotados');
   

    // Ruta para la gestión de usuarios (posiblemente agregarlos)
    Route::get('/gestionusuarios', [GestionDelSistema::class, 'agregar'])->name('gestionusuarios');

    // Ruta para el control de acceso
    Route::get('/controlacceso', [GestionDelSistema::class, 'acceso'])->name('controlacceso');

    // Ruta para la alarma
    Route::get('/alarma', [GestionDelSistema::class, 'alarma'])->name('alarma');
    
    // Ruta de tipo resource para la gestión de productos
    Route::resource('/productos', ProductoController::class);
    
    // Ruta de tipo resource para la gestión de categorías
    Route::resource('/categorias', CategoriaController::class);



    // // Ruta para almacenar el movimiento
    // Route::post('/movimientos', [MovimientoProductoController::class, 'store'])->name('movimientos.store');
    // Route::get('/movimientos/reportes', [MovimientoProductoController::class, 'index'])->name('movimientos.reportes');

    // // Si deseas tener un método create para un producto específico
    // Route::get('/movimientos/create/{producto_id}', [MovimientoProductoController::class, 'create'])->name('movimientos.create');

// Ruta para almacenar el movimiento
Route::post('/movimientos', [MovimientoProductoController::class, 'store'])->name('movimientos.store');

// Ruta para reportes de movimientos
Route::get('/movimientos/reportes', [MovimientoProductoController::class, 'index'])->name('movimientos.reportes');

// Ruta para crear un movimiento para un producto específico
Route::get('/movimientos/create/{producto_id}', [MovimientoProductoController::class, 'create'])->name('movimientos.create');

    Route::get('/configuracion/create', [ConfiguracionController::class, 'create'])->name('configuracion.create');
    Route::post('/configuracion', [ConfiguracionController::class, 'store'])->name('configuracion.store');
    Route::get('/configuracion/edit', [ConfiguracionController::class, 'edit'])->name('configuracion.edit');
    Route::put('/configuracion', [ConfiguracionController::class, 'update'])->name('configuracion.update');
    // Ruta para mostrar el índice 
    Route::get('/configuracion', [ConfiguracionController::class, 'index'])->name('configuracion.index');


    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('/configuracion/control', [ConfiguracionController::class, 'control'])->name('configuracion.control');////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //pdf
    Route::get('/pdfproducto', [PdfController::class, 'pdfProductos'])->name('pdfProductos');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   });

require __DIR__.'/auth.php';



