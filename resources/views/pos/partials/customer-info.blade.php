<input type="text" name="contact" placeholder="Contact Number" value="{{ $customer['contact'] ?? '' }}">
<input type="text" name="address" placeholder="Delivery Address" value="{{ $customer['address'] ?? '' }}">
<input type="email" name="email" placeholder="Email" value="{{ $customer['email'] ?? '' }}">
@if(isset($customer))
    <div class="col-span-3">
        <p class="text-sm text-gray-600">👤 <strong>{{ $customer->name }}</strong></p>
        <p class="text-sm text-gray-500">📞 {{ $customer->phone ?? 'No phone' }}</p>
        <input type="hidden" id="customer_id" name="customer_id" value="{{ $customer->id }}">
    </div>
@endif
