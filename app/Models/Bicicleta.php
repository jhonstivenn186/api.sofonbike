<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bicicleta extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $fillable = [
        'name', 'user_id',
    ];

    public function detallesproducto(){
        return $this->morphOne('App\Detallesproducto','imageable');}

    
     public function imagen(){
                return $this->morphOne('App\Imagen','imageable');}

    public function users(){
        return $this->belongsTo('App\Models\User');
    }

}
