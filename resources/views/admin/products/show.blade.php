@extends('admin.master')
@section('title','Admin')
    @section('content')
    <div class="span9">
        <h1>Product Details</h1>

        <table class="table mt-3">
            <tr>
                <th>ID:</th>
                <td>{{ $product->id }}</td>
            </tr>
            <tr>
                <th>Name:</th>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <th>Category:</th>
                <td>{{ $product->category->name }}</td>
            </tr>
            <tr>
                <th>Special:</th>
                <td>{{ $product->dacbiet}}</td>
            </tr>
            <tr>
                <th>Views:</th>
                <td>{{ $product->luotxem }}</td>
            </tr>
            <tr>
                <th>Date Created:</th>
                <td>{{ $product->ngaylap }}</td>
            </tr>
            <tr>
                <th>Description:</th>
                <td>{{ $product->mota }}</td>
            </tr>
            <tr>
                <th>Details:</th>
                <td>{{ $product->chitiet }}</td>
            </tr>
        </table>

        <a href="{{ route('product.index') }}" class="btn btn-primary">Back to Product List</a>
    </div>
@endsection