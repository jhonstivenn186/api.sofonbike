<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Models\Posteo;
use Illuminate\Http\Request;

/**
 * Class CommentController
 * @package App\Http\Controllers
 */
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { $comment = new Comment();
        $comments = Comment::paginate();

        return view('comment.index', compact('comments', 'comment'))
            ->with('i', (request()->input('page', 1) - 1) * $comments->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comment = new Comment();
        return view('comment.create', compact('comment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Posteo $posteo, Comment $comment)
    {
/*         request()->validate(Comment::$rules);
 */
        /* $comment = Comment::create($request->all()); */
  /*  $posteos=Posteo::find($comment->posteos[1]->id) */ 
/* dd(    $posteos=Posteo::all());
 */


/* 
$posteos=Posteo::all();
    
    foreach ($posteos as $posteo){
      
      $posteo->comment()->create(
       
        $comment->mensaje=$request->mensaje,
    $comment->user_id = auth()->user()->id,
    $comment->posteo()->save($posteo),
   

      );
    };
    */
    $posteos=Posteo::all();

foreach ($posteos as $posteo){

}

    $comment = new Comment();
    $comment->mensaje=$request->mensaje;
    $comment->user_id = auth()->user()->id;
/* $comment->commentable_id= $posteo=Posteo::find(1); */

    /* dd( $comment->posteo()->save($posteo)); */

 $posteo=Posteo::find($posteo->id);

 /* $comment->posteo()->associate($posteo); iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii*/
    $posteo->comments()->associate($posteo);
$comment->save();
  /*  dd($posteo->comment()->save($comment));  */

   /*  $posteo->comment()->save($comment); */
   
  /*   dd($comment); */
$comment=Posteo::all();

/* $bicicleta->imagens()->save($imagen); */
/* foreach ($posteos as $posteo){
    $comment= new  Comment();
    $comment->mensaje=$request->mensaje;
    $comment->user_id = auth()->user()->id;
$posteo->comment()->save($posteo);
dd( $comment->commentable_id);
} */
     /*   $comment= new  Comment();
        $comment->mensaje=$request->mensaje;
      
       
        $comment->user_id = auth()->user()->id;
        $posteo->comment()->save($comment); */
         


       /*  return redirect()->route('comments.index')
            ->with('success', 'Comment created successfully.'); */
            return redirect()->route('comments.index')
            ->with('success', 'Comment created successfully.');
            
    }

    public function guardar(Request $request, Posteo $posteo)
    {
/* 
        $posteo = Posteo::find($posteo->id);

        $comment= new  Comment();
        $comment->mensaje=$request->mensaje;
      
      
        $comment->user_id = auth()->user()->id;
      
        
        $posteo->comment()->save($comment); 
        
        dd(  $comment); */

            return redirect()->route('comments.index')
            ->with('success', 'Comment created successfully.');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);

        return view('comment.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);

        return view('comment.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        request()->validate(Comment::$rules);

        $comment->update($request->all());

        return redirect()->route('comments.index')
            ->with('success', 'Comment updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $comment = Comment::find($id)->delete();

        return redirect()->route('comments.index')
            ->with('success', 'Comment deleted successfully');
    }
}
