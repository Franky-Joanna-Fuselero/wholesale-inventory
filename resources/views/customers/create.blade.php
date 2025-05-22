@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="form-section">
        <h1 class="text-3xl font-bold text-gray-800 mb-6"> Add New Customer</h1>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <strong class="block mb-2">Whoops! Please fix the following:</strong>
                <ul class="list-disc list-inside space-y-1 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('customers.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="first_name" class="label-text1">First Name</label>
                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" class="input-outline1">
                </div>

                <div>
                    <label for="last_name" class="label-text1">Last Name</label>
                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" class="input-outline1">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="contact" class="label-text1">Contact Number</label>
                    <input type="text" name="contact" id="contact" value="{{ old('contact') }}" class="input-outline1">
                </div>

                <div>
                    <label for="email" class="label-text1">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="input-outline1">
                </div>
            </div>

            <div>
                <label for="address" class="label-text1">Address</label>
                <textarea name="address" id="address" rows="3" class="input-outline1 resize-none h-[100px]">
                    {{ old('address') }}
                </textarea>
            </div>

            <div class="flex justify-between items-center pt-4">
                <div class="space-x-2">
                    <button type="reset" class="btn-secondary1">
                        Reset
                    </button>
                    <button type="submit" class="btn-primary1">
                        Save Customer
                    </button>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('customers.index') }}" class="btn-link1">
                    ← Back to Customer List
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
