<?php

namespace App\Http\Controllers;
use App\Services\HelloWorldService;
use Symfony\Component\HttpFoundation\JsonResponse;

class HelloWorldController extends Controller
{
    public function get(): JsonResponse
    {
        $helloWorld = new HelloWorldService();

        return response()->json($helloWorld->get());
    }
}
