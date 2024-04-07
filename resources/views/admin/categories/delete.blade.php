@extends('admin.master')

@section('title', 'Admin - Delete Category')

@section('content')
    <h1>Delete Category</h1>

    <p>Are you sure you want to delete the category "{{ $category->name }}"?</p>

    <form action="{{ route('cat.destroy', $category->id) }}" method="POST">
        @csrf
        @method('DELETE') 

        <button type="submit" class="btn btn-danger">Delete</button>
        <a href="{{ route('cat.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
