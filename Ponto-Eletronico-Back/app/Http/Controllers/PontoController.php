<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePontoRequest;
use App\Models\RegistroPonto;
use Illuminate\Http\Request;

class PontoController extends Controller
{
    public function registrar(StorePontoRequest $request) {
        $registroponto = new RegistroPonto();

        $registroponto->colaborador_id = $request->colaborador_id;
        $registroponto->data = $request->data;
        $registroponto->horario = $request->horario;

        $registroponto->save();

        // StorePontoRequest::create($request->validated());
        return response()->json("Ponto registrado com sucesso", 200);
    }

    public function buscar(Request $request) {

        $Pontos = RegistroPonto::where("colaborador_id", $request->matricula)
            ->where("data", "=", date('Y-m-d'))
            ->get('horario');
        
        return response()->json($Pontos, 200);
    }
}
