@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit Transaction</strong>
            <small>{{ $tran->uuid }}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('transactions.update', $tran->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Costumer Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror mb-2"
                        value="{{ old('name') ? old('name') : $tran->name }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="form-control-label">Email</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror mb-2"
                        value="{{ old('email') ? old('email') : $tran->email }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="number" class="form-control-label">Nomer Telfon</label>
                    <input type="text" name="number" id="number"
                        class="form-control @error('number') is-invalid @enderror mb-2"
                        value="{{ old('number') ? old('number') : $tran->number }}">
                    @error('number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address" class="form-control-label">Address</label>
                    <input type="text" name="address" id="address"
                        class="form-control @error('address') is-invalid @enderror mb-2"
                        value="{{ old('address') ? old('address') : $tran->address }}">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Edit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
