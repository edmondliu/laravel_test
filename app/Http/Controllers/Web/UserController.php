<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends BaseController
{

    public function test()
    {
        return ['status' => 1];
    }

    public function index()
    {
        return ['haha'];
    }

    public function login(Request $request)
    {
        $name = $request->input('name', '');
        $password = $request->input('password', '');
        return $name;
    }
}
