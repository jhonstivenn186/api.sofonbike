<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class SessionsController extends Controller {
    
    public function create() {
        
        return view('auth.login');
      
    }

    public function store() {
        
        if(auth()->attempt(request(['email', 'password'])) == false) {
            /* return request(); */
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again',
            ]); 

        } else {

            if(auth()->user()->role == 'admin') {
                return redirect()->route('admin.index');
            } else {
                return redirect()->to('/');
            }
        } 
        return redirect()->to('/');
    }

    public function destroy() {

        auth()->logout();

        return redirect()->to('/');
    }


    /* fdfs */
    public function create2() {
        
        return view('auth.login2');
    }

    public function store2() {
        
        if(auth()->attempt(request(['email', 'password'])) == false) {
            /* return request(); */
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again',
            ]); 

        } else {

            if(auth()->user()->role == 'admin') {
                return redirect()->route('admin.index');
            } else {
                return redirect()->to('admin');
            }
        } 
        return redirect()->to('admin.index');
    }

    /* public function destroy2() {
         auth()->logout(); 
        return redirect()->to('/');
    } */
}