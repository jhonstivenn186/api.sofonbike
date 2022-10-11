<?php

namespace App\Http\Controllers;
use App\Mail\ContactanosMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ControllerMail extends Controller
{
    function index()
    {
     return view('contactform');
    }
    public function send(Request $request)
    {
    $this->validate($request, [
        'name'     =>  'required',
        'email'  =>  'required|email',
        'message' =>  'required'
        ]);
        
    $data = array(
            'name'      =>  $request->input('name'),
            'message'   =>   $request->input('message')
        );

        $email = $request->input('email');

    Mail::to($email)->send(new ContactanosMailable($data));

    return back()->with('success', 'Enviado exitosamente!');

    }
}
