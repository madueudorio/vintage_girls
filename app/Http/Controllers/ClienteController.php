<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function store(ClienteFormRequest $request)
    {
        $cliente = Cliente::create([
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
            'senha' => Hash::make($request->senha)
        ]);
        return response()->json([
            "success" => true,
            "message" => "Cliente Cadrastado com sucesso",
            "data" => $cliente

        ], 200);
    }

    public function pesquisarPorId($id)
    {
        $cliente = Cliente::find($id);
        if ($cliente == null) {

            return response()->json([
                'status' => false,
                'messsage' => "cliente não encontrado"
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $cliente
        ]);
    }

    public function excluir($id)
    {
        $cliente = cliente::find($id);

        if (!isset($cliente)) {
            return response()->json([
                'status' => false,
                'message' => "Serviço não encontrado"
            ]);
        }


        $cliente->delete();
        return response()->json([
            'status' => true,
            'message' => "Serviço excluído com sucesso"
        ]);
    }
    public function pesquisarPorNome(Request $request)
    {
        $cliente = Cliente::where('nome', 'like', '%' . $request->nome . '%')->get();
        if (count($cliente) > 0) {
            return response()->json([
                'status' => true,
                'data' => $cliente
            ]);
        
        } else {
            return response()->json([
                'status' => false,
                'message' => "Nenhum cliente encontrado"
            ]);
        }
    }

    public function pesquisarCpf(Request $request)
    {
        $cliente = Cliente::where('cpf', 'like', '%' . $request->cpf . '%')->get();
        if (count($cliente) > 0) {
            return response()->json([
                'status' => true,
                'data' => $cliente
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Nenhum cliente encontrado"
            ]);
        }
    }

    public function pesquisarCelular(Request $request)
    {
        $cliente = Cliente::where('celular', 'like', '%' . $request->celular . '%')->get();
        if (count($cliente) > 0) {
            return response()->json([
                'status' => true,
                'data' => $cliente
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Nenhum cliente encontrado"
            ]);
        }
    }

    public function pesquisarEmail(Request $request)
    {
        $cliente = Cliente::where('email', 'like', '%' . $request->email . '%')->get();
        if (count($cliente) > 0) {
            return response()->json([
                'status' => true,
                'data' => $cliente
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Nenhum cliente encontrado"
            ]);
        }
    }

    public function update(Request $request)
    {
        $cliente = cliente::find($request->id);

        if (!isset($cliente)) {
            return response()->json([
                'status' => false,
                'message' => 'Cliente não encontrado'
            ]);
        }

        if (isset($request->nome)){
            $cliente->nome = $request->nome;
        }
       
        if (isset($request->celular)){                                                
            $cliente->celular = $request->celular;
        }

        if (isset($request->email)){
            $cliente->email = $request->email;
        }

        if (isset($request->cpf)){
            $cliente->cpf = $request->cpf;
        }

        if (isset($request->dataNascimento)){
            $cliente->dataNascimento = $request->dataNascimento;
        }

        if (isset($request->cidade)){
            $cliente->cidade = $request->cidade;
        }

        if (isset($request->estado)){
            $cliente->estado = $request->estado;
        }

        if (isset($request->pais)){
            $cliente->pais = $request->pais;
        }

        if (isset($request->rua)){
            $cliente->rua = $request->rua;
        }

        if (isset($request->numero)){
            $cliente->numero = $request->numero;
        }

        if (isset($request->bairro)){
            $cliente->bairro = $request->bairro;
        }

        if (isset($request->cep)){
            $cliente->cep = $request->cep;
        }

        if (isset($request->complemento)){
            $cliente->complemento = $request->complemento;
        }

        if (isset($request->senha)){
            $cliente->senha = $request->senha;
        }

        $cliente->update();

        return response()->json([
            'status' => true,
            'message' => 'Cliente atualizado.'
        ]);
    }
    public function retornarTodos()
    {
        $cliente = Cliente::all();
        return response()->json([
            'status' => true,
            'data' => $cliente
        ]);
    }
    public function recuperarSenha(Request $request)
    {

        $cliente = cliente::where('email', '=', $request->email)->first();

        if (!isset($cliente)) {
            return response()->json([
                'status' => false,
                'data' => "cliente não encontrado"

            ]);
        }

        return response()->json([
            'status' => true,
            'password' => Hash::make($cliente->email)
        ]);

    }
}