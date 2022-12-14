<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

/**
 * Class CategoriaController
 * @package App\Http\Controllers
 */
class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::paginate();
        return $categorias; 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      /*   request()->validate(Categoria::$rules); */
        $categoria = Categoria::create($request->all());
        return $categoria; 

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //  $categoria = Categoria::find($id);
      $categoria= Categoria::with(['posteos.imagens'])->findOrFail($id);
<<<<<<< HEAD:app/Http/Controllers/Api/V1/CategoriaController.php
=======

        return $categoria;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);
>>>>>>> 27c5d8c15821d2e07e07c5d699790cb6420d8818:app/Http/Controllers/Api/CategoriaController.php

        return $categoria;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'name' => 'required',
        ]);
    /*   $categoria=Categoria::find($categoria->id); */
     /*    $categoria->name=$request->name;
        $categoria->save();  */
      /*   $request->validate([
            'name' => 'required|max:255'
        ]);
 */
         $categoria->update($request->all()); 

        return $categoria;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
    $categoria = Categoria::find($id);  
      $categoria->delete(); 
        return 'registro eliminado' ;
    }
}
