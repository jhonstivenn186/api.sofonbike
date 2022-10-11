<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'user_id',
    ];

    use HasFactory;
    
    /* One-to-one relationship */
    public function user(){
       /*  $user = User::find($this->user_id); */
        return $this->hasOne('App\Models\User');
    }
}
