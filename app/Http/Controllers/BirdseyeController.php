<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Spending;
use Illuminate\Support\Facades\Log;

class BirdseyeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $now = Carbon::now();

        $todaySpending = Spending::whereDate('date', $now->toDateString())
            ->whereHas('account', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->sum('amount');

        $monthSpending = Spending::whereMonth('date', $now->month)
            ->whereYear('date', $now->year)
            ->whereHas('account', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->sum('amount');


        return view('birdseye', [
            'todaySpending' => $todaySpending,
            'monthSpending' => $monthSpending,
        ]);
    }
}
