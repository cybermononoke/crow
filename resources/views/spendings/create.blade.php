@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-rose-50 flex items-center justify-center">
    <div class="bg-white p-8 border border-black w-full max-w-md">
        <h1 class="text-2xl font-semibold mb-6 text-center">Log Spending</h1>

        <form method="POST" action="{{ route('spendings.store') }}">
            @csrf

            <div class="mb-4">
                <label for="date" class="font-medium">Date</label>
                <input type="date" id="date" name="date" class="form-input mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <label for="budget_id" class="font-medium">Budget</label>
                <select id="budget_id" name="budget_id" class="form-select mt-1 block w-full" required>
                    @foreach($budgets as $budget)
                    <option value="{{ $budget->id }}">{{ $budget->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="account_id" class="font-medium">Account</label>
                <select id="account_id" name="account_id" class="form-select mt-1 block w-full" required>
                    @foreach($accounts as $account)
                    <option value="{{ $account->id }}">{{ $account->account_number }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="amount" class="font-medium">Amount</label>
                <input type="number" id="amount" name="amount" class="form-input mt-1 block w-full" step="0.01" min="0" required>
            </div>

            <div class="mb-4">
                <label for="description" class="font-medium">Description</label>
                <input type="text" id="description" name="description" class="form-input mt-1 block w-full">
            </div>

            <div class="mt-6 text-center">
                <x-primary-button class="ms-3">
                    {{ __('Log Spending') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
@endsection