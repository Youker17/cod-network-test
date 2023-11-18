@extends('layout.global')

@section('content')
    <div style="display: flex; flex-direction: column; align-items: center;">
        <h2>Show Category</h2>

        <div>
            <strong>Name:</strong> {{ $category->name }}
        </div>

        <div>
            <strong>Parent Category:</strong>
            @if($category->parentCategory)
                {{ $category->parentCategory->name }}
            @else
                None
            @endif
        </div>

        <div>
            <strong>Created at:</strong> {{ $category->created_at }}
        </div>

        <div>
            <strong>Updated at:</strong> {{ $category->updated_at }}
        </div>

        <div style="margin-top: 20px;">
            <a href="{{ route('categories.index') }}">Back to All Categories</a>
        </div>
    </div>
@endsection