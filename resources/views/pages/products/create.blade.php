@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Insert Product</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror mb-2"
                        value="{{ old('name') }}" placeholder="Name product..">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-label">Type</label>
                    <input type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror mb-2"
                        value="{{ old('type') }}" placeholder="Type product: T-shirt, Hat, Jacket, etc.">
                    @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description" class="form-control-label">Description</label>
                    <textarea name="description"
                        class="ckeditor form-control @error('type') is-invalid @enderror mb-2">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price" class="form-control-label">Price</label>
                    <input type="number" name="price" id="price"
                        class="form-control @error('price') is-invalid @enderror mb-2" value="{{ old('price') }}">
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="quantity" class="form-control-label">Quantity</label>
                    <input type="number" name="quantity" id="quantity"
                        class="form-control @error('quantity') is-invalid @enderror mb-2" value="{{ old('quantity') }}">
                    @error('quantity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection
