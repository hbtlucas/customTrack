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

    public function cadastropedido(){
        return view('pedidos.cadastropedido');
    }

    public function store(Request $request){
        $emailCliente = $request->input('email-cliente');

        $cliente = clientes::where('email', $emailCliente)->first();

        if(!$cliente) {
            //cliente não encontrado
            $html = "<html><h1 style='color:red'>Error 404! Client not found </h1> </html>";
            return $html;

        } else {
            $nomeProduto = $request->input('produto');
            $produtos = produtos::where('nome_produto', $nomeProduto)->first();

            if(!$produtos){
                //produto nao encontrado
                $html = "<html><h1 style='color:red'>Error 404! Item not found </h1> </html>";
                return $html;

            } else {
                $quantidade = $request->input('quantidade');
                $valor_produto = $produtos->valor_produto;

                $valor_pedido = $valor_produto * $quantidade;
                $pedido = pedidos::create(
                    [
                        'id_cliente' => $cliente->id_cliente,
                        'id_produto' => $produtos->id_produto,
                        'id_forma_pagamento' => $request->input('id_forma_pagamento'),
                        'valor_pedido' => $valor_pedido,
                        'status_pedido' => $request->input('status_pedido'),
                        'status_pagamento' => $request->input('status_pagamento'),
                        'quantidade' => $quantidade
                    ]);
                return redirect()->route('pedidos');
            }
        }
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

    public function edit(){

    }

    public function update(){

    }

    public function delete(){

    }
}
