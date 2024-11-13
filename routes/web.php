<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('pizzas', [AdminController::class, 'managePizzas'])->name('pizzas.index');
    Route::get('pizzas/create', [AdminController::class, 'createPizza'])->name('pizzas.create');
    Route::post('pizzas', [AdminController::class, 'storePizza'])->name('pizzas.store');
    Route::get('orders', [AdminController::class, 'manageOrders'])->name('orders.index');
    Route::patch('orders/{id}', [AdminController::class, 'updateOrderStatus'])->name('orders.update');
    Route::delete('orders/{id}', [AdminController::class, 'deleteOrder'])->name('orders.delete');
});

Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
    Route::get('pizzas', [UserController::class, 'showPizzas'])->name('pizzas.index');
    Route::post('orders', [UserController::class, 'orderPizza'])->name('orders.store');
    Route::get('orders', [UserController::class, 'showOrderStatus'])->name('orders.index');
});



require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
