<?php

namespace App\Http\Controllers\Openeds;

use App\Services\HelloWorldService;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class HelloWorldController extends Controller
{
    public function get(): JsonResponse
    {
        $helloWorld = new HelloWorldService();

        return response()->json($helloWorld->get());
    }
}
