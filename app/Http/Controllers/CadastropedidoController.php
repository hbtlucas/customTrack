<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastropedidoController extends Controller
{
    public function cadastropedido(){
        return view('pedidos.cadastropedido');
    }
}
