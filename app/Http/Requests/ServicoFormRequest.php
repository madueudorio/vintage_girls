<?php

namespace App\Http\Requests;

use Dotenv\Validator;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ServicoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome'=> 'required|max:80|min:5',
            'descricao'=>'required|max:200|min:10',
            'duracao'=>'required',
            'preco'=>'required'
        ];
    }
   public function failedValidation(ValidationValidator $validator){
     throw new HttpResponseException(response()->json([
        'success'=>false,
        'error'=>$validator->errors()
     ]));
   }
   public function messages(){
    return [
        'nome.required'=>'O campo nome é obrigatório',
        'nome.max'=>'O campo nome deve conter no máximo 80 caracteres',
        'nome.max'=>'O campo nome deve conter no mínimo 5 caracteres',
        'descricao.required'=>'descricao obrigatório',
        'descricao.max'=>'Descrição deve conter no máximo 200 caracteres',
        'descricao.min'=>'Descrição deve conter no mínimo 10 caracteres',
        'duracao.required'=>'Duração obrigátorio',
        'preco.required'=>'Preço obrigátorio'
    ];
}
}

