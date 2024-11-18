<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\PizzaSizeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\PizzaIngredientController;
use App\Http\Controllers\ExtraIngredientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderPizzaController;
use App\Http\Controllers\OrderExtraIngredientController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\RawMaterialController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PizzaRawMaterialController;

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

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('pizzas', PizzaController::class);
    Route::resource('pizza-sizes', PizzaSizeController::class);
    Route::resource('ingredients', IngredientController::class);
    Route::resource('pizza-ingredients', PizzaIngredientController::class);
    Route::resource('extra-ingredients', ExtraIngredientController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('order-pizzas', OrderPizzaController::class);
    Route::resource('order-extra-ingredients', OrderExtraIngredientController::class);
    Route::resource('branches', BranchController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('raw-materials', RawMaterialController::class);
    Route::resource('purchases', PurchaseController::class);
    Route::resource('pizza-raw-materials', PizzaRawMaterialController::class);
});



require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
