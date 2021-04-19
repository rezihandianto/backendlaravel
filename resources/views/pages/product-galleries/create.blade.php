@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Insert Photo Product</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('product-galleries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Name Product</label>
                    <select name="products_id" class="form-control @error('products_id') is-invalid @enderror mb-2">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    @error('products_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="photo" class="form-control-label">Photo</label>
                    <input type="file" name="photo" id="photo"
                        class="form-control @error('photo') is-invalid @enderror mb-2" value="{{ old('photo') }}"
                        accept="image/*">
                    @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="is_default" class="form-control-label">Jadikan Default</label>
                    <br>
                    <label>
                        <input type="radio" name="is_default" value="1"
                            class="form-control @error('is_default') is-invalid @enderror"> Ya
                    </label>
                    &nbsp;
                    <label>
                        <input type="radio" name="is_default" value="0"
                            class="form-control @error('is_default') is-invalid @enderror"> Tidak
                    </label>
                    @error('is_default')
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
