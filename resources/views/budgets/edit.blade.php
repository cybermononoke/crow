@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-rose-50 flex items-center justify-center">
    <div class="bg-white p-8 border border-black w-full max-w-md">
        <h1 class="text-2xl font-semibold mb-6">Edit Budget</h1>

        <form action="{{ route('budgets.update', $budget) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="account_id" class="block text-sm font-medium text-gray-700">Account</label>
                <select id="account_id" name="account_id" class="mt-1 block w-full bg-gray-50 border border-black focus:ring-pink-500 focus:border-pink-500 sm:text-sm" required>
                    @foreach ($accounts as $account)
                    <option value="{{ $account->id }}" {{ $account->id == $budget->account_id ? 'selected' : '' }}>
                        {{ $account->account_number }} ({{ ucfirst($account->account_type) }})
                    </option>
                    @endforeach
                </select>
                @error('account_id')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full bg-gray-50 border border-black focus:ring-pink-500 focus:border-pink-500 sm:text-sm" value="{{ old('name', $budget->name) }}" required>
                @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                <input type="number" id="amount" name="amount" class="mt-1 block w-full bg-gray-50 border border-black focus:ring-pink-500 focus:border-pink-500 sm:text-sm" value="{{ old('amount', $budget->amount) }}" required>
                @error('amount')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="duration" class="block text-sm font-medium text-gray-700">Duration</label>
                <select id="duration" name="duration" class="mt-1 block w-full bg-gray-50 border border-black focus:ring-pink-500 focus:border-pink-500 sm:text-sm" required>
                    <option value="daily" {{ $budget->duration == 'daily' ? 'selected' : '' }}>Daily</option>
                    <option value="weekly" {{ $budget->duration == 'weekly' ? 'selected' : '' }}>Weekly</option>
                    <option value="monthly" {{ $budget->duration == 'monthly' ? 'selected' : '' }}>Monthly</option>
                </select>
                @error('duration')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <x-primary-button class="ms-3">
                    {{ __('Update Budget') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
@endsection