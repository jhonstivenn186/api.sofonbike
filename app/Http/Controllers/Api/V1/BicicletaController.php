<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\Bicicleta;
use App\Models\Detallesproducto;
use Illuminate\Http\Request;
use App\Models\Imagen;
use Illuminate\Pagination\Paginator;
use function GuzzleHttp\Promise\all;


use App\Http\Resources\V1\BicicletaResource;

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
    $bicicletas = Bicicleta::paginate(3);
    return  $bicicletas; 
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
        $bicicleta = Bicicleta::with(['detallesproducto','imagen'])->findOrFail($id);
      /*   $bicicleta = Bicicleta::with(['imagen'])->findOrFail($id); */
     /*    return new BicicletaResource($bicicleta); */
     return $bicicleta;
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
        $bicicleta=Bicicleta::find($bicicleta->id);
        $bicicleta->tamaño=$request->tamaño;
        $bicicleta->n_serial=$request->n_serial;
        $bicicleta->descripcionhurto=$request->descripcionhurto;
        $bicicleta->fechahurto=$request->fechahurto;
        $bicicleta->ubicacionhurto=$request->ubicacionhurto;
        $bicicleta->save();
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
    }
}
