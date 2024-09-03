<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $account = DB::table('accounts')->where('user_id', $user->id)->first();
        return view('accounts.accounts', compact('account'));
    }

    public function create()
    {
        return view('accounts.create-account');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'account_type' => 'required|in:checking,savings',
            'balance' => 'required|numeric|min:0',
        ]);

        $accountNumber = 'ACCT-' . strtoupper(Str::random(8));

        DB::table('accounts')->insert([
            'user_id' => Auth::id(),
            'account_number' => $accountNumber,
            'account_type' => $validated['account_type'],
            'balance' => $validated['balance'],
        ]);

        return redirect()->route('accounts')->with('success', 'Account created!');
    }
}
