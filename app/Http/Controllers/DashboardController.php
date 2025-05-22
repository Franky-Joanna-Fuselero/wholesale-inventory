<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use App\Models\ItemVariant;
use App\Models\Customer;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
    $data = [
        'totalCategories' => \App\Models\Category::count(),
        'totalItems' => \App\Models\Item::count(),
        'totalVariants' => \App\Models\ItemVariant::count(),
        'totalInventoryQuantity' => \App\Models\ItemVariant::sum('quantity'),
        'totalCustomers' => \App\Models\Customer::count(),
        'totalOrders' => \App\Models\Order::count(),
    ];

    if ($request->header('HX-Request')) {
        // Return only the inner content when HTMX is requesting
        return view('dashboard.partial', $data);
    }

    // Otherwise return the full page with layout
    return view('dashboard.index', $data);
    }

}
