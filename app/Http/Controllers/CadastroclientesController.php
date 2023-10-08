<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastroclientesController extends Controller
{
    public function cadastroclientes(){
        return view('clientes.cadastrocliente');
    }
}
