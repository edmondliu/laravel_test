<?php

namespace App\Http\Controllers\Web;

use App\Model\CoreUserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

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
        Redis::set('www', 111111111111111);
        $name = $request->input('name', '');
        $password = $request->input('password', '');
        return Redis::get('www');
    }

    public function createUser(Request $request, CoreUserModel $coreUserModel)
    {
        $coreUserModel->core_user_name = $request->input('name');
        $coreUserModel->core_user_org = $request->input('org');
        $coreUserModel->display_name = $request->input('display_name');
        $coreUserModel->email = $request->input('email');
        $coreUserModel->core_user_status = $request->input('core_user_status');
        $coreUserModel->mobile = $request->input('mobile');
        $result = $coreUserModel->saveOrFail();
        return (string)$result;
    }

    public function getUser(Request $request, int $id)
    {
        return (new CoreUserModel())->where(['core_user_id' => $id])->first();
    }
}
