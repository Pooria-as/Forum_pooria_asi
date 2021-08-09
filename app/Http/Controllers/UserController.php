<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function notification()
    {
        Auth::user()->unreadNotifications->markAsRead();

        $notifications=auth()->user()->notifications;
        return view("notifications.index",compact("notifications"));
    }
}
