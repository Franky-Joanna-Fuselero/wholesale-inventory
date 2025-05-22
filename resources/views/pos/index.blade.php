@extends('layouts.app')

@section('head')
    <script src="https://unpkg.com/htmx.org@1.9.3"></script>
    <script src="{{ asset('js/pos.js') }}" defer></script>
@endsection

@section('content')
<form method="POST" action="{{ route('pos.orders.store') }}" id="order-form">
    @csrf
    <input type="hidden" name="customer_id" id="customer_id" value="">

    <div class="max-w-7xl mx-auto px-6 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- LEFT PANEL -->
            <div class="md:col-span-2 bg-white p-6 rounded-2xl shadow-md space-y-6">

                <!-- Customer Form -->
                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <input type="text" name="name" placeholder="Customer Full Name"
                            hx-post="{{ route('pos.lookup') }}"
                            hx-trigger="keyup changed delay:500ms"
                            hx-target="#customer-info"
                            hx-swap="innerHTML"
                            class="input-field" />
                    </div>

                    <div id="customer-info" class="grid grid-cols-3 gap-4">
                        @include('pos.partials.customer-info')
                        <!-- This partial should set #customer_id -->
                    </div>
                </div>

                <!-- Item List -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">📦 Item List</h3>
                    <div class="border rounded-lg p-4 bg-gray-50">
                        @include('pos.partials.item-list', ['items' => $items])
                    </div>
                </div>

            </div>

            <!-- RIGHT PANEL -->
            <div class="bg-white p-6 rounded-2xl shadow-md flex flex-col space-y-6">

                <!-- Receipt Display -->
                <div class="border rounded-lg p-4 bg-gray-50 flex-1 overflow-y-auto">
                    <h3 class="text-lg font-semibold text-gray-700 mb-3">🧾 Receipt</h3>
                    <div id="receipt">
                        <!-- HTMX-rendered item summary and hidden fields go here -->
                    </div>
                </div>

                <!-- Quantity -->
                <div class="flex items-center gap-3">
                    <label for="quantity" class="text-sm font-medium text-gray-700">Quantity:</label>
                    <input id="quantity" name="quantity" type="number" min="1" value="1"
                        class="input-field w-24" />
                </div>

                <!-- Action Buttons -->
                <div class="grid grid-cols-2 gap-3">
                    <button
                        hx-post="{{ route('pos.addItem') }}"
                        hx-include="[name='quantity'], input[name='selected_item']:checked"
                        hx-target="#receipt"
                        hx-swap="innerHTML"
                        class="btn btn-blue">
                        ➕ Add Item
                    </button>
                    <button type="button" onclick="voidItem()" class="btn btn-red">
                        ❌ Void Item
                    </button>
                    <button type="submit" class="btn btn-green col-span-2">
                        💰 Pay
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
