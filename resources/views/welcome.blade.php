@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-rose-50 flex items-center justify-center text-center overflow-hidden">
    <div class="relative">

        <div class="absolute top-[-6rem] left-1/2 transform -translate-x-1/2">
            <img src="{{ asset('images/penny.svg') }}" alt="Custom Icon" class="w-32 h-32">
        </div>

        <p class="text-lg">welcome to</p>
        <div class="relative animate__animated animate__fadeIn">
            <h1 class="text-6xl text-pink-400 relative top-1 left-1">CROW</h1>
            <h1 class="text-6xl text-black absolute top-0 left-0">CROW</h1>
        </div>
        <p class="text-lg">~ budget better ~</p>
    </div>
</div>
@endsection