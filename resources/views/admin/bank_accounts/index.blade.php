@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-info">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bank Accounts</h1>
        <a href="{{ route('admin.bank_accounts.create') }}" class="btn btn-primary btn-sm shadow-sm">
            Add Bank Account <i class="fa fa-plus ml-1"></i>
        </a>
    </div>

    <!-- Content Row -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Bank Name</th>
                            <th>Account Number</th>
                            <th>Account Holder</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bankAccounts as $bankAccount)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $bankAccount->bank_name }}</td>
                                <td>{{ $bankAccount->account_number }}</td>
                                <td>{{ $bankAccount->account_holder }}</td>
                                <td>
                                    <a href="{{ route('admin.bank_accounts.edit', $bankAccount) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form onclick="return confirm('Are you sure?')" class="d-inline" action="{{ route('admin.bank_accounts.destroy', $bankAccount) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No bank accounts found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Optional pagination -->
        {{-- <div class="card-footer">
            {{ $bankAccounts->links() }}
        </div> --}}
    </div>
</div>
@endsection
