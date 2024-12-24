<x-web-layout>
<div class="bg-image">

    <div class="container mt-4">
        <h1>Create Category</h1>

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Category</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
</x-web-layout>
