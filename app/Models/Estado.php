<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
   ]; 


    public function productos(){
        /* $estadoproducto = Estadoproducto::where('user_id', $this->id)->first(); */
     /*   $user = User::find($this->user_id); */
        return $this->hasOne('App\Models\Producto'); 
    }
}
