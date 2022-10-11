<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function imageable(){
        return $this->morphTo();
    }
}
