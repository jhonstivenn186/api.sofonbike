<?php

namespace App\Http\Controllers;

use App\Posteo;
use App\Categoria;
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
        $posteo=Posteo::where('user_id', auth()->user()->id)->first();;
        $posteos = Posteo::paginate(3);
       
       /*  $posteos=Posteo::with('imagen')->get(); */
        $imagens = Imagen::all()->where('imageable_type', 'App\Posteo');


      /*   $posteos = Posteo::with('imagen')->get(); */




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
/* 

        $comment = new Comment();
        $comment->mensaje =$request->mensaje;
        $comment->user_id = auth()->user()->id;
        $posteo = Posteo::find($posteo->id);

        $comment->posteo()->associate($posteo); 
     
    $comment->save();
        */



/* 
        $comment = new Comment();
        $comment->mensaje =$request->mensaje;
        $comment->user_id = auth()->user()->id;
        
        $posteo->comment()->save($comment); 
dd($comment);
 */
      
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
       
        $comment = new Comment();
        $comment->mensaje =$request->mensaje;
        $comment->user_id = auth()->user()->id;
       
      /*   $comment->commentable_id =2;
        $comment->commentable_type ='App\Posteo'; */
    /*     $comment->save();  */
  $posteo = Posteo::find($posteos[1]->id);
      /*   $posteo->comment()->save($comment);    */

      $posteo->comments()->save($comment);
        /* $posteo->comment()->associate($posteo);  */
    /*     $posteo->comment()->associate($posteo); */
    $comment->save();




    $comment = new Comment();
    $comment->mensaje =$request->mensaje;
    $comment->user_id = auth()->user()->id;
    $posteo = Posteo::find($posteos[0]->id);
    $posteo->comments()->save($comment);
    $comment->save();

    $comment = new Comment();
    $comment->mensaje =$request->mensaje;
    $comment->user_id = auth()->user()->id;
    $posteo = Posteo::find($posteos[2]->id);
    $posteo->comments()->save($comment);
    $comment->save();
       
       
        
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
        $posteo = Posteo::find($id);
       /*  $posteo=Imagen::find($id); */
    /*     $detallesproducto=Detallesproducto::find($id);  */
       $imagen=Imagen::find($id); 
        return view('posteo.show', compact('posteo','imagen'));
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

    public function previewpost($id, Request $request, Imagen $imagen, Categoria $categoria )
    {
       
        
      
        $posteo = Posteo::find($id);
       
        $categorias=Categoria::pluck('name','id');
        $posteo->imagen=$request->imagen;
        $posteos=Posteo::all();
        $imagens=Imagen::all();

        return view('posteo.previewpost', compact('posteo', 'categorias','imagen','posteos','imagens'));
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


        
         
/* 
         foreach ($posteo->imagens as $imagen){
            dd($posteo);}
      $posteo=Posteo::find($posteo->id);

      $posteos=Posteo::all();

      foreach ($posteos as $Posteo){
       dd($posteo);
      } */
     /*    $comment = new Comment();
        $comment->mensaje =$request->mensaje;
        $comment->user_id = auth()->user()->id;
      
        $posteo->comment()->save($comment); 
 */
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
        $comment=Comment::all();
        $comments=Comment::all();
        $imagens=Imagen::all();
        $posteos=Posteo::all();
       /*  $posteo = Posteo::find($id); */
        return view('posteo.publicados', compact('posteos','imagens','comments','comment'));
    }

/* 
    public function like(Posteo $posteo)
    {
        $posteo->likeBy();

        return back();
    }

    public function unlike(Posteo $posteo)
    {
        $posteo->unlikeBy();

        return back();
    }

    public function dislike(Posteo $posteo)
    {
        $posteo->dislikeBy();

        return back();
    }

    public function undislike(Posteo $posteo)
    {
        $posteo->undislikeBy();

        return back();
    } */

    public function likePost($id)
    {
        $posteo = Posteo::find($id);
        $posteo->like(2);
        $posteo->save();

        return redirect()->route('posteos.index')->with('message','Post Like successfully!');
    }

    public function unlikePost($id)
    {
        $posteo = Posteo::find($id);
        $posteo->unlike(2);
        $posteo->save();
        
        return redirect()->route('posteos.index')->with('message','Post Like undo successfully!');
    }

}
