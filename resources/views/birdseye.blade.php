@extends('layouts.app')

@section('content')

<body class="bg-rose-50">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">{{ $title }}</h1>
        <canvas id="spendingChart" width="400" height="200"></canvas>
        <div class="mt-4">
            <form method="GET" action="{{ route('birdseye') }}">
                <label for="type" class="block text-sm font-medium text-black">View Type</label>
                <select id="type" name="type" class="mt-1 block w-full bg-white border border-black focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
                    <option value="monthly" {{ $type === 'monthly' ? 'selected' : '' }}>Monthly</option>
                    <option value="daily" {{ $type === 'daily' ? 'selected' : '' }}>Daily</option>
                    <option value="yearly" {{ $type === 'yearly' ? 'selected' : '' }}>Yearly</option>
                </select>
                <label for="month" class="block text-sm font-medium text-gray-700 mt-4">Month</label>
                <input type="number" id="month" name="month" min="1" max="12" value="{{ $month }}" class="mt-1 block w-full bg-white border border-black focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
                <label for="year" class="block text-sm font-medium text-gray-700 mt-4">Year</label>
                <input type="number" id="year" name="year" value="{{ $year }}" class="mt-1 block w-full bg-white border border-black  focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
                <button type="submit" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-pink-600 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">Update</button>
            </form>
        </div>
    </div>
    <script>
        const ctx = document.getElementById('spendingChart').getContext('2d');
        const spendingChart = new Chart(ctx, {
            type: 'line', // Change this to 'bar' if you prefer a bar chart
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Spending',
                    data: @json($data),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    @endsection