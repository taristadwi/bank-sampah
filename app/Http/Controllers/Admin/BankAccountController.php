<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BankAccount;

class BankAccountController extends Controller
{
    public function index()
    {
        $bankAccounts = BankAccount::where('user_id', auth()->id())->get();
        return view('admin.bank_accounts.index', compact('bankAccounts'));
    }

    public function create()
    {
        return view('admin.bank_accounts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'account_holder' => 'required|string|max:255',
        ]);

        BankAccount::create([
            'user_id' => auth()->id(),
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'account_holder' => $request->account_holder,
        ]);

        return redirect()->route('admin.bank_accounts.index')->with('success', 'Bank account added successfully.');
    }

    public function edit(BankAccount $bankAccount)
    {
        $this->authorize('update', $bankAccount);
        return view('admin.bank_accounts.edit', compact('bankAccount'));
    }

    public function update(Request $request, BankAccount $bankAccount)
    {
        $this->authorize('update', $bankAccount);

        $request->validate([
            'bank_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'account_holder' => 'required|string|max:255',
        ]);

        $bankAccount->update($request->only('bank_name', 'account_number', 'account_holder'));

        return redirect()->route('admin.bank_accounts.index')->with('success', 'Bank account updated successfully.');
    }

    public function destroy(BankAccount $bankAccount)
    {
        $this->authorize('delete', $bankAccount);
        $bankAccount->delete();

        return redirect()->route('admin.bank_accounts.index')->with('success', 'Bank account deleted successfully.');
    }
}
