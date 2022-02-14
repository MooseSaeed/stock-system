<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

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

        Order::create($attributes);

        return redirect('/');
    }
}
