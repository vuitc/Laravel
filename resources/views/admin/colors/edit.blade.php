@extends('admin.master')
@section('title', 'Admin - Edit Category')
@section('content')
<div class="span9">
    <h1>Edit Color</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('color.update', $color->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="color">Color:</label>
            <input type="text" class="form-control" id="color" name="color" value="{{ old('color', $color->color) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
