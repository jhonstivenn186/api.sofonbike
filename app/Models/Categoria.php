<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Categoria extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
   ]; 
    public function posteos(){
        return $this->hasMany('App\Models\Posteo');
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
