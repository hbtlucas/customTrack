<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\relatorios;

class RelatoriosController extends Controller
{
    public function relatorios(){
        return view('relatorios.relatorios');
    }

    public function listar(){
        $relatorios = relatorios::orderBy('id', 'desc')->get();
        return view('relatorios.relatorios',['relatorios'=> $relatorios]);
    }

    public function cadastro(){
        return view('relatorios.cadastrorelatorio');
    }

    public function store(Request $request){
        $relatorios = new relatorios();
        $relatorios::create($request->all());
        return redirect()->route('relatorios');
    }

    public function edit($id){
        $relatorios = relatorios::find($id);
        return view ('relatorios.editrelatorio',['relatorios'=>$relatorios]);
    }

    public function update($id, Request $request){
        $relatorios = relatorios::find($id);
        $relatorios->titulo = $request->input('titulo');
        $relatorios->cliente = $request->input('cliente');
        $relatorios->texto = $request->input('texto');

        $relatorios->save();
        return redirect()->route('relatorios');

    }

    public function delete($id){
        $relatorios = relatorios::find($id);
        if($relatorios){
            $relatorios->delete();
            return redirect()->route('relatorios');
        }

    }
    
}
