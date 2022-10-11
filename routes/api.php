<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\Api\DetallesproductoController;
use App\Http\Controllers\Api\BicicletaController;
use App\Http\Controllers\PostController;
/* use App\Http\Controllers\CategoriaController;
 */use App\Http\Controllers\PosteoController;
use App\Http\Controllers\ImagenController;
use GuzzleHttp\Promise\Create;
use App\Http\Controllers\CartController;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ControllerMail;
use App\Http\Controllers\Api\EstadoController;
use App\Http\Controllers\Api\TipoController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Api\CategoriaController;


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

Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register.index');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

Route::get('/login', [SessionsController::class, 'create'])
    ->middleware('guest')
    ->name('login.index');

Route::post('/login', [SessionsController::class, 'store'])
    ->name('login.store');

Route::post('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('login2.destroy');

Route::get('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');

Route::get('home/',[PrincipalController::class,'detalles'])->name('principal')/* ->middleware('auth') */;
Route::get('cuenta/',[PrincipalController::class,'cuentadetalles'])->name('cuenta');

Route::get('soon',[PrincipalController::class,'soon'])->name('soonaction');

/* Route::get('loginadmin/',[PrincipalController::class,'loginadmin'])->name('logina'); */
/* Route::get('loginadmin/',[PrincipalController::class,'create2'])->name('logina'); */

Route::get('/loginadmin', [SessionsController::class, 'create2'])
   /*  ->middleware('guest') */
    ->name('login2.index');

Route::post('/loginadmin', [SessionsController::class, 'store2'])
    ->name('login2.store2');

/*  Route::post('/logoutadmin', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('login2.destroy');  */

/* Route::get('p',[RegisterController::class, 'edit'])
    ->name('productos.edit'); */

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

Route::get('/register/{user}/edit', [RegisterController::class, 'edit'])
    ->name('register.edit');
    
Route::put('/register/{user}', [RegisterController::class, 'update'])
    ->name('register.update');


Route::get('registeri', [RegisterController::class, 'indexi'])
    ->name('register.indexi');  

 Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth.admin')
    ->name('admin.index');

Route::get('productos',[ProductoController::class,'index'])->name('productos.index')->middleware('auth');
Route::post('productos', [ProductoController::class,'store'])->name('productos.store')->middleware('auth');
Route::get('productos/create',[ProductoController::class,'create'])->name('productos.create')->middleware('auth');
Route::delete('productos/{producto}',[ProductoController::class,'destroy'])->name('productos.destroy')->middleware('auth');
Route::get('productos/{producto}',[ProductoController::class,'show'])->name('productos.show')->middleware('auth');
Route::get('productos/{producto}/edit',[ProductoController::class,'edit'])->name('productos.edit')->middleware('auth');
Route::put('productos/{producto}',[ProductoController::class,'update'])->name('productos.update')->middleware('auth');
Route::get('productos/{producto}/detalles/',[ProductoController::class,'detalles'])->name('productos.detalles')->middleware('auth');
Route::get('productos/{producto}/detallescompra/',[ProductoController::class,'detallescompra'])->name('productos.detallescompra')->middleware('auth');

Route::resource('profiles', \App\Http\Controllers\ProfileController::class)->middleware('auth');

/* Route::resource('profiles', \App\Http\Controllers\ProfileController::class);
 */
Route::get('prod',[ProductoController::class,'in'])->name('livewire.admin.productos-index');

Route::get('productoss',[DetallesproductoController::class,'index'])->name('api.detallesproductos.index');
Route::post('productoss', [DetallesproductoController::class,'store'])->name('detallesproductos.store')->middleware('auth');
Route::get('productoss/create',[DetallesproductoController::class,'create'])->name('detallesproductos.create')->middleware('auth');
Route::delete('productoss/{detallesproducto}',[DetallesproductoController::class,'destroy'])->name('detallesproductos.destroy')->middleware('auth');
Route::get('productoss/{detallesproducto}',[DetallesproductoController::class,'show'])->name('detallesproductos.show')->middleware('auth');
Route::get('productoss/{detallesproducto}/edit',[DetallesproductoController::class,'edit'])->name('detallesproductos.edit')->middleware('auth');
Route::put('productoss/{detallesproducto}',[DetallesproductoController::class,'update'])->name('detallesproductos.update')->middleware('auth');
Route::get('productoss/{detallesproducto}/detalles',[DetallesproductoController::class,'detalles'])->name('detallesproductos.detalles')->middleware('auth');

Route::apiResource('bicicletas', \App\Http\Controllers\Api\BicicletaController::class)->names('api.bicicletas');

Route::resource('posts', \App\Http\Controllers\PostController::class)->middleware('auth');

Route::apiResource('categorias', \App\Http\Controllers\Api\CategoriaController::class)->names('api.categorias');

Route::resource('posteos', \App\Http\Controllers\PosteoController::class)->middleware('auth');
/* Route::get('posteos/{posteo}/d/',[PosteoController::class,'publicados'])->name('posteos.publicados');
 */
Route::get('publicaciones',[PosteoController::class,'publicados'])->name('posteos.publicados')->middleware('auth');


Route::resource('imagenes', \App\Http\Controllers\ImagenController::class)->middleware('auth'); 
Route::get('imagenes',[ImagenController::class,'index'])->name('imagens.index')->middleware('auth');
Route::get('imagenes/create',[ImagenController::class,'create'])->name('imagens.create')->middleware('auth');
Route::post('imagenes', [ImagenController::class,'store'])->name('imagens.store')->middleware('auth');
Route::post('imagenes/{imagen}', [ImagenController::class,'show'])->name('imagens.show')->middleware('auth');
Route::delete('imagenes/{imagen}', [ImagenController::class,'destroy'])->name('imagens.destroy')->middleware('auth');
Route::get('imagenes/{imagen}/edit', [ImagenController::class,'edit'])->name('imagens.edit')->middleware('auth');
Route::put('imagenes/{imagen}', [ImagenController::class,'update'])->name('imagens.update')->middleware('auth');

Route::get('listaproductos',[ProductoController::class,'indexlista'])->name('productos.listaproducto')->middleware('auth');

Route::get('reportes',[BicicletaController::class,'reporte'])->name('bicicleta.reporte')->middleware('auth');

Route::get('reportes/{bicicleta}', [BicicletaController::class,'reportedetalles'])->name('bicicleta.reportedetalle')->middleware('auth');

Route::get('/shop', [CartController::class, 'shop'])->name('shop');
Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/add', [CartController::class, 'add'])->name('cart.store');
Route::post('/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');


/* Route::get('contactanos', function() {
    $correo = new ContactanosMailable;
    Mail::to('jelubo@misena.edu.co')->send($correo);
    return "Mensaje enviado";
}); */

Route::get('/form', [ControllerMail::class, 'index']);
// ruta al enviar correo
Route::post('/send',  [ControllerMail::class, 'send']);

Route::apiResource('estados', \App\Http\Controllers\Api\EstadoController::class)->names('api.estados');

Route::resource('tipos', \App\Http\Controllers\Api\TipoController::class)->names('api.tipos');
 

Route::get('pdff/',[ProductoController::class,'pdff'])->name('productos.pdf');

Route::get('excel/',[ProductoController::class,'excel'])->name('productos.excel');


Route::post('likepost/{$id}',[PosteoController::class,'likePost'])->name('posteos.pos');
Route::post('dislikepost/{$id}',[PosteoController::class,'unlikePost'])->name('posteos.pos');


Route::resource('comentarios', \App\Http\Controllers\CommentController::class)->middleware('auth');
Route::get('comentarios',[CommentController::class,'index'])->name('comments.index')->middleware('auth');
Route::get('comentarios/create',[CommentController::class,'create'])->name('comments.create')->middleware('auth');
Route::post('comentarios', [CommentController::class,'store'])->name('comments.store')->middleware('auth');
Route::post('comentarios/{comentario}', [CommentController::class,'show'])->name('comments.show')->middleware('auth');
Route::delete('comentarios/{comentario}', [CommentController::class,'destroy'])->name('comments.destroy')->middleware('auth');
Route::get('comentarios/{comentario}/edit', [CommentController::class,'edit'])->name('comments.edit')->middleware('auth');
Route::put('comentarios/{comentario}', [CommentController::class,'update'])->name('comments.update')->middleware('auth');


Route::post('os', [CommentController::class,'guardar'])->name('comments.guardar')->middleware('auth');
Route::post('pppp', [PosteoController::class,'guardar'])->name('posteos.guardar')->middleware('auth');


Route::get('preview/{posteo}/previewpost', [PosteoController::class,'previewpost'])->name('posteos.previewpost')->middleware('auth');

Route::put('posteos/{posteo}', [PosteoController::class,'update'])->name('posteos.update')->middleware('auth');

Route::get('buscadorr', function () {
    return view('windows');
});

Route::post('myurl', [SearchController::class, 'show']);




Route::get('pruebapagina',[SearchController::class, 'indexx']);

Route::get('pruebapagina/buscador',[SearchController::class, 'buscador']);

Route::get('pruebapagina/paginacion',[SearchController::class, 'paginacion']);


Route::get('recuperarcontraseña',[PrincipalController::class,'recuperarcontraseña'])->name('recuperarcontraseña');
Route::get('email',[PrincipalController::class,'email'])->name('email');

Route::get('reset',[PrincipalController::class,'reset'])->name('reset');