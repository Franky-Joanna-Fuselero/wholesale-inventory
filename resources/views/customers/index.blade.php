@extends('layouts.app')

@section('title', 'Customer List')

@section('content')
<div class="p-6 max-w-6xl mx-auto">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Customer List</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-end mb-4">
        <a href="{{ route('customers.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow transition duration-150">
            + Add New Customer
        </a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-left">Contact</th>
                    <th class="py-3 px-6 text-left">Email</th>
                    <th class="py-3 px-6 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm divide-y divide-gray-200">
                @forelse($customers as $customer)
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-3 px-6 font-medium">
                        <a href="{{ route('customers.show', $customer->id) }}"
                           class="text-blue-600 hover:underline">
                            {{ $customer->first_name }} {{ $customer->last_name }}
                        </a>
                    </td>
                    <td class="py-3 px-6">{{ $customer->contact ?? '—' }}</td>
                    <td class="py-3 px-6">{{ $customer->email ?? '—' }}</td>
                    <td class="py-3 px-6">
                        <a href="{{ route('customers.show', $customer->id) }}"
                           class="text-sm text-indigo-600 hover:text-indigo-900 font-medium">
                            View
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-6 text-gray-500">
                        No customers found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
