<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\Api\V1\SessionsController;
use App\Http\Controllers\Api\V1\AdminController;
use App\Http\Controllers\Api\V1\PrincipalController;
use App\Http\Controllers\Api\V1\ProductoController;
use App\Http\Controllers\Api\V1\DetallesproductoController;
use App\Http\Controllers\Api\V1\BicicletaController;
use App\Http\Controllers\Api\V1\PosteoController;
use App\Http\Controllers\Api\V1\ImagenController;
use App\Http\Controllers\Api\V1\EstadoController;
use App\Http\Controllers\Api\V1\TipoController;
use App\Http\Controllers\Api\V1\CategoriaController;
=======
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Api\SessionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\Api\ProductoController;
use App\Http\Controllers\Api\DetallesproductoController;
use App\Http\Controllers\Api\BicicletaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Api\PosteoController;
use App\Http\Controllers\Api\ImagenController;
use App\Http\Controllers\Api\EstadoController;
use App\Http\Controllers\Api\TipoController;
use App\Http\Controllers\Api\CategoriaController;
>>>>>>> 27c5d8c15821d2e07e07c5d699790cb6420d8818


use App\Http\Controllers\SearchController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('hola', function () {
    return 'hola';
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', function () {
    return view('home');
})->middleware('auth');



Route::get('productos',[ProductoController::class,'index'])->name('productos.index');
Route::post('productos', [ProductoController::class,'store'])->name('productos.store');
Route::get('productos/create',[ProductoController::class,'create'])->name('productos.create');
Route::delete('productos/{producto}',[ProductoController::class,'destroy'])->name('productos.destroy');
Route::get('productos/{producto}',[ProductoController::class,'show'])->name('productos.show');
Route::get('productos/{producto}/edit',[ProductoController::class,'edit'])->name('productos.edit');
Route::put('productos/{producto}',[ProductoController::class,'update'])->name('productos.update');
Route::get('productos/{producto}/detalles/',[ProductoController::class,'detalles'])->name('productos.detalles');
Route::get('productos/{producto}/detallescompra/',[ProductoController::class,'detallescompra'])->name('productos.detallescompra');

Route::get('prod',[ProductoController::class,'in'])->name('livewire.admin.productos-index');

Route::get('productoss',[DetallesproductoController::class,'index'])->name('api.detallesproductos.index');
Route::post('productoss', [DetallesproductoController::class,'store'])->name('detallesproductos.store')->middleware('auth');
Route::get('productoss/create',[DetallesproductoController::class,'create'])->name('detallesproductos.create')->middleware('auth');
Route::delete('productoss/{detallesproducto}',[DetallesproductoController::class,'destroy'])->name('detallesproductos.destroy')->middleware('auth');
Route::get('productoss/{detallesproducto}',[DetallesproductoController::class,'show'])->name('detallesproductos.show')->middleware('auth');
Route::get('productoss/{detallesproducto}/edit',[DetallesproductoController::class,'edit'])->name('detallesproductos.edit')->middleware('auth');
Route::put('productoss/{detallesproducto}',[DetallesproductoController::class,'update'])->name('detallesproductos.update')->middleware('auth');
Route::get('productoss/{detallesproducto}/detalles',[DetallesproductoController::class,'detalles'])->name('detallesproductos.detalles')->middleware('auth');

Route::apiResource('v1/bicicletas', \App\Http\Controllers\Api\V1\BicicletaController::class)->names('api.bicicletas');

Route::apiResource('categorias', \App\Http\Controllers\Api\V1\CategoriaController::class)->names('api.categorias');

<<<<<<< HEAD
Route::apiResource('posteos', \App\Http\Controllers\Api\V1\PosteoController::class);
=======
Route::apiResource('categorias', \App\Http\Controllers\Api\CategoriaController::class)->names('api.categorias');

Route::apiResource('posteos', \App\Http\Controllers\Api\PosteoController::class);
>>>>>>> 27c5d8c15821d2e07e07c5d699790cb6420d8818
/* Route::get('posteos/{posteo}/d/',[PosteoController::class,'publicados'])->name('posteos.publicados');
 */
Route::get('publicaciones',[PosteoController::class,'publicados'])->name('posteos.publicados')->middleware('auth');


<<<<<<< HEAD
Route::resource('imagenes', \App\Http\Controllers\Api\V1\ImagenController::class); 
=======
Route::resource('imagenes', \App\Http\Controllers\Api\ImagenController::class); 
>>>>>>> 27c5d8c15821d2e07e07c5d699790cb6420d8818
Route::get('imagenes',[ImagenController::class,'index'])->name('imagens.index');
Route::get('imagenes/create',[ImagenController::class,'create'])->name('imagens.create');
Route::post('imagenes', [ImagenController::class,'store'])->name('imagens.store');
Route::post('imagenes/{imagen}', [ImagenController::class,'show'])->name('imagens.show');
Route::delete('imagenes/{imagen}', [ImagenController::class,'destroy'])->name('imagens.destroy');
Route::get('imagenes/{imagen}/edit', [ImagenController::class,'edit'])->name('imagens.edit');
Route::put('imagenes/{imagen}', [ImagenController::class,'update'])->name('imagens.update');

Route::get('listaproductos',[ProductoController::class,'indexlista'])->name('productos.listaproducto')->middleware('auth');

Route::get('reportes',[BicicletaController::class,'reporte'])->name('bicicleta.reporte')->middleware('auth');

Route::get('reportes/{bicicleta}', [BicicletaController::class,'reportedetalles'])->name('bicicleta.reportedetalle')->middleware('auth');

<<<<<<< HEAD
Route::apiResource('estados', \App\Http\Controllers\Api\V1\EstadoController::class)->names('api.estados');
Route::apiResource('tipos', \App\Http\Controllers\Api\V1\TipoController::class)->names('api.tipos');
=======

Route::get('/form', [ControllerMail::class, 'index']);
// ruta al enviar correo
Route::post('/send',  [ControllerMail::class, 'send']);



Route::apiResource('estados', \App\Http\Controllers\Api\EstadoController::class)->names('api.estados');
Route::apiResource('tipos', \App\Http\Controllers\Api\TipoController::class)->names('api.tipos');
>>>>>>> 27c5d8c15821d2e07e07c5d699790cb6420d8818


Route::post('pppp', [PosteoController::class,'guardar'])->name('posteos.guardar')->middleware('auth');


Route::get('preview/{posteo}/previewpost', [PosteoController::class,'previewpost'])->name('posteos.previewpost')->middleware('auth');

Route::put('posteos/{posteo}', [PosteoController::class,'update'])->name('posteos.update')->middleware('auth');

