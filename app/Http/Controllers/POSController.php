<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class POSController extends Controller
{
    // Mock product data (can be replaced by DB model later)
    private $items = [
        ['name' => 'Item 1', 'price' => 10.00],
        ['name' => 'Item 2', 'price' => 25.00],
        ['name' => 'Item 3', 'price' => 7.50],
    ];

    // Mock customer data
    private $customers = [
        'john doe' => [
            'contact' => '09171234567',
            'address' => '123 Sample Street',
            'email' => 'john@example.com',
        ]
    ];

    /**
     * Show the POS page.
     */
    public function index(Request $request)
    {
        $items = $this->items;

        // 🧠 HTMX requests should receive partial content only
        if ($request->header('HX-Request')) {
            return view('pos.content', compact('items'));
        }

        // Full page render
        return view('pos.index', compact('items'));
    }

    /**
     * Lookup a customer and return HTMX partial.
     */
    public function lookupCustomer(Request $request)
    {
        $name = strtolower(trim($request->input('name')));
        $customer = $this->customers[$name] ?? null;

        return view('pos.partials.customer-info', compact('customer'));
    }

    /**
     * Add item to receipt and return HTMX-rendered receipt.
     */
    public function addItemToReceipt(Request $request)
    {
    $item = $request->input('item');
    $qty = max(1, (int) $request->input('quantity'));
    $price = (float) $request->input('price');

    $total = $qty * $price;
    $time = now()->format('Y-m-d H:i:s');

    return view('pos.partials.receipt', compact('item', 'qty', 'price', 'total', 'time'));
    }   

}
