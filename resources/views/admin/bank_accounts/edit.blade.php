@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Bank Account</h1>
    <form action="{{ route('bank_accounts.update', $bankAccount) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="bank_name">Bank Name</label>
            <input type="text" name="bank_name" id="bank_name" class="form-control" value="{{ $bankAccount->bank_name }}" required>
        </div>
        <div class="form-group">
            <label for="account_number">Account Number</label>
            <input type="text" name="account_number" id="account_number" class="form-control" value="{{ $bankAccount->account_number }}" required>
        </div>
        <div class="form-group">
            <label for="account_holder">Account Holder</label>
            <input type="text" name="account_holder" id="account_holder" class="form-control" value="{{ $bankAccount->account_holder }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection