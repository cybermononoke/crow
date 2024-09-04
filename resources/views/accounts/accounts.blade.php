@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-rose-50 flex items-center justify-center">
    <div class="bg-white p-8 w-full max-w-md border border-black">
        <h1 class="text-2xl font-semibold mb-6 text-center">Account Details</h1>

        @if($account)
        <div class="mb-4 border border-black p-2 ">
            <label class="font-medium">Account Number:</label>
            <p class="text-lg">{{ $account->account_number }}</p>
        </div>

        <div class="mb-4 border border-black p-2 ">
            <label class="font-medium">Account Type:</label>
            <p class="text-lg">{{ ucfirst($account->account_type) }}</p>
        </div>

        <div class="mb-4 border border-black p-2 ">
            <label class="font-medium">Balance:</label>
            <p class="text-lg">${{ number_format($account->balance, 2) }}</p>
        </div>
        @else
        <p class="text-lg text-red-500 text-center">No account information available.</p>
        @endif

        <!-- Create New Account Button -->
        <div class="mt-6 text-center">
            <form action="{{ route('accounts.create') }}" method="GET" class="inline">
                <x-primary-button class="ms-3">
                    {{ __('Create New Account') }}
                </x-primary-button>
            </form>

        </div>
    </div>
</div>
@endsection