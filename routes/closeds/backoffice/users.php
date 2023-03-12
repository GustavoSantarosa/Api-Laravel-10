<?php

use Illuminate\Support\Facades\Route;

route::controller(HelloWorldController::class)->group(function () {
    route::get('/', 'get');
});
