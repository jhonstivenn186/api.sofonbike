<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Bicicleta;
use App\Models\Detallesproducto;
use Illuminate\Http\Request;
use App\Models\Imagen;
use App\Models\Producto;
use Illuminate\Pagination\Paginator;
use function GuzzleHttp\Promise\all;

/**
 * Class BicicletaController
 * @package App\Http\Controllers
 */
class BicicletaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Detallesproducto $detallesproducto,  Bicicleta $bicicleta, Imagen $imagen)

    {
        $imagens = Imagen::all()->where('imageable_type', 'App\Models\Bicicleta');
        $detallesproductos = Detallesproducto::all()->where('imageable_type', 'App\Models\Bicicleta');
        $bicicletas = Bicicleta::paginate(3);

     /*    return [$bicicletas, $detallesproducto]; */

     return  $bicicletas; 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Detallesproducto $detallesproducto, Imagen $imagen)
    {
        $bicicleta = new Bicicleta();
        return view('bicicleta.create', compact('bicicleta','detallesproducto','imagen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,  Bicicleta $bicicleta, Detallesproducto $detallesproducto, Imagen $imagen)
    {
        $bicicleta = new Bicicleta();
        $bicicleta->tamaño=$request->tamaño;
        $bicicleta->descripcionhurto=$request->descripcionhurto;
        $bicicleta->fechahurto=$request->fechahurto;
        $bicicleta->ubicacionhurto=$request->ubicacionhurto;
        $bicicleta->n_serial=$request->n_serial;
        $bicicleta->user_id=1;
        $bicicleta->save();
    
     /*    $detallesproducto = new Detallesproducto();
        $detallesproducto->name =$request->name;
        $detallesproducto->descripcion=$request->descripcion;
        $detallesproducto->color=$request->color;
        $detallesproducto->material=$request->material;
        $detallesproducto->marca=$request->marca;
        $detallesproducto->modelo=$request->modelo;
        $bicicleta->detallesproducto()->save($detallesproducto);    */

     /*    $imagen = new Imagen();
        if($request->hasfile("imagen")){
            $file=$request->file("imagen");
            $destinationPath= 'img/Multimedia/';
            $filename=time().'-'.$file->getClientOriginalName();
            $uploadSuccess=$request->file('imagen')->move($destinationPath, $filename);
            $imagen->url = $destinationPath . $filename;
        }  
        $bicicleta->imagen()->save($imagen);    */

        return $bicicleta;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Detallesproducto $detallesproducto, Imagen $imagen)

    {
        $bicicleta=Imagen::find($id);
        $detallesproducto=Detallesproducto::find($id); 
        $bicicleta = Bicicleta::find($id);
        return $bicicleta;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Detallesproducto $detallesproducto, Request $request, Imagen $imagen)

    {
        $bicicleta=Detallesproducto::find($id);
        $bicicleta=Imagen::find($id);

        $imagen->url=$request->url;
   
        $bicicleta = Bicicleta::find($id);

        return view('bicicleta.edit', compact('bicicleta','detallesproducto','imagen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Bicicleta $bicicleta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Bicicleta $bicicleta,Detallesproducto $detallesproducto, Imagen $imagen)

    {
       /*  $detallesproducto=Detallesproducto::find($bicicleta->detallesproducto->id);
        $detallesproducto->name =$request->name;
        $detallesproducto->descripcion=$request->descripcion;
        $detallesproducto->color=$request->color;
        $detallesproducto->material=$request->material;
        $detallesproducto->marca=$request->marca;
        $detallesproducto->modelo=$request->modelo;
        $detallesproducto->save(); */

        $bicicleta=Bicicleta::find($bicicleta->id);
        $bicicleta->tamaño=$request->tamaño;
        $bicicleta->n_serial=$request->n_serial;
        $bicicleta->descripcionhurto=$request->descripcionhurto;
        $bicicleta->fechahurto=$request->fechahurto;
        $bicicleta->ubicacionhurto=$request->ubicacionhurto;
        $bicicleta->save();

      /*   $imagen=Imagen::find($bicicleta->imagen->id);
        if($request->hasfile("imagen")){
                $file=$request->file("imagen");
                $destinationPath= 'img/Multimedia/';
                $filename=time().'-'.$file->getClientOriginalName();
                $uploadSuccess=$request->file('imagen')->move($destinationPath, $filename);
                $imagen->url = $destinationPath . $filename;
        }  
        $imagen->save(); */
       
    return $bicicleta;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id, Detallesproducto $detallesproducto, Imagen $imagen)

    {
        $bicicleta = Bicicleta::find($id)->delete();
        $detallesproducto=Detallesproducto::find($id)->delete(); 
        $imagen = Imagen::find($id)->delete();

        return redirect()->route('bicicletas.index')->with('success', 'Bicicleta deleted successfully');
    }


    public function reporte(Request $request, Bicicleta $bicicleta)

    { 
        $bicicletas=Bicicleta::all();
        return view ('bicicleta.reporte', compact('bicicletas'));
    }

    public function reportedetalles($id)
    { 
        $bicicleta = Bicicleta::find($id);
        return view ('bicicleta.reportedetalle', compact('bicicleta'));
    }
}
