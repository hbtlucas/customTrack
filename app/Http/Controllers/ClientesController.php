<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clientes;

class ClientesController extends Controller
{
    public function clientes()
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
        $cliente = clientes::find($id_cliente);
        if($cliente){
          $cliente->delete();
          return redirect()->route('clientes')->with('success', 'Cliente excluído com sucesso');
        } else {
          return redirect()->route('clientes')->with('error', 'Cliente não encontrado');
        }
      }
  
}
