@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Add New Customer</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 p-4 mb-4 rounded">
            <strong>Whoops!</strong> Please fix the following errors:
            <ul class="list-disc pl-6">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('customers.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf

        <div>
            <label for="first_name" class="block font-semibold mb-1">First Name</label>
            <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}"
                   class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <div>
            <label for="last_name" class="block font-semibold mb-1">Last Name</label>
            <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}"
                   class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <div>
            <label for="contact" class="block font-semibold mb-1">Contact Number</label>
            <input type="text" name="contact" id="contact" value="{{ old('contact') }}"
                   class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <div>
            <label for="email" class="block font-semibold mb-1">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                   class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <div>
            <label for="address" class="block font-semibold mb-1">Address</label>
            <textarea name="address" id="address" rows="3"
                      class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">{{ old('address') }}</textarea>
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('customers.index') }}"
               class="inline-block px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
               Cancel
            </a>
            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Save Customer
            </button>
        </div>
    </form>
</div>
@endsection
