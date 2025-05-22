<div class="p-6 bg-white shadow-md rounded-lg">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Customers</h1>
        <a href="{{ route('customers.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Add New Customer
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 p-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 border border-gray-300">
            <thead class="bg-gray-100 text-sm text-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left">Name</th>
                    <th class="px-4 py-2 text-left">Contact</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-800 text-sm bg-white divide-y divide-gray-200">
                @foreach($customers as $customer)
                    <tr>
                        <td class="px-4 py-2">
                            <a href="{{ route('customers.show', $customer->id) }}" class="text-blue-600 hover:underline">
                                {{ $customer->first_name }} {{ $customer->last_name }}
                            </a>
                        </td>
                        <td class="px-4 py-2">{{ $customer->contact ?? '—' }}</td>
                        <td class="px-4 py-2">{{ $customer->email ?? '—' }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('customers.show', $customer->id) }}" class="text-blue-600 hover:underline">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
