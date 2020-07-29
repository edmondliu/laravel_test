<?php

namespace App\Http\Controllers\Web;

use App\Model\CoreUserModel;
use App\Notifications\InvoicePaid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redis;
use phpDocumentor\Reflection\Types\Boolean;

class UserController extends BaseController
{
    use Notifiable;

    public function login(Request $request)
    {
        $name = $request->input('name', '');
        $password = $request->input('password', '');
        return view('frontend.login', []);
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
        return (string)$request;
    }

    public function getUser(Request $request, int $id)
    {
        return $result = CoreUserModel::where('core_user_id', $id)->get();
//        $result = CoreUserModel::where([
//            ['core_user_org', '=',  'lebbay']
//        ])->orWhere(function ($query) use($id) {
//            $query->where('core_user_id', '>', $id)->Where('core_user_status', 'NORMAL');
//        })->get();
        // 可以打印这两个之间的所有信息
        DB::enableQueryLog();
        // sql执行
        dd(DB::getQueryLog());
//        CoreUserModel::where(function ($query) {
//            $query->where('core_user_id');
//        })->orWhere(function ($query) {
//
//        })->get();
    }

    public function updateUser(Request $request, int $id, CoreUserModel $coreUserModel)
    {
        $update_data = $request->input('updateData');
        return $coreUserModel->where('core_user_id', $id)->update($update_data);
    }

    public function getUrl(Request $request)
    {
//        return url()->current(); // http://www.laravel_test.com/getUrl
//        return url()->full(); // http://www.laravel_test.com/getUrl?name=123&password=1232
        return url()->previous(); // 获取上次请求的url
    }

    public function testLog(Request $request)
    {
        Log::info('test log'); // 使用默认日志
        Log::channel('crontab')->info('haha log');// 使用配置的crontab日志
        return 'ok';
    }

    public function sendEmail(Request $request)
    {
        $title = '测试发邮件';
        $email = $request->input('email');
        Mail::send('email.send_email', ['name' => '刘学建', 'email' => $email], function($message) use ($email, $title){
            $message->to($email)->subject($title);
        });
    }

    public function catchRedis(Request $request)
    {
        $input = $request->input('input');
        Cache::put('name', $input, 600);
    }

    public function getCatchRedis(Request $request)
    {
        return Cache::get('name');
    }
}
