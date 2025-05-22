@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Item Details</h1>

    <div class="bg-white shadow-md rounded p-4 space-y-4">
        <p><strong>Name:</strong> {{ $item->name }}</p>
        <p><strong>Category:</strong> {{ $item->category->name ?? 'Uncategorized' }}</p>
    </div>

    <a href="{{ route('items.index') }}" class="inline-block mt-4 text-blue-600 hover:underline">← Back to Items</a>
</div>
@endsection
