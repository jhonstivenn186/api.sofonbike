<?php

namespace App\Http\Controllers;

use App\Bicicleta;
use App\Models\Producto;
use App\Models\Imagen;
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
        $detallesproductos=Detallesproducto::all();   
        $detallesproductos = Detallesproducto::all()->where('imageable_type', 'App\Models\Producto');
        $producto=Producto::where('user_id', auth()->user()->id);
        Detallesproducto::with('productos')->orderBy('id', 'DESC')->where('user_id', auth()->user()->id);
        $productos = Producto::paginate(3);
        $imagens = Imagen::all()->where('imageable_type', 'App\Models\Producto');

    return view ('productos.listarProducto', compact('productos','detallesproductos','imagens'))
    ->with('i', (request()->input('page', 1) - 1) * $productos->perPage(3));

    }
    public function create(Detallesproducto $detallesproducto, Imagen $imagen){
        $producto = new Producto();
        return view('productos.create');
    }
    public function store(Request $request, Producto $producto, Detallesproducto $detallesproducto, Imagen $imagen){
        $producto= new  Producto();
        $producto->talla=$request->talla;
        if($request->hasfile("comprobante")){
            $file=$request->file("comprobante");
            $destinationPath= 'pdf/archivos/';
            $filename=time().'-'.$file->getClientOriginalName();
            $uploadSuccess=$request->file('comprobante')->move($destinationPath, $filename);
            $producto->comprobante = $filename;
        } 
        $producto->cantidad=$request->cantidad;
        $producto->precio=$request->precio;
        $producto->user_id = auth()->user()->id;
        $producto->save();

        $detallesproducto = new Detallesproducto();
        $detallesproducto->name =$request->name;
        $detallesproducto->descripcion=$request->descripcion;
        $detallesproducto->color=$request->color;
        $detallesproducto->material=$request->material;
        $detallesproducto->marca=$request->marca;
        $detallesproducto->modelo=$request->modelo;
      
        $producto->detallesproducto()->save($detallesproducto);   

       
        $imagen = new Imagen();
        if($request->hasfile("imagen")){
            $file=$request->file("imagen");
            $destinationPath= 'img/Multimedia/';
            $filename=time().'-'.$file->getClientOriginalName();
            $uploadSuccess=$request->file('imagen')->move($destinationPath, $filename);
            $imagen->url = $destinationPath . $filename;
        }  
        $producto->imagen()->save($imagen);   
   
        return redirect()->route('productos.index');
    }

    public function destroy(Producto $producto, Detallesproducto $detallesproducto,  Bicicleta $bicicleta )
    {
       
        $imagen=Imagen::find($producto->imagen->id)->delete(); 
        $detallesproducto=Detallesproducto::find($producto->detallesproducto->id)->delete(); 
        $producto->delete();
       
       return redirect()->route('productos.index');
    }
    
    public function show($producto)
    { 
        $producto=Producto::find($producto);
    
        return view('productos.show',compact('producto'));
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
        $producto->save();

        $detallesproducto= Detallesproducto::find($producto->detallesproducto->id);
        $detallesproducto->name =$request->name;
        $detallesproducto->descripcion=$request->descripcion;
        $detallesproducto->color=$request->color;
        $detallesproducto->material=$request->material;
        $detallesproducto->marca=$request->marca;
        $detallesproducto->modelo=$request->modelo;
        $producto->detallesproducto()->save($detallesproducto);    

        $imagen=Imagen::find($producto->imagen->id);
        if($request->hasfile("imagen")){
            $file=$request->file("imagen");
            $destinationPath= 'img/Multimedia/';
            $filename=$file->getClientOriginalName();
            $uploadSuccess=$request->file('imagen')->move($destinationPath, $filename);
            $imagen->url = $destinationPath . $filename;
        }  
        $producto->imagen()->save($imagen);   

       return redirect()->route('productos.index');
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
        $detallesproductos = Detallesproducto::all()->where('imageable_type', 'App\Models\Producto');
        $productos=Producto::All();
        $productos = Producto::paginate(3);
        $producto=Producto::where('user_id', auth()->user()->id);
        $imagens = Imagen::all()->where('imageable_type', 'App\Models\Producto');

        return view ('productos.listaProducto', compact('productos','detallesproductos','imagens'));
    
    }

    public function detallescompra(Request $request,Producto $producto, Detallesproducto $detallesproducto, Imagen $imagen)

    { 
        $producto->detallesproducto->name;
        return view ('productos.detallescompra', compact('producto','detallesproducto','imagen'));
    }
   
}
