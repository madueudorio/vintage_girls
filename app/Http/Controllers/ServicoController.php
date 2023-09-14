<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoFormRequest;
use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function store(ServicoFormRequest $request){
        $Servico = Servico::create([
           'nome'=> $request->nome,
           'descricao'=> $request->descricao,
           'duracao'=> $request->duracao,
           'preco'=> $request->preco,
        ]);
           return response()->json([
               "success" => true,
               "message" =>"Servico Cadrastado com sucesso",
               "data" => $Servico
   
           ],200);
       }

       public function pesquisarPorNome($nome){
        $servico = Servico::find($nome);
        if($servico == null){
           return response()->json([
            'status'=> false,
            'message'=> "Usuário não encontrado"
           ]);
        }
        return response()->json([
            'status'=> true,
            'data'=> $servico
        ]);
    }

    public function pesquisarPorDescricao($descricao){
        $servico = Servico::find($descricao);
        if($servico == null){
           return response()->json([
            'status'=> false,
            'message'=> "Usuário não encontrado"
           ]);
        }
        return response()->json([
            'status'=> true,
            'data'=> $servico
        ]);
    }

}

