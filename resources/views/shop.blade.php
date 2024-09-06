@extends('layouts.app')

@section('body-class', 'overflow-auto')

@section('content')
<div class="min-h-screen bg-rose-50 flex flex-col items-center justify-center text-center">
    <div class="relative h-screen flex flex-col justify-center items-center">
        <div class="relative animate__animated animate__fadeIn">
            <h1 class="text-6xl text-pink-400 relative top-1 left-1">THE SHOP</h1>
            <h1 class="text-6xl text-black absolute top-0 left-0">THE SHOP</h1>
        </div>
        <p class="text-lg">we sell crow merch</p>
    </div>

    <!-- Shop Grid -->
    <div class="min-h-screen container mx-auto py-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Example Shop Item -->
            @foreach($products as $product)
            <x-shopitem
                title="{{ $product->name }}"
                description="{{ $product->description }}"
                price="{{ $product->price }}" />
            @endforeach
        </div>
    </div>
</div>
@endsection