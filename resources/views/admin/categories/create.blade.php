@extends('admin.master')

@section('title', 'Admin - Create Category')

@section('content')
    <h1>Create Category</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="img_chinh">Image:</label>
            <input type="file" name="img_chinh" id="img_chinh" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Create Category</button>
    </form>
@endsection
