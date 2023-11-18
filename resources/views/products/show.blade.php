@extends('layout.global')

@section('content')
    <div class="" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
        <h2>Show Product</h2>
        <div style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
            <div>
                <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" width="100">
            </div>
            <div>
                <h3>Name: {{ $product->name }}</h3>
            </div>
            <div>
                <h3>Description: {{ $product->description }}</h3>
            </div>
            <div>
                <h3>Price: {{ $product->price }}$</h3>
            </div>
            <div>
                <h3>Categories: </h3>
                @foreach ($product->getCategories() as $category)
                    <span>{{ $category->category->name }},</span>
                @endforeach
            </div>
            
            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
            <a href="{{ route('products.edit', $product->id) }}">Edit</a>

        </div>
    @endsection
