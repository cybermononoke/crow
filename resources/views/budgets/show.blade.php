@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-rose-50 flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h1 class="text-2xl font-semibold mb-6">Budget Details</h1>

        <div class="mb-4">
            <label class="block text-sm font-medium text-black">Name</label>
            <p class="text-lg">{{ $budget->name }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-black">Amount</label>
            <p class="text-lg">${{ number_format($budget->amount, 2) }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-black">Account</label>
            <p class="text-lg">{{ $budget->account->account_number }} ({{ ucfirst($budget->account->account_type) }})</p>
        </div>

        <div class="flex justify-between mt-6">
            <a href="{{ route('budgets.edit', $budget) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium text-white bg-pink-500 hover:bg-pink-600 focus:outline-none focus:border-pink-700 focus:ring focus:ring-pink-200 transition duration-150 ease-in-out">
                Edit
            </a>
            <form action="{{ route('budgets.destroy', $budget) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 transition duration-150 ease-in-out">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
