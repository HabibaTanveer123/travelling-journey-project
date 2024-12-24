<x-web-layout>
<div class="bg-image">

    <div class="container mt-4">
        <h1>Categories</h1>

        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Add Category</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <ul class="list-group">
            @foreach($categories as $category)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $category->name }}
                    <span class="d-flex">
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
</x-web-layout>
