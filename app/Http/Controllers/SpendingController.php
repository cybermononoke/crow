<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\Spending;
use App\Models\Account;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;

class SpendingController extends Controller
{
    public function create()
    {
        $budgets = Budget::all();
        $accounts = Account::all();
        return view('spendings.create', compact('budgets', 'accounts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'budget_id' => 'required|exists:budgets,id',
            'account_id' => 'required|exists:accounts,id',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $budget = Budget::find($request->budget_id);
        $spending = new Spending($request->only('amount', 'description', 'date', 'account_id'));
        $budget->spendings()->save($spending);

        $budget->amount -= $spending->amount;
        $budget->save();

        return redirect()->route('budgets.show', $budget)->with('success', 'Spending created!');
    }

}
