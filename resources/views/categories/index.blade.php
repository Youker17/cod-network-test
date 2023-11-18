@extends('layout.global')

@section('content')
    <div style="display: flex;flex-direction: column">
        <div style="display: flex;flex-direction: row;align-items: center;padding: 10px; justify-content: space-between">
            <h2>All Categories </h2>
            <a href="{{ route('categories.create') }}">Create a new category</a>
        </div>

        <table>
            <tr>
                <th>Name</th>
                <th>Parent Category</th>
                <th>Actions</th>
            </tr>
            @if (count($categories) == 0)
                <tr>
                    <td colspan="3">No categories found.</td>
                </tr>
            @endif
            @foreach ($categories as $category)
                <tr style="border: solid black 1px;">
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->parent ? $category->getParent->name : 'N/A' }}</td>
                    <td>
                        <a href="{{ route('categories.show', $category->id) }}">Show</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $categories->links('pagination::bootstrap-4') }}
    </div>
@endsection
