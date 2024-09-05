@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-rose-50 flex items-center justify-center">
    <div class="bg-white p-8 border border-black w-full max-w-md">
        <h1 class="text-2xl font-semibold mb-6 text-center">Create New Account</h1>

        <form method="POST" action="{{ route('accounts.store') }}">
            @csrf

            <div class="mb-4">
                <label for="account_type" class="font-medium">Account Type</label>
                <select id="account_type" name="account_type" class="form-select mt-1 block w-full" required>
                    <option value="checking">Checking</option>
                    <option value="savings">Savings</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="account_name" class="font-medium">Account Name</label>
                <input type="text" id="account_name" name="account_name" class="form-input mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <label for="balance" class="font-medium">Initial Balance</label>
                <input type="number" id="balance" name="balance" class="form-input mt-1 block w-full" step="0.01" min="0" required>
            </div>

            <div class="mt-6 text-center">
                <x-primary-button class="ms-3">
                    {{ __('Create Account') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
@endsection