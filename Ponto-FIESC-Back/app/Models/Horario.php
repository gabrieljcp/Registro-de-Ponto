<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $table = 'horarios';

    protected $fillable = ['entrada_segunda', 'entrada_almoco_segunda', 'saida_almoco_segunda', 'saida_segunda', 'entrada_terca', 'entrada_almoco_terca', 'saida_almoco_terca', 'saida_terca', 'entrada_quarta', 'entrada_almoco_quarta', 'saida_almoco_quarta', 'saida_quarta', 'entrada_quinta', 'entrada_almoco_quinta', 'saida_almoco_quinta', 'saida_quinta', 'entrada_sexta', 'entrada_almoco_sexta', 'saida_almoco_sexta', 'saida_sexta'];

    public function colaborador() {
        return $this->belongsTo(Colaborador::class);
    }
}
