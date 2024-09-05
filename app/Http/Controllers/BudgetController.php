<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;

class BudgetController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $accounts = $user->accounts;
        $budgets = Budget::whereIn('account_id', $accounts->pluck('id'))->get();
        return view('budgets.index', compact('budgets', 'accounts'));
    }

    public function create()
    {
        $user = Auth::user();
        $accounts = $user->accounts;
        return view('budgets.create', compact('accounts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'duration' => 'required|in:daily,weekly,monthly',
        ]);

        $user = Auth::user();
        $account = Account::where('id', $request->account_id)->where('user_id', $user->id)->firstOrFail();
        $expires_at = match ($request->duration) {
            'daily' => now()->addDay(),
            'weekly' => now()->addWeek(),
            'monthly' => now()->addMonth(),
            default => null,
        };

        $budget = new Budget();
        $budget->account_id = $request->account_id;
        $budget->name = $request->name;
        $budget->amount = $request->amount;
        $budget->duration = $request->duration;
        $budget->expires_at = $expires_at;
        $budget->save();

        return redirect()->route('budgets.index')->with('success', 'Budget created successfully.');
    }

    public function show(Budget $budget)
    {
        $user = Auth::user();
        $account = $budget->account;

        if ($account->user_id !== $user->id) {
            abort(403, 'Unauthorized access.');
        }

        return view('budgets.show', compact('budget'));
    }

    public function edit(Budget $budget)
    {
        $user = Auth::user();
        $account = $budget->account;

        if ($account->user_id !== $user->id) {
            abort(403, 'Unauthorized access.');
        }

        $accounts = $user->accounts;
        return view('budgets.edit', compact('budget', 'accounts'));
    }

    public function update(Request $request, Budget $budget)
    {
        $user = Auth::user();
        $account = $budget->account;

        if ($account->user_id !== $user->id) {
            abort(403, 'Unauthorized access.');
        }

        $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        $budget->account_id = $request->account_id;
        $budget->name = $request->name;
        $budget->amount = $request->amount;
        $budget->save();

        return redirect()->route('budgets.index')->with('success', 'Budget updated successfully.');
    }

    public function destroy(Budget $budget)
    {
        $user = Auth::user();
        $account = $budget->account;

        if ($account->user_id !== $user->id) {
            abort(403, 'Unauthorized access.');
        }

        $budget->delete();
        return redirect()->route('budgets.index')->with('success', 'Budget deleted successfully.');
    }
}
