@extends('admin.master')
@section('title', 'Admin - Edit Category')
@section('content')
    <div class="span9">
        <h1>Delete Product</h1>
        <p>Are you sure you want to delete the product "{{ $product->name }}"?</p>
        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection