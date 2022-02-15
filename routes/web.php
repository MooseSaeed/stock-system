<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\SendMailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [OrderController::class, 'index']);
Route::post('/neworder', [OrderController::class, 'store']);
Route::delete('/orders/{order:id}', [OrderController::class, 'destroy']);

Route::get('send/email', [SendMailController::class, 'sendnotif']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
