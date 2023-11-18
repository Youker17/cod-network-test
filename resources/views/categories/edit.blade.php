@extends('layout.global')

@section('content')
    <div style="display: flex; flex-direction: column; align-items: center;">
        <h2>Edit Category</h2>

        <form method="POST" action="{{ route('categories.update', $category->id) }}" style="width: 300px;">
            @csrf
            @method('PUT')

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required>

            <label for="parent">Parent Category:</label>
            <select id="parent" name="parent">
                <option value="{{null}}">None</option>
                @foreach ($parentCategories as $parentCategory)
                    <option value="{{ $parentCategory->id }}" {{ $category->parentCategory && $category->parentCategory->id == $parentCategory->id ? 'selected' : '' }}>
                        {{ $parentCategory->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit">Update Category</button>
        </form>

        
    </div>
@endsection
