@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">
        {{ $customer->first_name }} {{ $customer->last_name }}
    </h2>

    <p><strong>Contact:</strong> {{ $customer->contact ?? 'N/A' }}</p>
    <p><strong>Email:</strong> {{ $customer->email ?? 'N/A' }}</p>
    <p><strong>Address:</strong> {{ $customer->address ?? 'N/A' }}</p>

    <hr class="my-6">

    <h3 class="text-xl font-semibold mb-2">Purchase History</h3>

    @if($customer->receipts->isEmpty())
        <p>No purchases found.</p>
    @else
        <ul class="space-y-4">
            @foreach($customer->receipts as $receipt)
                <li class="border rounded-lg p-4 shadow-sm">
                    <strong>Receipt #{{ $receipt->id }}</strong><br>
                    <span class="text-sm text-gray-600">Date: {{ $receipt->created_at->format('Y-m-d H:i') }}</span>
                    {{-- Add more fields here when we flesh out the receipts --}}
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
