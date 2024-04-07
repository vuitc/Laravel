@extends('admin.master')
@section('title', 'Admin - Edit Size')
@section('content')
    <div class="span9">
        <h1>Delete Size</h1>
        <p>Are you sure you want to delete the size "{{ $size->size }}"?</p>
        <form action="{{ route('size.destroy', $size->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="{{ route('size.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection