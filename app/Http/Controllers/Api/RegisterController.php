<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PhpParser\Node\Stmt\Return_;

class RegisterController extends Controller {
    
    public function create() {
        return view('auth.register');
    }

    public function store() {

        $this->validate(request(), [
            'name' => 'required',
            'apellido' => 'required',
            'N_identificacion' => 'required',
            'email' => 'required|email',
            'date' => 'required',
            'celular' => 'required',
            'imagen' => 'imagen',
            'username' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = User::create(request(['name','apellido','N_identificacion','email','date','celular','username','imagen', 'password']));

        auth()->login($user);
        return redirect()->to('/');
    }


    public function edit(User $user) {
       

        
        return view('auth.registeredit', compact('user'));

    }

    public function update(User $user, Request $request) {
       
      /*   Return ($user->id); */


        $user=User::find($user->id);
        $user->name=$request->name;
        $user->apellido=$request->apellido;
        $user->email=$request->email;
        $user->celular=$request->celular;
        $user->username=$request->username;
        if($request->hasfile("imagen")){
            $file=$request->file("imagen");
            $destinationPath= 'img/Multimedia/';
            $filename=time().'-'.$file->getClientOriginalName();
            $uploadSuccess=$request->file('imagen')->move($destinationPath, $filename);
            $user->imagen = $destinationPath . $filename;
        }  
        $user->N_identificacion=$request->N_identificacion;

        $user->save();
        return view('auth.registeredit', compact('user'));

    }

    public function indexi(User $user) {
          $users=User::all() ;
        return view('auth.registerindex', compact('users'));

    }

}


