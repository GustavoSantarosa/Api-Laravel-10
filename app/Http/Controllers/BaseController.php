<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use GustavoSantarosa\HandlerBasicsExtension\Traits\ApiResponseTrait;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

class BaseController extends Controller
{
    use ApiResponseTrait;

    protected $service;

    public function index(): JsonResponse
    {
        return $this->apiResponse(
            message: "Método não implementado!",
            status: Response::HTTP_NOT_IMPLEMENTED
        );

        return $this->apiResponse(
            data: $this->service
                ->disablePagination()
                ->index(),
            message: "Listagem de registros",
        );
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
