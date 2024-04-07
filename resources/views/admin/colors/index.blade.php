@extends('admin.master')
@section('title','Admin')
    @section('content')
    <div class="span9">
        <h1>Color List</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('color.create') }}" class="btn btn-primary mb-3">Create Color</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Color</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($colors as $color)
                    <tr>
                        <td>{{ $color->id }}</td>
                        <td>{{ $color->color }}</td>
                        <td>
                            <a href="{{ route('color.show', $color->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('color.edit', $color->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('color.destroy', $color->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No colors found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection