<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    use HasFactory;

    protected $table = 'colaboradores';

    protected $fillable = ['nome', 'email', 'telefone', 'cpf', 'data_nascimento', 'data_admissao', 'data_rescisao', 'cargo_id', 'funcao_id', 'ativo', 'usuario'];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_id');
    }

    public function funcao()
    {
        return $this->belongsTo(Funcao::class, 'funcao_id');
    }

    public function horarios() {
        return $this->hasOne(Horario::class);
    }
    
    public function getCargoNomeAttribute()
    {
        return $this->cargo->nome;
    }

    public function getFuncaoNomeAttribute()
    {
        return $this->funcao->nome;
    }

}
