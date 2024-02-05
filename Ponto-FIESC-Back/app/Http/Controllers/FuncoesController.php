<?php

namespace App\Http\Controllers;

use App\Models\Funcao;
use Illuminate\Http\Request;

class FuncoesController extends Controller
{
    public function index() {
        return Funcao::get(['id', 'nome']);
    }
    
}
