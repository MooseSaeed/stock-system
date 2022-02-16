<?php

namespace App\Http\Controllers;

use App\Events\StockNotif;
use App\Models\Ingredient;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        return view('orders.index', [
            'ingredients' => Ingredient::all(),
            'products' => Product::all(),
            'orders' => Order::all()
        ]);
    }
    public function store()
    {
        // Validate request
        $attributes = request()->validate([
            'product_id' => 'required',
            'qty' => 'required'
        ]);

        // Catching quantity input
        $qty = request('qty');

        // Create Order
        $success = Order::create($attributes);

        // Update stock with inout quantity upon order success
        $this->stockUpdateOnOrder($success, $qty);

        // Firing an event to send e-mails conditionally
        $user = Auth::user();
        event(new StockNotif($user));

        return redirect('/');
    }

    public function destroy(Order $order)
    {
        // Catching quantity of the selected order
        $qty = $order->qty;

        // Delete order
        $success = $order->delete();

        // Update stock with inout quantity upon order delete
        $this->stockUpdateOnDelete($success, $qty);

        return redirect('/');
    }

    public function stockUpdateOnOrder($success, $qty)
    {

        if ($success) {

            $deductBeef = 150 * $qty;
            $deductCheese = 30 * $qty;
            $deductOnion = 20 * $qty;

            DB::table('ingredients')->where(['id' => 1])->decrement('qty', $deductBeef);
            DB::table('ingredients')->where(['id' => 2])->decrement('qty', $deductCheese);
            DB::table('ingredients')->where(['id' => 3])->decrement('qty', $deductOnion);
        }
    }
    public function stockUpdateOnDelete($success, $qty)
    {
        if ($success) {

            $addBeef = 150 * $qty;
            $addCheese = 30 * $qty;
            $addOnion = 20 * $qty;

            DB::table('ingredients')->where(['id' => 1])->increment('qty', $addBeef);
            DB::table('ingredients')->where(['id' => 2])->increment('qty', $addCheese);
            DB::table('ingredients')->where(['id' => 3])->increment('qty', $addOnion);
        }
    }
}
