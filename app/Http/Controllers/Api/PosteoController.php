<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Posteo;
use App\Models\Categoria;
use App\Models\Imagen;
use App\Models\Detallesproducto;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use App\Models\Comment;

use Illuminate\Support\Facades\Storage;

/**
 * Class PosteoController
 * @package App\Http\Controllers
 */
class PosteoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Posteo $posteo)
    {
       
      $posteos=Posteo::with('categoria')->get();
        $posteos = Posteo::paginate(3);
        return view('posteo.index', compact('posteos','imagens'))
           /*  ->with('i', (request()->input('page', 1) - 1) * $posteos->perPage(3)) */;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Imagen $imagen)
    {
        $posteo = new Posteo();
        $categorias=Categoria::pluck('name','id');
        return view('posteo.create', compact('posteo','categorias','imagen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Comment $comment)
    {
       /*  request()->validate(Posteo::$rules);
 */
        $categoria= new  Categoria();
    
        $posteo= new  Posteo();
        $posteo->descripcion=$request->descripcion;
       /*  if($request->hasfile("imagen")){
            $file=$request->file("imagen");
           $destinationPath= 'img/Multimedia/';
           $filename=time().'-'.$file->getClientOriginalName();
           $uploadSuccess=$request->file('imagen')->move($destinationPath, $filename);
           $posteo->imagen = $destinationPath . $filename;
        }   */
        $posteo->categoria_id=$request->categoria_id;
        $posteo->user_id = auth()->user()->id;
        $posteo->save();

      
        $imagen = new Imagen();
        if($request->hasfile("imagen")){
            $file=$request->file("imagen");
            $destinationPath= 'img/Multimedia/';
          
            $filename=time().'-'.$file->getClientOriginalName();
           
            $uploadSuccess=$request->file('imagen')->move($destinationPath, $filename);
            $imagen->url = $destinationPath . $filename;
           
        }  
      
        $posteo->imagens()->save($imagen);   

      
        return redirect()->route('posteos.index')->with('success', 'Posteo created successfully.');
       
    }


    public function guardar(Request $request, Comment $comment, Posteo $posteo)
    {

       

        $posteos=Posteo::all();
        foreach ($posteos as $posteo){
           /*  dd(  $posteo = Posteo::find($posteos[1]->id)
        ); */
        }
        foreach ($posteos as $posteo){
            /* dd( $posteo = Posteo::find($posteo->id)); */
           /*  dd( $posteo = Posteo::find($posteo->id)); */
        }

        return redirect()->route('posteos.publicados')->with('success', 'Posteo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)    
    {
        $posteos = Posteo::all();
        $users = user::all();

        $posteo = Posteo::find($id);


        $imagen=Imagen::find($id); 
       $posteo = Posteo::with(['imagens'])->findOrFail($id);
       $posteo = Posteo::with(['categoria'])->findOrFail($id); 
 

        return $posteo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request, Imagen $imagen, Categoria $categoria )
    {
       
        
      
        $posteo = Posteo::find($id);
       
        $categorias=Categoria::pluck('name','id');
        $posteo->imagen=$request->imagen;
        

        return view('posteo.edit', compact('posteo', 'categorias','imagen'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Posteo $posteo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posteo $posteo)
    {

       
        $posteo=Posteo::find($posteo->id);
        $posteo->descripcion=$request->descripcion;
       
            $posteo->categoria_id=$request->categoria_id;
        
        $posteo->save();




        foreach ($posteo->imagens as $imagen) {
            /*  $bicicleta=Imagen::find($id); */
             $imagen=Imagen::find($imagen->id);
             if($request->hasfile("imagen")){
                     $file=$request->file("imagen");
                     $destinationPath= 'img/Multimedia/';
                     
                   
                     $filename=time().'-'.$file->getClientOriginalName();
                     $uploadSuccess=$request->file('imagen')->move($destinationPath, $filename);
                     $imagen->url = $destinationPath . $filename;
             }  
             $imagen->save();
         }


        return redirect()->route('posteos.index')->with('success', 'Posteo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        


        $posteo = Posteo::find($id);

       /*  $posteo = Posteo::find($id)->delete(); */
       foreach ($posteo->imagens as $imagen){
        $imagen = Imagen::find($imagen->id)->delete();
        }
       $posteo = Posteo::find($id)->delete();

        /* return(Posteo::where('id', '=', 1)); */
/*         $posteo->imagens()->where('imageable_id', '=', $posteo->id)->delete(); 
 */        
        /* $imagen = Imagen::find($id)->delete(); */

    /*     $posteo->imagens()->where('id', '=', 14)->delete();  */


        return redirect()->route('posteos.index')->with('success', 'Posteo deleted successfully');
    }

    public function publicados(Request $request)


    { 
        $imagens=Imagen::all();
        $posteos=Posteo::all();
       /*  $posteo = Posteo::find($id); */
        return view('posteo.publicados', compact('posteos','imagens','comments','comment'));
    }


}
