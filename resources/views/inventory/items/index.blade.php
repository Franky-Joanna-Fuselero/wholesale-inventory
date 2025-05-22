@extends('layouts.app')

@section('content')
<div class="p-6 max-w-6xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Items</h1>

    <a href="{{ route('items.create') }}" class="mb-4 inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">+ Add Item</a>

    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left">Name</th>
                    <th class="px-6 py-3 text-left">Category</th>
                    <th class="px-6 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($items as $item)
                <tr>
                    <td class="px-6 py-4">{{ $item->name }}</td>
                    <td class="px-6 py-4">{{ $item->category->name ?? 'Uncategorized' }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('items.show', $item) }}" class="text-gray-600 hover:underline">View</a>
                        <a href="{{ route('items.edit', $item) }}" class="ml-2 text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('items.destroy', $item) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Delete this item?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
