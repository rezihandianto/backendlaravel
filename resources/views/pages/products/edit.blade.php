@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit Product</strong>
            <small>{{ $product->name }}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror mb-2"
                        value="{{ old('name') ? old('name') : $product->name }}" placeholder="Name product..">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-label">Type</label>
                    <input type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror mb-2"
                        value="{{ old('type') ? old('type') : $product->type }}"
                        placeholder="Type product: T-shirt, Hat, Jacket, etc.">
                    @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description" class="form-control-label">Description</label>
                    <textarea name="description"
                        class="ckeditor form-control @error('type') is-invalid @enderror mb-2">{{ old('description') ? old('description') : $product->description }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price" class="form-control-label">Price</label>
                    <input type="number" name="price" id="price"
                        class="form-control @error('price') is-invalid @enderror mb-2"
                        value="{{ old('price') ? old('price') : $product->price }}">
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="quantity" class="form-control-label">Quantity</label>
                    <input type="number" name="quantity" id="quantity"
                        class="form-control @error('quantity') is-invalid @enderror mb-2"
                        value="{{ old('quantity') ? old('quantity') : $product->quantity }}">
                    @error('quantity')
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
