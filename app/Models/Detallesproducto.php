<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallesproducto extends Model
{
    protected $guarded=[];
    use HasFactory;
   /*  protected $fillable = ['name', 'descripcion','marca','imagen','talla']; */
    public function imageable(){
        return $this->morphTo();
           /*  'App\Producto', 'imageable' */  
      /*   return $this->morphTo('App\Models\Producto', 'imageable_id'); */
    } 
    
    public function tipoproducto(){
        return $this->hasOne('App\Models\Tipoproducto');
    }
}
