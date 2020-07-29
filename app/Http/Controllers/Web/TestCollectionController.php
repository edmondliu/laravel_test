<?php


namespace App\Http\Controllers\Web;


use App\Events\OrderShippedEvent;
use App\Jobs\ProcessPodcast;
use App\Model\CoreUserModel;
use App\Notifications\InvoicePaid;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Request;

class TestCollectionController extends BaseController
{
    use Notifiable;

    public function getCollection(Request $request)
    {
        return collect(['taylor', 'hello' , 'abigail', null])->toUpper()->reject(function ($name) {
            return empty($name);
        });
    }

    public function testEvent(Request $request)
    {
        $collection = collect(['taylor', 'hello' , 'abigail', null])->toUpper()->reject(function ($name) {
            return empty($name);
        });

        // 分发事件
        event(new OrderShippedEvent($collection->toArray()));
    }

    public function testJob(Request $request)
    {
        // 分发job
        ProcessPodcast::dispatch()->onConnection('redis')->onQueue('default');
        return 'ok dispatch job';
    }

    public function testNotifiable(Request $request)
    {
        $data = [
            'id' => 12,
            'amount' => 1222
        ];
        // 使用trait方式来通知
        return (New CoreUserModel())->sendNotice($data);
//        Notification::send($user, $data);
    }
}
