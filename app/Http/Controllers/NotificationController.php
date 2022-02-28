<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $notifications = Auth::user()->notifications()->get();

        if ($request->ajax()) {
            // 標記為已讀
            Auth::user()->markAsRead();
            return view('notifications.index', [
                'notifications' => $notifications,
            ]);
        }
    }
}
