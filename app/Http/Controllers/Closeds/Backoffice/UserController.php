<?php

namespace App\Http\Controllers\Closeds\Backoffice;

use Illuminate\Http\Request;
use App\Models\Closeds\Backoffice\User;
use App\Http\Controllers\BaseController;
use App\Services\Closeds\Backoffice\UserService;

class UserController extends BaseController
{
    public function __construct(Request $request)
    {
        $this->service = (new UserService())
            ->setData($request->all())
            ->setModel(User::class);
    }
}
