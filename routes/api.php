<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\api\ClientController;
use App\Http\Controllers\api\EmployeeController;
use App\Http\Controllers\api\PizzaController;
use App\Http\Controllers\api\PizzaSizeController;
use App\Http\Controllers\api\IngredientController;
use App\Http\Controllers\PizzaIngredientController;
use App\Http\Controllers\api\ExtraIngredientController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\OrderPizzaController;
use App\Http\Controllers\api\OrderExtraIngredientController;
use App\Http\Controllers\api\BranchController;
use App\Http\Controllers\api\SupplierController;
use App\Http\Controllers\api\RawMaterialController;
use App\Http\Controllers\api\PurchaseController;
use App\Http\Controllers\api\PizzaRawMaterialController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Http\Request;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

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

// Rutas para clientes
Route::middleware(['auth', 'role:cliente'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');  // Vista principal para clientes
    Route::get('/mi-cuenta', [ClientController::class, 'profile'])->name('mi-cuenta'); // Perfil del cliente
    Route::get('/mis-pedidos', [ClientController::class, 'orders'])->name('mis-pedidos'); // Historial de pedidos
    Route::get('/realizar-pedido', [OrderController::class, 'create'])->name('realizar-pedido'); // Crear un nuevo pedido
});

// Rutas para empleados
Route::middleware(['auth', 'role:empleado'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); // Vista principal para empleados
    Route::get('/pedidos', [OrderController::class, 'manage'])->name('pedidos'); // Gestionar pedidos
    Route::get('/gestionar-pizzas', [PizzaController::class, 'index'])->name('gestionar-pizzas'); // Gestionar pizzas
    Route::get('/gestionar-inventario', [InventoryController::class, 'index'])->name('gestionar-inventario'); // Gestionar inventario
});
