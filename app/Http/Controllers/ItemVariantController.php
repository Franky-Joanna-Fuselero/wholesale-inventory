<?php

namespace App\Http\Controllers;

use App\Models\ItemVariant;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $variants = ItemVariant::with('item')->get();
        return view('inventory.variants.index', compact('variants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Item::all();
        return view('inventory.variants.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'item_id' => 'required|exists:items,id',
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
        ]);

        ItemVariant::create($data);

        return redirect()->route('variants.index')
                         ->with('success', 'Item Variant created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemVariant $variant)
    {
        return view('inventory.variants.show', compact('variant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemVariant $variant)
    {
        $items = Item::all();
        return view('inventory.variants.edit', compact('variant', 'items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemVariant $variant)
    {
        $data = $request->validate([
            'item_id' => 'required|exists:items,id',
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
        ]);

        $variant->update($data);

        return redirect()->route('variants.index')
                         ->with('success', 'Item Variant updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemVariant $variant)
    {
        $variant->delete();

        return redirect()->route('variants.index')
                         ->with('success', 'Item Variant deleted successfully.');
    }
}
