<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloWorldController;

route::controller(HelloWorldController::class)->group(function () {
    route::get('/', 'get');
});
