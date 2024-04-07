@extends('admin.master')
@section('title', 'Admin - Edit Category')
@section('content')
    <div class="span9">
        <h1>Delete Color</h1>
        <p>Are you sure you want to delete the color "{{ $color->color }}"?</p>
        <form action="{{ route('colors.destroy', $color->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="{{ route('color.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection