<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Spending;

class BirdseyeController extends Controller
{
    public function birdseye(Request $request)
    {
        $user = Auth::user();
        $type = $request->input('type', 'monthly');
        $month = $request->input('month', Carbon::now()->month);
        $year = $request->input('year', Carbon::now()->year);

        switch ($type) {
            case 'daily':
                $spendingData = Spending::where('user_id', $user->id)
                    ->whereYear('created_at', $year)
                    ->whereMonth('created_at', $month)
                    ->selectRaw('strftime(\'%d\', created_at) as day, SUM(amount) as total')
                    ->groupBy('day')
                    ->orderBy('day')
                    ->get();
                $labels = $spendingData->pluck('day');
                $data = $spendingData->pluck('total');
                $title = "Daily Spending for {$month}/{$year}";
                break;

            case 'yearly':
                $spendingData = Spending::where('user_id', $user->id)
                    ->whereYear('created_at', $year)
                    ->selectRaw('strftime(\'%m\', created_at) as month, SUM(amount) as total')
                    ->groupBy('month')
                    ->orderBy('month')
                    ->get();
                $labels = $spendingData->pluck('month')->map(fn($m) => Carbon::create()->month($m)->format('F'));
                $data = $spendingData->pluck('total');
                $title = "Yearly Spending for {$year}";
                break;

            case 'monthly':
            default:
                $spendingData = Spending::where('user_id', $user->id)
                    ->whereYear('created_at', $year)
                    ->whereMonth('created_at', $month)
                    ->selectRaw('strftime(\'%d\', created_at) as day, SUM(amount) as total')
                    ->groupBy('day')
                    ->orderBy('day')
                    ->get();
                $labels = $spendingData->pluck('day');
                $data = $spendingData->pluck('total');
                $title = "Monthly Spending for " . Carbon::create()->month($month)->format('F') . " {$year}";
                break;
        }

        return view('birdseye', compact('labels', 'data', 'title', 'type', 'month', 'year'));
    }
}
