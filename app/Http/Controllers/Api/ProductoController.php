<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Bicicleta;
use App\Models\Producto;
use App\Models\Imagen;
use App\Models\User;
use App\Models\Detallesproducto;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use function GuzzleHttp\Promise\all;

class ProductoController extends Controller
{
    public function index(Request $request,  Detallesproducto $detallesproducto, Imagen $imagen, Producto $producto){
        $productos=Producto::all();

    return $productos;

    }
    public function create(Detallesproducto $detallesproducto, Imagen $imagen){
        $producto = new Producto();
        return view('productos.create');
    }
    public function store(Request $request, Producto $producto, Detallesproducto $detallesproducto, Imagen $imagen){
        $producto= new  Producto();
        $producto->talla=$request->talla;
        $producto->comprobante = $request->comprobante;
        $producto->cantidad=$request->cantidad;
        $producto->precio=$request->precio;
       $producto->user_id = $request->user_id;
       $producto->estado_id = $request->estado_id;
       $producto->tipo_id = $request->tipo_id;
        $producto->save();
        return $producto;
    }

    public function destroy(Producto $producto, Detallesproducto $detallesproducto,  Bicicleta $bicicleta )
    {
       
      /*   $imagen=Imagen::find($producto->imagen->id)->delete(); 
        $detallesproducto=Detallesproducto::find($producto->detallesproducto->id)->delete();  */
        $producto->delete();
       
       return 'producto eliminado';
    }
    
    public function show($producto)
    {
        $users=User::All();
         $productos=Producto::All();

$detallesproducto=Detallesproducto::All();

       
    foreach ($productos as $producto){
        $detallesproducto= Detallesproducto::find($producto->detallesproducto->id);
        return $producto;
        }

    foreach ($productos as $producto){
        $imagen= Imagen::find($producto->imagen->id);
        return $producto;
        }      
    }

    public function edit(Request $request,Producto $producto, Detallesproducto $detallesproducto, Imagen $imagen)
    { 
        return view ('productos.edit', compact('producto','detallesproducto','imagen'));
    }
    
    public function update(Request $request,Producto $producto, Detallesproducto $detallesproducto, Imagen $imagen)
    { 
        $producto= Producto::find($producto->id);
        $producto->talla=$request->talla;
        $producto->comprobante=$request->comprobante;
        $producto->cantidad=$request->cantidad;
        $producto->precio=$request->precio;
        $producto->user_id = $request->user_id;
        $producto->estado_id = $request->estado_id;
        $producto->tipo_id = $request->tipo_id;
        $producto->save();

       return $producto;
    }

    public function detalles(Request $request,Producto $producto, Detallesproducto $detallesproducto, Imagen $imagen)

    { 
        $producto->detallesproducto->name;
        return view ('productos.detalles', compact('producto','detallesproducto','imagen'));
    }
   
    public function in(Producto $producto)
    { 
        return view ('livewire.admin.productos-index');
    }

    public function indexlista(Detallesproducto $detallesproductos, Imagen $imagen, Producto $producto){
     
        $productos=Producto::All();
        $productos = Producto::paginate(3);
        $imagens = Imagen::all()->where('imageable_type', 'App\Models\Producto');

        return view ('productos.listaProducto', compact('productos','detallesproductos','imagens'));
    
    }

    public function detallescompra(Request $request,Producto $producto, Detallesproducto $detallesproducto, Imagen $imagen)

    { 
        $producto->detallesproducto->name;
        return view ('productos.detallescompra', compact('producto','detallesproducto','imagen'));
    }
   
}
