<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('clients', App\Http\Controllers\ClientController::class);
Route::resource('employees', App\Http\Controllers\EmployeeController::class);
Route::resource('extra_ingredients', App\Http\Controllers\ExtraIngredientController::class);
Route::resource('purchases', App\Http\Controllers\PurchaseController::class);
Route::resource('pizzas', App\Http\Controllers\PizzaController::class);
Route::resource('pizza_size', App\Http\Controllers\PizzaSizeController::class);
Route::resource('pizza_raw_material', App\Http\Controllers\PizzaRawMaterialIngredientController::class);
Route::resource('ingredients', App\Http\Controllers\IngredientController::class);
Route::resource('order_pizza', App\Http\Controllers\OrderPizzaController::class);
Route::resource('order_extra_ingredient', App\Http\Controllers\OrderExtraIngredientController::class);
Route::resource('orders', App\Http\Controllers\OrderController::class);
Route::resource('suppliers', App\Http\Controllers\SupplierController::class);
Route::resource('branches', App\Http\Controllers\BranchController::class);
Route::resource('raw_materials', App\Http\Controllers\RawMaterialController::class);
Route::resource('pizza_ingredient', App\Http\Controllers\PizzaIngredientController::class);
