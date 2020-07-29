<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class BaseController extends Controller
{
    //
    public function __construct()
    {
        Collection::macro('toUpper', function () { // 自定义方法
            return $this->map(function ($item) {
                return strtoupper($item);
            });
        });
    }
}
