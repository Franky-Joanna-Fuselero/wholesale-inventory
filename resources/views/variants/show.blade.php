@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Variant Details</h1>

    <p><strong>Item:</strong> {{ $variant->item->name }}</p>
    <p><strong>Name:</strong> {{ $variant->name }}</p>
    <p><strong>Quantity:</strong> {{ $variant->quantity }}</p>

    <a href="{{ route('variants.edit', $variant) }}"
       class="inline-block mt-4 bg-indigo-600 text-white px-4 py-2 rounded">
        Edit Variant
    </a>
</div>
@endsection
