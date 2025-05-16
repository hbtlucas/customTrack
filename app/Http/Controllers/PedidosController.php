<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pedidos;
use App\Models\clientes;
use App\Models\produtos;

class PedidosController extends Controller
{
    public function pedidos() {
        return view('pedidos.pedidos');
    }    

    public function cadastropedido() {
        $clientes = clientes::all();
        $produtos = produtos::all();
        return view('pedidos.cadastropedido', compact('clientes', 'produtos'));
    }

    public function store(Request $request) {
        $request->validate([
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_produto' => 'required|exists:produtos,id_produto',
            'quantidade' => 'required|integer|min:1',
            'id_forma_pagamento' => 'required|in:1,2,3,4',
            'status_pedido' => 'required|string|max:255',
            'status_pagamento' => 'required|string|max:255',
        ]);

        $cliente = clientes::find($request->input('id_cliente'));
        $produto = produtos::find($request->input('id_produto'));

        $quantidade = $request->input('quantidade');
        $valor_produto = $produto->valor_produto;
        $valor_pedido = $valor_produto * $quantidade;

        $pedido = pedidos::create([
            'id_cliente' => $cliente->id_cliente,
            'id_produto' => $produto->id_produto,
            'id_forma_pagamento' => $request->input('id_forma_pagamento'),
            'valor_pedido' => $valor_pedido,
            'quantidade' => $quantidade,
            'status_pedido' => $request->input('status_pedido'),
            'status_pagamento' => $request->input('status_pagamento'),
        ]);

        return redirect()->route('pedidos')->with('success', 'Pedido cadastrado com sucesso!');
    }

    public function listarpedidos() {
        $pedidos = pedidos::with(['clientes', 'produtos'])->orderBy('id_pedido', 'desc')->get();
        $formasPagamento = [
            1 => 'Pix',
            2 => 'Cartão de Crédito',
            3 => 'Cartão de Débito',
            4 => 'Dinheiro Físico',
        ];
        return view('pedidos.pedidos', ['pedidos' => $pedidos, 'formasPagamento' => $formasPagamento]);
    }

    public function edit($id_pedido) {
        $pedidos = pedidos::findOrFail($id_pedido);
        $clientes = clientes::all();
        $produtos = produtos::all();
        return view('pedidos.editpedido', compact('pedidos', 'clientes', 'produtos'));
    }

    public function update(Request $request, $id_pedido) {
        $pedidos = pedidos::findOrFail($id_pedido);

        $validated = $request->validate([
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_produto' => 'required|exists:produtos,id_produto',
            'quantidade' => 'required|integer|min:1',
            'id_forma_pagamento' => 'required|in:1,2,3,4',
            'status_pedido' => 'required|string|max:255',
            'status_pagamento' => 'required|string|max:255',
        ]);

        $produto = produtos::findOrFail($validated['id_produto']);
        $quantidade = $validated['quantidade'];
        $valor_pedido = $produto->valor_produto * $quantidade;

        $validated['valor_pedido'] = $valor_pedido;

        $pedidos->update($validated);

        return redirect()->route('pedidos')->with('success', 'Pedido atualizado com sucesso!');
    }

    public function delete($id_pedido) {
        $pedidos = pedidos::find($id_pedido);
        if ($pedidos) {
            $pedidos->delete();
            return redirect()->route('pedidos');
        }
        return redirect()->route('pedidos');
    }

    public function search(Request $request){
        $formasPagamento = [
            1 => 'Pix',
            2 => 'Cartão de Crédito',
            3 => 'Cartão de Débito',
            4 => 'Dinheiro Físico',
        ];

        $search = $request->search;

        // Encontrar IDs das formas de pagamento que correspondem ao texto de busca
        $formaPagamentoIds = array_keys(array_filter($formasPagamento, function ($forma) use ($search) {
            return stripos($forma, $search) !== false; // Busca case-insensitive no texto
        }));

        $pedidos = Pedidos::where(function ($query) use ($search, $formaPagamentoIds) {
            $query->where('status_pedido', 'ILIKE', '%' . $search . '%')
                ->orWhere('id_pedido', 'ILIKE', '%' . $search . '%')
                ->orWhere('quantidade', 'ILIKE', '%' . $search . '%')
                ->orWhere('status_pagamento', 'ILIKE', '%' . $search . '%')
                ->orWhere('valor_pedido', 'ILIKE', '%' . $search . '%');

            // Se houver IDs de formas de pagamento correspondentes, incluir na query
            if (!empty($formaPagamentoIds)) {
                $query->orWhereIn('id_forma_pagamento', $formaPagamentoIds);
            }
        })->orWhereHas('clientes', function ($query) use ($search) {
            $query->where('nome_cliente', 'ILIKE', '%' . $search . '%');
        })->orWhereHas('produtos', function ($query) use ($search) {
            $query->where('nome_produto', 'ILIKE', '%' . $search . '%');
        })
        ->orderBy('id_pedido', 'desc')
        ->get();
        

        return view('pedidos.search', compact('pedidos', 'formasPagamento'));
    }
}