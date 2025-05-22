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
    // Dashboard (with HTMX handling)
    Route::get('/dashboard', function (Request $request) {
        if ($request->header('HX-Request')) {
            return view('dashboard.partial');
        } else {
            return view('dashboard');
        }
    })->name('dashboard');

    // Customers CRUD
    Route::resource('customers', CustomerController::class);
    Route::get('/customers/download', [CustomerController::class, 'download'])->name('customers.download');

    // Inventory Main Page
    Route::get('/inventory', function () {
        return view('inventory.index');
    })->name('inventory');

    // Inventory CRUD
    Route::resource('categories', CategoryController::class);
    Route::resource('items', ItemController::class);
    Route::resource('variants', ItemVariantController::class);

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
