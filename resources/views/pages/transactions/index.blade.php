@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Transactions List</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Number</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($trans as $tran)
                                        <tr>
                                            <td>{{ $tran->id }}</td>
                                            <td>{{ $tran->name }}</td>
                                            <td>{{ $tran->email }}</td>
                                            <td>{{ $tran->number }}</td>
                                            <td>$ {{ $tran->trans_total }}</td>
                                            <td>
                                                @if ($tran->trans_status == 'PENDING')
                                                    <span class="badge badge-info">
                                                    @elseif ($tran->trans_status == 'SUCCESS')
                                                        <span class="badge badge-success">
                                                        @elseif ($tran->trans_status == 'FAILED')
                                                            <span class="badge badge-danger">
                                                            @else
                                                                <span>
                                                @endif
                                                {{ $tran->trans_status }}
                                                </span>
                                            </td>
                                            <td>
                                                @if ($tran->trans_status == 'PENDING')
                                                    <a href="{{ route('transactions.status', $tran->id) }}?status=SUCCESS"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                    <a href="{{ route('transactions.status', $tran->id) }}?status=FAILED"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                @endif
                                                <a href="#mymodal"
                                                    data-remote="{{ route('transactions.show', $tran->id) }}"
                                                    data-toggle="modal" data-target="#mymodal"
                                                    data-title="Detail Transaksi {{ $tran->uuid }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('transactions.edit', $tran->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form action="{{ route('transactions.destroy', $tran->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure?')"><i
                                                            class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">No data.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
