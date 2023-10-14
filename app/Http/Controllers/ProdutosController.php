<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produtos;


class ProdutosController extends Controller
{
    public function produtos(){
        return view('produtos.produtos');
    }
    
    public function cadastroproduto(){
        return view('produtos.cadastroproduto');
    }

    public function store(Request $request){
        $produtos = new produtos(); 
        $produtos::create($request->all());
        return redirect()->route('produtos');
    }

    public function listarprodutos(){
        $produtos = produtos::all(); // recuperando parametros da tabela
        return view('produtos.produtos', ['produtos' => $produtos]);
    }

    public function editprodutos(){

    }

    public function updateprodutos(){

    }

    public function deleteprodutos(){
        
    }
  
}
