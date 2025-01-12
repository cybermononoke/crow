@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-rose-50 flex items-center justify-center">
    <div class="bg-white border border-black p-8 w-full max-w-3xl">
        <h1 class="text-2xl font-semibold mb-6 text-center">Budgets</h1>

        @if ($budgets->isEmpty())
        <p class="text-center text-black">No budgets found.</p>
        @else
        <table class="min-w-full divide-y divide-pink-300">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Amount</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-pink-300">
                @foreach ($budgets as $budget)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-black">{{ $budget->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-black">${{ number_format($budget->amount, 2) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('budgets.show', $budget) }}" class="text-black hover:text-black">View</a>
                        <a href="{{ route('budgets.edit', $budget) }}" class="ml-4 text-black">Edit</a>
                        <form action="{{ route('budgets.destroy', $budget) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ml-4 text-black">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        <div class="mt-6 text-center">
            <form action="{{ route('budgets.create') }}" method="GET" class="inline">
                <x-primary-button class="ms-3">
                    {{ __('Create New Budget') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</div>
@endsection