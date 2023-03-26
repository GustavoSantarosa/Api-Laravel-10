<?php

use Illuminate\Support\Facades\Route;

route::controller(UserController::class)->group(function () {
    route::get('/', 'index');
    route::get('/{id}', 'show');
    route::post('/', 'store');
    route::put('/{id}', 'update');
    route::delete('/{id}', 'destroy');
});
