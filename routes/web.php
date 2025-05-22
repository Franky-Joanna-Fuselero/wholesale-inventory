<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemVariantController;
use App\Http\Controllers\POSOrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Models\Category;
use App\Models\Item;
use App\Models\ItemVariant;

// ✅ Public Routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login']);

// ✅ Protected Routes
Route::middleware('auth')->group(function () {

    // ✅ Dashboard (with HTMX handling)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Customers CRUD
    Route::resource('customers', CustomerController::class);

    // ✅ Inventory Main Page — use controller method only
    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');

    // Inventory CRUD
    Route::resource('categories', CategoryController::class);
    Route::resource('items', ItemController::class);
    Route::resource('variants', ItemVariantController::class);

    // POS checkout
    Route::post('/pos/checkout', [POSController::class, 'checkout'])->name('pos.checkout');

    // POS Page
    Route::get('/pos', [POSController::class, 'index'])->name('pos');
    Route::post('/pos/orders', [POSOrderController::class, 'store'])->name('pos.orders.store');

    // POS AJAX (HTMX)
    Route::post('/customers/lookup', [POSController::class, 'lookupCustomer'])->name('pos.lookup');
    Route::post('/receipt/add-item', [POSController::class, 'addItemToReceipt'])->name('pos.addItem');

    // Logout
    Route::post('/logout', function () {
        auth()->logout();
        return redirect('/login');
    })->name('logout');
});
