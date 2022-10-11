<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    /* public function commentable(){
        return $this->morphTo();
    } */

    public function commentable(){
        return $this->morphTo();
    } 

    public function posteo(){
        return $this->morphTo('App\Posteo','posteable');
    }


    
}
