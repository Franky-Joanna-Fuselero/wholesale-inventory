<div class="table-container">
    <!-- Heading -->
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Customer List</h1>

    <!-- Controls Row -->
    <div class="top-controls">
        <!-- LEFT: Add Customer -->
        <div>
            <a href="{{ route('customers.create') }}" class="btn-primary">
                + Add Customer
            </a>
        </div>

        <!-- RIGHT: Export / Filter / Range -->
        <div class="button-group">
            <a href="{{ route('customers.download') }}" class="btn-outline" target="_blank">
    Export to PDF
</a>

            <button class="btn-outline">
                Filter
            </button>

            <select class="select-outline">
                <option value="daily">Daily</option>
                <option value="weekly" selected>Weekly</option>
                <option value="monthly">Monthly</option>
            </select>
        </div>
    </div>

    <!-- Table -->
    <table class="clean-table">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($customers as $customer)
            <tr onclick="window.location='{{ route('customers.show', $customer->id) }}'">
                <td><span class="badge green">{{ str_pad($customer->id, 6, '0', STR_PAD_LEFT) }}</span></td>
                <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                <td>{{ $customer->contact }}</td>
                <td>{{ $customer->email }}</td>
                <td><span class="badge green">Active</span></td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center py-6 text-gray-400">No customers found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
