<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServidorFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "nome"=>"required|max:50",
            "email"=>"required|email",
            "senha"=>"required|min:4|max:8",
            "cpf" => "required|formato_cpf|cpf|unique:servidors|unique:alunos|unique:orientadors",
            "tipo_servidor" => "required|numeric"
        ];
    }


    public function messages(){
        return [
            "required" => "O campo :attribute é obrigatório.",
            "email" => "O email está no formato incorreto.",
            "nome.max" => "O campo nome não pode ter mais que 50 caracteres.",
            "senha.max" => "A senha não pode ter mais que 8 dígitos.",
            "senha.min" => "A senha não pode ter menos que 4 dígitos.",
            "unique" => "CPF já está em uso."
        ];
    }
}
