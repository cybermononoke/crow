@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-rose-50 flex items-center justify-center">
    <div class="bg-white p-8 w-full max-w-md border border-black">
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

        <div class="mb-4">
            <p>Budget Duration: {{ ucfirst($budget->duration) }}</p>

            @if ($budget->expires_at)
            <p>Expires: {{ $budget->expires_at->format('M d, Y H:i') }}</p>
            @else
            <p>Expires: Never</p>
            @endif
        </div>


        <div class="flex justify-between mt-6">
            <form action="{{ route('budgets.edit', $budget) }}">
                <x-primary-button class="ms-3">
                    {{ __('Edit') }}
                </x-primary-button>
            </form>
            <form action="{{ route('budgets.destroy', $budget) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <x-primary-button class="ms-3">
                    {{ __('Delete') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</div>
@endsection