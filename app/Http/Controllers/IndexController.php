<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('index');
    }    

    public function user(){
        return view('user');
    }

    public function iniciarsessao(Request $request){
        $user = $request->input('user');

        session(['user' => $user]);

        return redirect()->route('index');
    }
}
