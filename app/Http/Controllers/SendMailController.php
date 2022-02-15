<?php

namespace App\Http\Controllers;

use App\Models\User;
use Notification;
use App\Notifications\StockNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class SendMailController extends Controller
{
    public static function sendnotif()
    {
        $user = User::all();

        $details = [
            'greeting' => 'Hi Fantastic Owner Man',
            'body' => 'Your stock is below 50%',
            'actiontext' => 'Go fill it',
            'actionurl' => '/',
            'lastline' => 'Thanks for nothing'
        ];

        FacadesNotification::send($user, new StockNotification($details));

        dd('Done');
    }
}
