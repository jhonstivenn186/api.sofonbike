<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Producto extends Model
{
    use HasFactory;


    protected $guarded=[];
    protected $fillable = ['talla','cantidad','precio','producto','comprobante','user_id'];

    protected $allowIncluded=['users','detallesproducto','imagen'];

    
    //relationship one to many (reverse)
    public function users(){
        return $this->hasOne('App\Models\User');
    }
    //Relationship one to one polimorphic
    public function comments(){
        return $this->morphMany('App\Models\Categoria','commentable');
    }
   /*  public function detallesproducto(){
        return $this->morphOne('App\Models\Detallesproducto','imageable');
    }  */

    public function imagen(){
        return $this->morphOne('App\Models\Imagen','imageable');
    }

   public function detallesproducto(){
        return $this->morphOne('App\Models\Detallesproducto','imageable');
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
