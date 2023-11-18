@extends('layout.global')

@section('content')
    <div style="display: flex; flex-direction: column; align-items: center;">
        <h2>Create a New Category</h2>

        <form method="POST" action="{{ route('categories.store') }}" style="width: 300px;">
            @csrf
            @method('POST')
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="parent_category">Parent Category:</label>
            <select id="parent_category" name="parent_category">
                <option value="">None</option>
                @foreach ($parentCategories as $parentCategory)
                    <option value="{{ $parentCategory->id }}">{{ $parentCategory->name }}</option>
                @endforeach
            </select>

            <button type="submit">Create Category</button>
        </form>
    </div>
@endsection