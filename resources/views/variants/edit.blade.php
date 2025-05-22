@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Edit Variant</h1>

    <form action="{{ route('variants.update', $variant) }}" method="POST">
        @method('PUT')
        @include('variants.form', ['variant' => $variant])
    </form>
</div>
@endsection
