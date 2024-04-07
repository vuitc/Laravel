@extends('admin.master')
@section('title','Admin')
    @section('content')
    <div class="span9">
        <h1>Categories</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('cat.create') }}" class="btn btn-primary">Create Category</a>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                @if ($category->img_chinh)
                                    <img src="{{ asset('eshoe/img/' . $category->img_chinh) }}" alt="{{ $category->name }}" width="50" height="40px" >
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('cat.show', $category->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('cat.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('cat.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No categories found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
    </div>
@endsection