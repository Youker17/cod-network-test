@extends('layout.global')

@section('content')
    <div class="" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
        <h2>Edit Product</h2>
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <form method="post" enctype="multipart/form-data" action="{{ route('products.update',["product"=>$product]) }}"
            style="display: flex; justify-content: center; align-items: start; flex-direction: column;">
            @csrf
            @method('PUT')

            <label for="name">Image*</label>
            <input type="file" name="image">

            <label for="name">Name*</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}">

            <label for="description">Description*</label>
            <textarea name="description" id="description" cols="30" rows="10" value="">{{ $product->description }}</textarea>

            <label for="price">Price*</label>
            <input type="number" name="price" min="1" id="price" value="{{ $product->price }}">

            <label for="category">Categories(optional)</label>
            <br>
            @foreach ($categories as $category)
                <div>
                    <input type="checkbox" name="categories[]" value="{{ $category->id }}" 
                    {{ $category->products->contains('product_id', $product->id) ? 'checked' : '' }}>
                    <label>{{ $category->name }}</label>
                </div>
            @endforeach
            <button
                style="background-color: #4CAF50; /* Green */width: 100%; margin-top: 10px;margin-bottom:10px; color: white; padding: 10px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;"
                type="submit">UPDATE</button>
        </form>
    </div>
@endsection
