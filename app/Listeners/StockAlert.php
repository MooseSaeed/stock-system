<?php

namespace App\Listeners;

use App\Events\StockNotif;
use App\Http\Controllers\SendMailController;
use App\Models\Ingredient;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StockAlert
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\StockNotif  $event
     * @return void
     */
    public function handle(StockNotif $event)
    {
        $userinfo = $event->user;

        $ingredients = Ingredient::all();

        if ($userinfo->notified === 'yes') {

            dd('user already notified');
        } else {
            foreach ($ingredients as $ingredient) {
                if ($ingredient->qty <= $ingredient->half_qty) {

                    $saveHistory = DB::table('users')->where('id', 1)->update(
                        ['notified' => 'yes']
                    );

                    SendMailController::sendnotif();

                    return $saveHistory;
                }
            }
        }
    }
}
