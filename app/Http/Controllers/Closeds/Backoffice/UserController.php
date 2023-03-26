<?php

namespace App\Http\Controllers\Closeds\Backoffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Closeds\Backoffice\UserService;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        $userService = new UserService();

        return response()->json($userService->index());
    }

    public function show(int $id): JsonResponse
    {
        $userService = new UserService();

        return response()->json($userService->show($id));
    }

    public function store(Request $request): JsonResponse
    {
        $userService = new UserService();

        return response()->json($userService->store($request->all()));
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $userService = new UserService();

        return response()->json($userService->update($request->all(), $id));
    }

    public function destroy(int $id): JsonResponse
    {
        $userService = new UserService();

        if(!$userService->destroy($id)){
            return response()->json([
                "message" => "Não foi possivel deletar o registro {$id}!"
            ]);
        }

        return response()->json([
            "message" => "Registro {$id} deletado com sucesso!"
        ]);
    }
}
