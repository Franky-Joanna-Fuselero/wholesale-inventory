@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Create Variant</h1>

    <form action="{{ route('variants.store') }}" method="POST">
        @include('variants.form', ['variant' => null])
    </form>
</div>
@endsection
