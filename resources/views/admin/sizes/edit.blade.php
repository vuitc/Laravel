@extends('admin.master')
@section('title', 'Admin - Edit Category')
@section('content')
<div class="span9">
    <h1>Edit Size</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('size.update', $size->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="size">Size:</label>
            <input type="text" class="form-control" id="size" name="size" value="{{ old('size', $size->size) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
