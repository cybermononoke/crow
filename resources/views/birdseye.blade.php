@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-rose-50 flex items-center justify-center">
    <div class="bg-white border border-black p-8 w-full max-w-3xl">
        <h1 class="text-2xl font-semibold mb-6 text-center">BIRDSEYE</h1>


        <div class="card">
            <div class="card-header text-lg font-semibold">Today's Spending</div>
            <div class="card-body">
                <p>Total spent today: ${{ number_format($todaySpending, 2) }}</p>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header text-lg font-semibold">This Month's Spending</div>
            <div class="card-body">
                <p>Total spent this month: ${{ number_format($monthSpending, 2) }}</p>
            </div>
        </div>
    </div>
</div>
@endsection