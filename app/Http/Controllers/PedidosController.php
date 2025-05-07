<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pedidos;
use App\Models\clientes;
use App\Models\produtos;


class PedidosController extends Controller
{
    public function pedidos(){

        return view('pedidos.pedidos');
    }    

    public function cadastropedido()
    {
        // Recuperar todos os clientes
        $clientes = clientes::all();
        $produtos = produtos::all();
        return view('pedidos.cadastropedido', compact('clientes', 'produtos'));
    }

    public function store(Request $request)
        {
            // Validar os dados do formulário
            $request->validate([
                'id_cliente' => 'required|exists:clientes,id_cliente',
                'id_produto' => 'required|exists:produtos,id_produto',
                'quantidade' => 'required|integer|min:1',
                'id_forma_pagamento' => 'required|in:1,2,3,4',
            ]);

            // Buscar o cliente pelo id_cliente
            $cliente = clientes::find($request->input('id_cliente'));

            // Buscar o produto pelo id_produto
            $produto = produtos::find($request->input('id_produto'));

            // Calcular o valor do pedido
            $quantidade = $request->input('quantidade');
            $valor_produto = $produto->valor_produto;
            $valor_pedido = $valor_produto * $quantidade;

            // Criar o pedido
            $pedido = pedidos::create([
                'id_cliente' => $cliente->id_cliente,
                'id_produto' => $produto->id_produto,
                'id_forma_pagamento' => $request->input('id_forma_pagamento'),
                'valor_pedido' => $valor_pedido,
                'quantidade' => $quantidade,
                'status_pedido' => 'Pendente', // Valor padrão, ajuste conforme necessário
                'status_pagamento' => 'Aguardando', // Valor padrão, ajuste conforme necessário
            ]);

            return redirect()->route('pedidos')->with('success', 'Pedido cadastrado com sucesso!');
        }

    public function listarpedidos(){
        $pedidos = pedidos::all(); // recuperando parametros da tabela

        $formasPagamento = [
            1 => 'Pix',
            2 => 'Cartão de Crédito',
            3 => 'Cartão de Débito',
            4 => 'Dinheiro Físico',
        ];
        
        return view('pedidos.pedidos', ['pedidos' => $pedidos, 'formasPagamento' => $formasPagamento]);
    }

    public function edit($id_pedido){
        $pedidos = pedidos::find($id_pedido);
        return view('pedidos.editpedido',['pedidos' => $pedidos]);
    }

    public function update(Request $request, $id_pedido){
        $error404 = "NOT FOUND";
        $pedidos = pedidos::find($id_pedido);
        $emailCliente = $request->input('email-cliente');
        $clientes = clientes::where('email', $emailCliente)->first();
        
        if(!$clientes){
            abort(404, $error404);
        } else {
            $nomeProduto = $request->input('produto');
            $produtos = produtos::where('nome_produto', $nomeProduto)->first();

            if(!$produtos) {
                abort(404, $error404);
            } else {
                $quantidade = $request->input('quantidade');
                $valor_produto = $pedidos->produtos->valor_produto;
    
                $valor_pedido = $valor_produto * $quantidade;
    
                $pedidos->id_cliente = $clientes->id_cliente;
                $pedidos->id_produto = $produtos->id_produto;
                $pedidos->id_forma_pagamento = $request->input('id_forma_pagamento');
                $pedidos->valor_pedido = $valor_pedido;
                $pedidos->status_pagamento = $request->input('status_pagamento');
                $pedidos->status_pedido = $request->input('status_pedido');
                $pedidos->quantidade = $quantidade;
            
                $pedidos->save();
                return redirect()->route('pedidos');
            }
        }
        
    }

    public function delete($id_pedido){
        $pedidos = pedidos::find($id_pedido);
        if($pedidos){
            $pedidos->delete();
          return redirect()->route('pedidos');
        } else {
          return redirect()->route('pedidos');
        }
      }

      public function search(Request $request){

        $formasPagamento = [
            1 => 'Pix',
            2 => 'Cartão de Crédito',
            3 => 'Cartão de Débito',
            4 => 'Dinheiro Físico',
        ];

        $search = $request->search;

            $pedidos = pedidos::where(function ($query) use ($search) {
                $query->where('status_pedido', 'like', '%' . $search . '%')
                      ->orWhere('id_pedido', 'like', '%' . $search . '%')
                      ->orWhere('quantidade', 'like', '%' . $search . '%')
                      ->orWhere('status_pagamento', 'like', '%' . $search . '%')
                      ->orWhere('id_forma_pagamento', 'like', '%' . $search . '%')
                      ->orWhere('valor_pedido', 'like', '%' . $search . '%');
            })->orWhereHas('clientes', function ($query) use ($search) {
                $query->where('nome_cliente', 'like', '%' . $search . '%');
            })->orWhereHas('produtos', function ($query) use ($search) {
                $query->where('nome_produto', 'like', '%' . $search . '%');
            })->get();

        return view ('pedidos.search', compact('pedidos', 'formasPagamento'));
      }
}
