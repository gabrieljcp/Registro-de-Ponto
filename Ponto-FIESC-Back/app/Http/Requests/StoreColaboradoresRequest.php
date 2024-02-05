<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreColaboradoresRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => ['required', 'regex:/^[A-Z][a-zA-Z]+\s[A-Z][a-zA-Z]+$/', 'max:255'], // Valida formato Nome Sobrenome com iniciais maiúsculas
            'email' => ['required','email', Rule::unique('colaboradores')],// Valida formato de e-mail e unicidade no banco de dados
            'cpf' => ['required','cpf',Rule::unique('colaboradores')], // Valida formato de CPF e unicidade
            'telefone' => ['required', 'min:3', 'max:20'],
            'data_nascimento' => ['required', 'date', 'before:today'],
            'data_admissao' => ['required', 'date'],
            'data_rescisao' => ['nullable', 'date', 'after_or_equal:data_admissao'], // Permite nulo e valida se é após ou na data de admissão
            'ativo' => ['boolean'], // Campo calculado, não precisa ser enviado no request
            'cargo_id' => ['required', 'exists:cargos,id'], // ID referente ao cargo da tabela 'cargos'
            'funcao_id' => ['required', 'exists:funcoes,id'], // ID referente a função da tabela 'funcoes'
            // 'usuario' é gerado no backend e não precisa ser enviado no request
        ];
    }
}
