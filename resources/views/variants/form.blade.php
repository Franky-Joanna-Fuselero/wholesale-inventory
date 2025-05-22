@csrf

<div class="mb-4">
    <label class="block font-semibold">Item</label>
    <select name="item_id" class="w-full border rounded px-3 py-2">
        @foreach($items as $item)
            <option value="{{ $item->id }}"
                {{ (old('item_id', $variant->item_id ?? '') == $item->id) ? 'selected' : '' }}>
                {{ $item->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-4">
    <label class="block font-semibold">Variant Name</label>
    <input type="text" name="name" value="{{ old('name', $variant->name ?? '') }}"
           class="w-full border rounded px-3 py-2" required>
</div>

<div class="mb-4">
    <label class="block font-semibold">Quantity</label>
    <input type="number" name="quantity" value="{{ old('quantity', $variant->quantity ?? 0) }}"
           class="w-full border rounded px-3 py-2" required>
</div>

<button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
    Save Variant
</button>
