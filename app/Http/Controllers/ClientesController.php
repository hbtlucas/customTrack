<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clientes;
use App\Models\pedidos;


class ClientesController extends Controller
{
    public function clientes(Request $request)
    {
        return view('clientes.clientes');

    }   
    
    public function cadastroclientes()
    {
        return view('clientes.cadastrocliente');
    }
  
    public function store(Request $request)
    {
        $clientes = new clientes(); 
        $clientes::create($request->all());
        return redirect()->route('clientes');
    }

      public function listarClientes()
      {
          $clientes = clientes::all(); // recuperando parametros da tabela
          return view('clientes.clientes', ['clientes' => $clientes]);
      }

      public function editcliente($id_cliente)
      {
        $cliente = clientes::find($id_cliente);
        return view('clientes.editcliente', ['cliente' => $cliente]);
      }
      
      public function updatecliente(Request $request, $id_cliente)
      {
        $cliente = clientes::find($id_cliente);
        $cliente->update($request->all());
        return redirect()->route('clientes');
      }

      public function deletecliente($id_cliente)
      {
        $errocliente = "Erro! Delete esse cliente da tabela pedidos antes de deletar aqui!";

        $cliente = clientes::find($id_cliente);
        $clientesassociados = pedidos::where('id_cliente', $id_cliente)->get();

        if($clientesassociados->count()>0) {
          abort(403, $errocliente);
        }

        $cliente->delete();
        return redirect()->route('clientes');
      }
  
      public function search(Request $request){
        $search = $request->search;

        $clientes = clientes::where(function ($query) use ($search){
          $query->where('nome_cliente', 'like', '%'. $search . '%')
          ->orWhere('cpf', 'like', '%' . $search . '%')
          ->orWhere('telefone', 'like', '%' . $search . '%')
          ->orWhere('email', 'like', '%' . $search . '%')
          ->orWhere('id_cliente', 'like', '%' . $search . '%');

        })->get();
        
        return view('clientes.search', compact('clientes'));
      }
}
