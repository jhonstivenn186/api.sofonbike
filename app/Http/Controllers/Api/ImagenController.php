<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Imagen;
use Illuminate\Http\Request;

/**
 * Class ImagenController
 * @package App\Http\Controllers
 */
class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imagens = Imagen::paginate();

        return $imagens;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $imagen = new Imagen();
        return view('imagen.create', compact('imagen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    request()->validate(Imagen::$rules);

        $imagen = Imagen::create($request->all());

        return redirect()->route('imagens.index')
            ->with('success', 'Imagen created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imagen = Imagen::find($id);

        return /* view('imagen.show', compact('imagen')) */ $imagen;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imagen = Imagen::find($id);

        return view('imagen.edit', compact('imagen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Imagen $imagen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imagen $imagen)
    {
    //    request()->validate(Imagen::$rules);

        $imagen->update($request->all());

        return redirect()->route('imagens.index')
            ->with('success', 'Imagen updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $imagen = Imagen::find($id)->delete();

        return redirect()->route('imagens.index')
            ->with('success', 'Imagen deleted successfully');
    }
}
