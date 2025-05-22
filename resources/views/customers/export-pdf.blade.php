<h1>Customer List (PDF)</h1>

<p>Total Customers: {{ $customers->count() }}</p>

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($customers as $customer)
        <tr>
            <td>{{ $customer->id }}</td>
            <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
            <td>{{ $customer->contact }}</td>
            <td>{{ $customer->email }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="4">No customers found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
