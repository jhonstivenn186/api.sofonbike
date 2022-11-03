<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Conner\Likeable\Likeable;
use Illuminate\Database\Eloquent\Builder;



class Posteo extends Model
{
    use HasFactory;

    protected $allowIncluded=['imagens','categoria'];

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
        return $this->morphMany('App\Models\Imagen','imageable');
    }

    public function comments(){
        return $this->morphMany('App\Comment','commentable');
    }
   
    public function posteable(){
        return $this->morphTo();
    } 

    public function scopeIncluded(Builder $query){
       
        /*  if(empty($this->allowIncluded)||empty(request('included'))){
                 return;
         } */
         $relations = explode(',', request('included'));//['posts','relation2']
            
         //     return $this->allowIncluded;
            
        /*  $allowIncluded=collect($this->allowIncluded);//colocamos en una colecion lo que tiene $allowIncluded en este caso = ['posts','posts.user']
         
             foreach($relations as $key => $relationship){//recorremos el array de relaciones
                 
                 if(!$allowIncluded->contains($relationship)){
                      unset($relations[$key]);
                 }
             } */
         $query->with($relations);//se ejecuta el query con lo que tiene $relations en ultimas es el valor en la url de included
         }
}
