<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaFormRequest;
use App\Http\Requests\ProfissionalFormRequest;
use App\Models\Agenda;
use App\Models\Profissional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgendaController extends Controller
{
    public function store(AgendaFormRequest $request){
        $Agenda = Agenda::create([
           'profissional_id'=> $request->profissional_id,
           'cliente_id'=> $request->cliente_id,
           'servico_id'=> $request->servico_id,
           'cpf'=> $request->cpf,
           'data_hora'=> $request->data_hora,
           'tipo_pagamento'=> $request->tipo_pagamento,
           'valor'=> $request->valor,
         
        ]);
           return response()->json([
               "success" => true,
               "message" =>"Profissional cadrastado com sucesso",
               "data" => $Agenda
   
           ],200);
       }

}