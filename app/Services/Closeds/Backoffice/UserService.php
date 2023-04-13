<?php

namespace App\Services\Closeds\Backoffice;

use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;

class UserService extends BaseService
{
    public function teste(){
        dd($this->validate(showStockRequest::class));
    }


}
