@extends('layout.global')

@section('content')
    <div style="display: flex;flex-direction: column">
        <div style="display: flex;flex-direction: row;align-items: center;padding: 10px; justify-content: space-between">
            <h2>All Products </h2>
            <div>
                <a href="{{ route('products.index', ['sort_by' => 'name', 'sort_order' => 'asc']) }}">Sort by Name (ASC)</a>
                |
                <a href="{{ route('products.index', ['sort_by' => 'name', 'sort_order' => 'desc']) }}">Sort by Name
                    (DESC)</a> |
                <a href="{{ route('products.index', ['sort_by' => 'price', 'sort_order' => 'asc']) }}">Sort by Price
                    (ASC)</a> |
                <a href="{{ route('products.index', ['sort_by' => 'price', 'sort_order' => 'desc']) }}">Sort by Price
                    (DESC)</a>
            </div>
            <div>
                <form action="{{ route('products.index') }}" method="get">
                    <label for="category">Filter by Category:</label>
                    <select name="category_id" id="category" value="{{$categoryId}}">
                        <option value="">All Categories</option>
                        @foreach ($allcategories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit">Apply Filter</button>
                </form>
            </div>

            <a href="{{ route('products.create') }}">Create a new product</a>
        </div>

        <table>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Categories</th>
                <th>Actions</th>
            </tr>
            @if (count($products) == 0)
                <tr>
                    <td colspan="6">No products found.</td>
                </tr>

            @endif
            @foreach ($products as $product)
                <tr style="border: solid black 1px;">
                    <td>
                        <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}"
                            width="100">
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }} </td>
                    <td>{{ $product->price }}$</td>
                    <td style="color: goldenrod">
                        @foreach ($product->getCategories() as $category)
                            <span>{{ $category->category->name }},</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}">Show</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        <a href="{{ route('products.edit', $product->id) }}">Edit</a>

                    </td>
                </tr>
            @endforeach
        </table>
        {{ $products->links('pagination::bootstrap-4') }}
    </div>
@endsection
