<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TinyBankController extends Controller
{
    public function deposit(Request $request)
    {

        $amount = $request->input('amount'); // get the amount from the request

        $balance = session()->get('balance', 0) + $amount; // get the current balance from the session and add the amount

        session(['balance' => $balance]); // save the new balance to the session

        $history = session()->get('history', []); // get the current history from the session

        $history[] = [
            'type'      => 'deposit',
            'amount'    => $amount,
            'balance'   => $balance,
            'timestamp' => now(),
        ]; // add the new transaction to the history

        session(['history' => $history]); // save the new history to the session

        return response()->json([
            'message' => 'Deposited',
            'balance' => $balance,
        ]); // return a JSON response
    }

    public function withdraw(Request $request)
    {
        $amount = (float) $request->input('amount');
        $balance = session()->get('balance', 0);

        $balance -= $amount;
        session(['balance' => $balance]);

        $history = session()->get('history', []);
        $history[] = [
            'type'      => 'withdraw',
            'amount'    => $amount,
            'balance'   => $balance,
            'timestamp' => now(),
        ];
        session(['history' => $history]);

        return response()->json([
            'message' => 'Withdraw',
            'balance' => $balance,
        ]);
    }

    public function viewBalance()
    {
        $balance = session()->get('balance', 0);

        return response()->json([
            'message' => 'Balance',
            'balance' => $balance,
        ]);
    }
    public function showHistory()
    {
        $history = session()->get('history', []);
        return response()->json([
            'message' => 'Your transaction history:',
            'history' => $history,
        ]);
    }
}
