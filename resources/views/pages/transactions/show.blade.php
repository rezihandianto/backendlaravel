<table class="table table-borderd">
    <tr>
        <th>Name</th>
        <td>{{ $tran->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $tran->email }}</td>
    </tr>
    <tr>
        <th>Number</th>
        <td>{{ $tran->number }}</td>
    </tr>
    <tr>
        <th>Address</th>
        <td>{{ $tran->address }}</td>
    </tr>
    <tr>
        <th>Transaction Total</th>
        <td>{{ $tran->trans_total }}</td>
    </tr>
    <tr>
        <th>Transaction Status</th>
        <td>{{ $tran->trans_status }}</td>
    </tr>
    <tr>
        <th>Pembelian Produk</th>
        <td>
            <table class="table table-borderd w-100">
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Price</th>
                </tr>
                @foreach ($tran->details as $detail)
                    <tr>
                        <td>{{ $detail->product->name }}</td>
                        <td>{{ $detail->product->type }}</td>
                        <td>$ {{ $detail->product->price }}</td>
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>

<div class="row">
    <div class="col-4">
        <a href="{{ route('transactions.status', $tran->id) }}?status=SUCCESS" class="btn btn-success btn-block">
            <i class="fa fa-check"></i> Set SUCCESS
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transactions.status', $tran->id) }}?status=FAILED" class="btn btn-danger btn-block">
            <i class="fa fa-times"></i> Set FAILED
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transactions.status', $tran->id) }}?status=PENDING" class="btn btn-info btn-block">
            <i class="fa fa-spinner"></i> Set PENDING
        </a>
    </div>
</div>
