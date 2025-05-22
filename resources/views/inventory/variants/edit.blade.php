@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto p-6">
    <h1 class="text-xl font-bold mb-4">Edit Variant</h1>

    <form action="{{ route('variants.update', $variant) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium mb-1">Variant Name</label>
            <input type="text" name="name" value="{{ old('name', $variant->name) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
            @error('name')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block font-medium mb-1">Item</label>
            <select name="item_id" class="w-full border-gray-300 rounded-md shadow-sm" required>
                @foreach($items as $item)
                    <option value="{{ $item->id }}" {{ $variant->item_id == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
            @error('item_id')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block font-medium mb-1">Quantity</label>
            <input type="number" name="quantity" value="{{ old('quantity', $variant->quantity) }}" class="w-full border-gray-300 rounded-md shadow-sm" required min="0">
            @error('quantity')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Update
        </button>
    </form>
</div>
@endsection
