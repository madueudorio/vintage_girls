<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfissionalFormRequest;
use App\Models\Profissional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfissionalController extends Controller
{
    public function store(ProfissionalFormRequest $request)
    {
        $profissional = Profissional::create([
            'nome' => $request->nome,
            'celular' => $request->celular,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'dataNascimento' => $request->dataNascimento,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'pais' => $request->pais,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cep' => $request->cep,
            'complemento' => $request->complemento,
            'salario' => $request->salario,
            'senha' => Hash::make($request->senha)
        ]);
        return response()->json([
            "success" => true,
            "message" => "Profissional cadrastado com sucesso",
            "data" => $profissional

        ], 200);
    }
    public function pesquisarPorId($id)
    {
        $profissional = Profissional::find($id);
        if ($profissional == null) {

            return response()->json([
                'status' => false,
                'messsage' => "profissional não encontrado"
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $profissional
        ]);
    }
    public function excluir($id)
    {
        $profissional = profissional::find($id);

        if (!isset($profissional)) {
            return response()->json([
                'status' => false,
                'message' => "Serviço não encontrado"
            ]);
        }


        $profissional->delete();
        return response()->json([
            'status' => true,
            'message' => "Serviço excluído com sucesso"
        ]);
    }

    public function pesquisarPorNome(Request $request)
    {
        $profissional = Profissional::where('nome', 'like', '%' . $request->nome . '%')->get();
        if (count($profissional) > 0) {
            return response()->json([
                'status' => true,
                'data' => $profissional
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Nenhum profissional encontrado"
            ]);
        }
    }

    public function update(Request $request)
    {
        $profissional = Profissional::find($request->id);

        if (!isset($profissional)) {
            return response()->json([
                'status' => false,
                'message' => 'Profissional não encontrado'
            ]);
        }
        if (isset($request->nome)){
            $profissional->nome = $request->nome;
        }
       
        if (isset($request->celular)){                                                
            $profissional->celular = $request->celular;
        }

        if (isset($request->email)){
            $profissional->email = $request->email;
        }

        if (isset($request->cpf)){
            $profissional->cpf = $request->cpf;
        }

        if (isset($request->dataNascimento)){
            $profissional->dataNascimento = $request->dataNascimento;
        }

        if (isset($request->cidade)){
            $profissional->cidade = $request->cidade;
        }

        if (isset($request->estado)){
            $profissional->estado = $request->estado;
        }

        if (isset($request->pais)){
            $profissional->pais = $request->pais;
        }

        if (isset($request->rua)){
            $profissional->rua = $request->rua;
        }

        if (isset($request->numero)){
            $profissional->numero = $request->numero;
        }

        if (isset($request->bairro)){
            $profissional->bairro = $request->bairro;
        }

        if (isset($request->cep)){
            $profissional->cep = $request->cep;
        }

        if (isset($request->complemento)){
            $profissional->complemento = $request->complemento;
        }

        if (isset($request->senha)){
            $profissional->senha = $request->senha;
        }

        if (isset($request->salario)){
            $profissional->salario = $request->salario;
        }

        $profissional->update();

        return response()->json([
            'status' => true,
            'message' => 'Profissional atualizado.'
        ]);
    }

    public function retornarTodos()
    {
        $profissional = Profissional::all();
        return response()->json([
            'status' => true,
            'data' => $profissional
        ]);
    }
    public function recuperarSenha(Request $request)
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
