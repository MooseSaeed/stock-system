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

        foreach ($ingredients as $ingredient) {

            // Check if notification already sent for this particular ingredient

            if ($ingredient->notification_sent === 'yes') {
                return redirect('/');
            } else {

                // Check if ingredient quantity in stock less than 50%

                if ($ingredient->qty <= $ingredient->half_qty) {

                    // Update notification sent and fire the mail to notify the user

                    DB::table('ingredients')->where('id', $ingredient->id)->update(
                        ['notification_sent' => 'yes']
                    );

                    SendMailController::sendnotif();
                }
            }
        }
    }
}
