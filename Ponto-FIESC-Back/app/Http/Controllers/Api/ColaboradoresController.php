<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreColaboradoresRequest;
use App\Http\Requests\UpdateColaboradoresRequest;
use App\Http\Resources\api\ColaboradoresCollection;
use App\Http\Resources\api\ColaboradoresResource;
use App\Models\Colaborador;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ColaboradoresController extends Controller
{
    public function index()
    {
        return new ColaboradoresCollection(Colaborador::paginate(10));
    }

    public function show(Colaborador $Colaboradore)
    {
        return new ColaboradoresResource($Colaboradore);
    }

    public function store(StoreColaboradoresRequest $request)
    {
        Colaborador::create($request->validated());
        return response()->json("Colaborador criado com sucesso", 201);
    }

    public function update(UpdateColaboradoresRequest $request, Colaborador $Colaboradore)
    {
        $dadosValidados = $request->validated();
        $dadosAtualizados = Arr::except($dadosValidados, ['cpf']); // Ignora o CPF na atualização
        $Colaboradore->update($dadosAtualizados);
        return response()->json("Colaborador editado com sucesso", 200);
    }

    public function destroy(Colaborador $Colaboradore)
    {
        $Colaboradore->delete();
        return response()->json("Colaborador excluido com sucesso", 200);
    }
}
