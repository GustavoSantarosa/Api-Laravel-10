<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class BaseController extends Controller
{
    protected $service;

    public function index(): JsonResponse
    {
        return response()->json($this->service->index());
    }

    public function show(int $id): JsonResponse
    {
        return response()->json($this->service->show($id));
    }

    public function store(): JsonResponse
    {
        return response()->json($this->service->store());
    }

    public function update(int $id): JsonResponse
    {
        return response()->json($this->service->update($id));
    }

    public function destroy(int $id): JsonResponse
    {
        if (!$this->service->destroy($id)) {
            return response()->json([
                "message" => "Não foi possivel deletar o registro {$id}!"
            ]);
        }

        return response()->json([
            "message" => "Registro {$id} deletado com sucesso!"
        ]);
    }
}
