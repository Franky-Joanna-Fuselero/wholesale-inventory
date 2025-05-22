@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto p-6">
    <h1 class="text-xl font-bold mb-4">Edit Item</h1>

    <form action="{{ route('items.update', $item) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium mb-1">Item Name</label>
            <input type="text" name="name" value="{{ old('name', $item->name) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
            @error('name')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block font-medium mb-1">Category</label>
            <select name="category_id" class="w-full border-gray-300 rounded-md shadow-sm" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Update
        </button>
    </form>
</div>
@endsection
