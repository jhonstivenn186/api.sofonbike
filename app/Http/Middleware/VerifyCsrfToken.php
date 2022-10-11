<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{

    protected $addHttpCookie = true;

   protected $except = [
    'auth/facebook/callback',
    'auth/google/callback',
    'http://api.sofonbike.com/categorias',
    'http://api.sofonbike.com/categorias/4',
    'http://api.sofonbike.com/categorias/7',
    'http://api.sofonbike.com/categorias/5',

    'http://api.sofonbike.com/api/categorias',
    'http://api.sofonbike.com/api/categorias/4',
    'http://api.sofonbike.com/api/categorias/7',
    'http://api.sofonbike.com/api/categorias/5',

    'http://api.sofonbike.com/api/estados',
    'http://api.sofonbike.com/api/estados/2',

    'http://api.sofonbike.com/api/bicicletas',


];
}