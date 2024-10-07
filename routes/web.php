<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\GestionDelSistema;

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


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   });

require __DIR__.'/auth.php';



