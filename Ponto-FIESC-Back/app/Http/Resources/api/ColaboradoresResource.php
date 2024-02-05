<?php

namespace App\Http\Resources\api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ColaboradoresResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'cpf' => $this->cpf,
            'data_nascimento' => $this->data_nascimento,
            'cargo_nome' => $this->cargo_nome,
            'funcao_nome' => $this->funcao_nome,
            'cargo_id' => $this->cargo_id,
            'funcao_id' => $this->funcao_id,
            'ativo' => $this->ativo,
            'data_admissao' => $this->data_admissao,
            'data_rescisao' => $this->data_rescisao,
            'usuario' => $this->usuario,
        ];
    }
}
