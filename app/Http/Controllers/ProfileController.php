<?php

namespace projetoUsuario\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller

{

    public function __construct()
    {
         $this->middleware('auth');
    }



    public function showProfile(){

        return view('usuario.profile')->with('user', Auth::user());
        
    }

}



