<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
/**
 * Class EstadoController
 * @package App\Http\Controllers
 */
class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = Estado::paginate();
        $response = Http::get('http://api.codersfree.test/v1/categories');
        $responseArray = $response->json();  
<<<<<<< HEAD:app/Http/Controllers/Api/V1/EstadoController.php
        return  /* view('welcome', compact('categoriesArray')) */$responseArray;
       /*  return $estados; */
=======
        
        return  /* view('welcome', compact('categoriesArray')) */$responseArray;
       /*  return $estados; */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estado = new Estado();
        return $estado;
>>>>>>> 27c5d8c15821d2e07e07c5d699790cb6420d8818:app/Http/Controllers/Api/EstadoController.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD:app/Http/Controllers/Api/V1/EstadoController.php
=======

>>>>>>> 27c5d8c15821d2e07e07c5d699790cb6420d8818:app/Http/Controllers/Api/EstadoController.php
        $estado = Estado::create($request->all());
        return $estado;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // $estado = Estado::find($id);
        $estado = Estado::with(['productos.detallesproducto'])->findOrFail($id);
        return $estado;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Estado $estado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estado $estado)
    {
/*         request()->validate(Estado::$rules);
 */
        $request->validate([
            'name' => 'required',
        ]);
        $estado->update($request->all());
        return $estado;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $estado = Estado::find($id)->delete();
        return 'registro eliminado' ;
    }
}
