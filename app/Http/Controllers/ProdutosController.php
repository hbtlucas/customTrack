<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function produtos(){
        return view('produtos.produtos');
    }
    
    public function cadastroproduto(){
        return view('produtos.cadastroproduto');
    }

    public function store(){

    }

    public function listarproduto(){

    }
  
}
