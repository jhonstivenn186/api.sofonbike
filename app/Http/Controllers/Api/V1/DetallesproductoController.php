<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\Detallesproducto;
use App\Models\Producto;
use App\Models\Bicicleta;
use Illuminate\Http\Request;

/**
 * Class DetallesproductoController
 * @package App\Http\Controllers
 */
class DetallesproductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detallesproductos = Detallesproducto::paginate();

        return $detallesproductos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detallesproducto = new Detallesproducto();
       
     
        return view('detallesproducto.create', compact('detallesproducto', 'productos','bicicletas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Producto $producto, Bicicleta $bicicleta, Detallesproducto $detallesproducto)

    {
        return redirect()->route('detallesproductos.index')->with('success', 'Detallesproducto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Bicicleta $bicicleta)
    {
        $detallesproducto=Detallesproducto::find($id); 
        return view('detallesproducto.show', compact('detallesproducto', 'bicicleta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detallesproducto = Detallesproducto::find($id);
        return view('detallesproducto.edit', compact('detallesproducto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Detallesproducto $detallesproducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detallesproducto $detallesproducto)
    {
      //  request()->validate(Detallesproducto::$rules);

        $detallesproducto->update($request->all());
        
        return redirect()->route('detallesproductos.index')->with('success', 'Detallesproducto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $detallesproducto = Detallesproducto::find($id)->delete();

        return redirect()->route('detallesproductos.index')->with('success', 'Detallesproducto deleted successfully');
    }
}
