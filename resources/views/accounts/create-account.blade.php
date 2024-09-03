@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-rose-50 flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
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
                <label for="balance" class="font-medium">Initial Balance</label>
                <input type="number" id="balance" name="balance" class="form-input mt-1 block w-full" step="0.01" min="0" required>
            </div>

            <div class="mt-6 text-center">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 transition duration-150 ease-in-out">
                    Create Account
                </button>
            </div>
        </form>
    </div>
</div>
@endsection