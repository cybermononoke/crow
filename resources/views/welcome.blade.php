@extends('layouts.app')

@section('content')
<div x-data="{ showAbout: false }" class="min-h-screen bg-rose-50 flex flex-col items-center justify-center text-center overflow-hidden">
    <!-- Welcome Section (First Page) -->
    <div x-show="!showAbout" class="relative h-screen flex flex-col justify-center items-center">
        <p class="text-lg">welcome to</p>
        <div class="relative animate__animated animate__fadeIn">
            <h1 class="text-6xl text-pink-400 relative top-1 left-1">CROW</h1>
            <h1 class="text-6xl text-black absolute top-0 left-0">CROW</h1>
        </div>
        <p class="text-lg">~ budget better ~</p>

        <x-primary-button class="mt-10" @click="showAbout = true">
            {{ __('About') }}
        </x-primary-button>
    </div>

    <!-- About Section (Second Page) -->
    <div x-show="showAbout" class="relative h-screen flex flex-col justify-center items-center bg-rose-50">
        <div class="relative mb-10">
            <h1 class="text-6xl text-pink-400 relative top-1 left-1">ABOUT CROW</h1>
            <h1 class="text-6xl text-black absolute top-0 left-0">ABOUT CROW</h1>

        </div>

        <div class="mb-6">
            <p class="text-pink-400 text-xl">Why?</p>
            <p>budgeting made me sad. crow tries to make budgeting more pleasant.</p>
        </div>

        <div class="mb-6">
            <p class="text-pink-400 text-xl">What's with the bird?</p>
            <p>that's our mascot, penny. he's pretty cute.</p>
        </div>

        <div class="mb-6">
            <p class="text-pink-400 text-xl">My bank's mobile app already does budgeting for me...</p>
            <p>so does mine. i just think it sucks.</p>
        </div>

        <x-primary-button class="mt-10" @click="showAbout = false">
            {{ __('Back') }}
        </x-primary-button>
    </div>
</div>
@endsection