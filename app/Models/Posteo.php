<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Conner\Likeable\Likeable;


class Posteo extends Model
{
    use HasFactory;


    protected $fillable = ['descripcion','categoria_id'];
    public function users(){
        return $this->belongsTo('App\Models\User');
    }
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }
   /*  public function imagens(){
        return $this->morphMany('App\Models\Imagen','imageable');} */

    /* relacion one to one polimorphic */
  /*   public function comments(){
        return $this->morphMany('App\Models\Categoria','commentable');
    } */
    /* public function imagen(){
        return $this->morphOne('App\Imagen','imageable');} */
    public function imagens(){
        return $this->morphMany('App\Imagen','imageable');
    }

    public function comments(){
        return $this->morphMany('App\Comment','commentable');
    }
   
    public function posteable(){
        return $this->morphTo();
    } 
}
