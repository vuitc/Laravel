@extends('admin.master')
@section('title','Admin')
    @section('content')
    <div class="span9">
        <h1>Size List</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('size.create') }}" class="btn btn-primary mb-3">Create Size</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Size</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sizes as $size)
                    <tr>
                        <td>{{ $size->id }}</td>
                        <td>{{ $size->size }}</td>
                        <td>
                            <a href="{{ route('size.show', $size->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('size.edit', $size->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('size.destroy', $size->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No sizes found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection