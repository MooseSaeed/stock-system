<?php

namespace Tests\Feature;

use App\Models\Ingredient;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class OrderPlacedTest extends TestCase
{

    use RefreshDatabase;

    public function test_it_submites_order()
    {
        $response = $this->post('/neworder', [
            'product_id' => '1',
            'qty' => '1'
        ]);

        $response->assertRedirect('/');
    }

    public function test_it_updates_stock_on_order()
    {

        $beefStockQty = 20000;
        $cheeseStockQty = 5000;
        $onionStockQty = 1000;

        Ingredient::factory(1)->create([
            'name' => 'beef',
            'qty' => $beefStockQty,
        ]);
        Ingredient::factory(1)->create([
            'name' => 'cheese',
            'qty' => $cheeseStockQty,
        ]);
        Ingredient::factory(1)->create([
            'name' => 'onion',
            'qty' => $onionStockQty,
        ]);

        $orderQty = 1;


        Order::create([
            'product_id' => 1,
            'qty' => $orderQty
        ]);

        $deductBeef = 150 * $orderQty;
        $deductCheese = 30 * $orderQty;
        $deductOnion = 20 * $orderQty;

        DB::table('ingredients')->where(['id' => 1])->decrement('qty', $deductBeef);
        DB::table('ingredients')->where(['id' => 2])->decrement('qty', $deductCheese);
        DB::table('ingredients')->where(['id' => 3])->decrement('qty', $deductOnion);


        $this->assertDatabaseHas('ingredients', [
            'qty' => $onionStockQty - $deductOnion
        ]);
    }
}
