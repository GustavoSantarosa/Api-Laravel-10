<?php

use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function () {
    //Route::post('/', 'import');
    Route::resource('', UserController::class)->except([
        'create',
        'edit',
    ])->parameters([
        '' => 'id',
    ]);
});
