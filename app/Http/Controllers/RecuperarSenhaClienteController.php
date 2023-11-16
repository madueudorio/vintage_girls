<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecuperarSenhaClienteController extends Controller
{
    {

        $profissional = Profissional::where('cpf', '=', $request->cpf)->first();

        if (!isset($profissional)) {
            return response()->json([
                'status' => false,
                'data' => "Profissional não encontrado"

            ]);
        }

        return response()->json([
            'status' => true,
            'password' => Hash::make($profissional->cpf)
        ]);

    }
}
