<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use App\Models\ItemVariant;

class InventoryController extends Controller
{
    public function index(Request $request)
{
    $data = [
        'categoryCount' => Category::count(),
        'itemCount' => Item::count(),
        'variantCount' => ItemVariant::count(),
        'totalStock' => ItemVariant::sum('quantity')
    ];

    // Return HTMX partial if this is an HTMX request
    if ($request->header('HX-Request')) {
        return view('partials.inventory', $data);
    }

    // Otherwise return full layout view
    return view('inventory.index', $data);
}

}
