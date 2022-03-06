<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;

class NotificationController extends Controller
{
    /**
     * Display a listing of  the resource
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $notifications = $request->user()
            ->notifications()
            ->paginate();

        return NotificationResource::collection($notifications);
    }

    /**
     * 統計消息通知數量
     *
     * @param Request $request
     * @return void
     */
    public function stats(Request $request)
    {
        return response()->json([
            'unread_count' => $request->user()->notification_count,
        ]);
    }
}
