<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produtos;
use App\Models\pedidos;



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

    public function editprodutos($id_produto){
        $produtos = produtos::find($id_produto);
        return view('produtos.editproduto', ['produtos' => $produtos]);

    }

    public function update(Request $request, $id_produto){
        $produtos = produtos::find($id_produto);
        $produtos->update($request->all());
        return redirect()->route('produtos');
    }

    public function delete($id_produto){
        $erroproduto = "Erro! Delete esse produto da tabela pedidos antes de deletar aqui!";

        $produtos = produtos::find($id_produto);
        $produtosassociados = pedidos::where('id_produto', $id_produto)->get();

        if($produtosassociados->count()>0) {
          abort(403, $erroproduto);
        }

        $produtos->delete();
        return redirect()->route('produtos');
      }

      public function search(Request $request){

        $search = $request->search;

        $produtos = produtos::where(function ($query) use ($search) {
            $query->where('nome_produto', 'like', '%' . $search . '%')
            ->orWhere('valor_produto', 'like', '%' . $search . '%')
            ->orWhere('categoria', 'like', '%' . $search . '%')
            ->orWhere('id_produto', 'like', '%' . $search . '%');
        })->get();
        return view ('produtos.search',compact('produtos'));
      }
    }
  

