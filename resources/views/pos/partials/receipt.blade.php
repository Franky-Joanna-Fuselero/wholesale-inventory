<div class="receipt-header mb-4">
    <h2 class="text-lg font-bold text-yellow-400">🧾 Sales Receipt</h2>
    <p class="text-sm text-gray-300">Date: {{ $time }}</p>
</div>

<table class="w-full text-sm text-white border-separate border-spacing-y-1">
    <thead>
        <tr class="text-left border-b border-gray-600">
            <th class="pr-4">Item</th>
            <th class="pr-4">Qty</th>
            <th class="pr-4">Price</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr class="bg-blue-800/50 rounded">
            <td class="pr-4">{{ $item }}</td>
            <td class="pr-4">{{ $qty }}</td>
            <td class="pr-4">₱{{ number_format($price, 2) }}</td>
            <td>₱{{ number_format($total, 2) }}</td>
        </tr>
    </tbody>
</table>
