@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Item Variants</h1>

    <a href="{{ route('variants.create') }}"
       class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
        + Add New Variant
    </a>

    @if(session('success'))
        <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full mt-6 bg-white rounded shadow">
        <thead class="bg-gray-100 text-left text-sm">
            <tr>
                <th class="p-3">Item</th>
                <th class="p-3">Name</th>
                <th class="p-3">Quantity</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($variants as $variant)
            <tr class="border-t hover:bg-gray-50">
                <td class="p-3">{{ $variant->item->name }}</td>
                <td class="p-3">{{ $variant->name }}</td>
                <td class="p-3">{{ $variant->quantity }}</td>
                <td class="p-3">
                    <a href="{{ route('variants.show', $variant) }}"
                       class="text-blue-600 hover:underline">View</a>
                    |
                    <a href="{{ route('variants.edit', $variant) }}"
                       class="text-indigo-600 hover:underline">Edit</a>
                    |
                    <form action="{{ route('variants.destroy', $variant) }}"
                          method="POST" class="inline"
                          onsubmit="return confirm('Delete this variant?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
