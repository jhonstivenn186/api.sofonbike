<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\File;


class PrincipalController extends Controller
{
    public function detalles()
    { 
        return view ('principal');
    }

    public function cuentadetalles()
    { 

        return view ('cuenta');
    }


    public function loginadmin()
    { 
        return view ('auth.login2');
    }

    public function soon()
    { 
        return view ('soonaction');
    }

    public function pdff()
    { 
/* 
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream(); */
    }

    public function recuperarcontraseña()
    { 
        return view ('recuperarcontraseña');
    }

    public function email()
    { 
        return view ('email');
    }

    public function reset()
    { 
        return view ('reset');
    }
}

