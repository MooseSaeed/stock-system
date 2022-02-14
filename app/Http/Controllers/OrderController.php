<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
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

        $attributes = request()->validate([
            'product_id' => 'required',
            'qty' => 'required'
        ]);

        $qty = request('qty');

        $success = Order::create($attributes);

        $this->deduct($success, $qty);

        return redirect('/');
    }

    public function destroy(Order $order)
    {

        $qty = $order->qty;

        $success = $order->delete();

        $this->increase($success, $qty);

        return redirect('/');
    }

    public function deduct($success, $qty)
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
    public function increase($success, $qty)
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
