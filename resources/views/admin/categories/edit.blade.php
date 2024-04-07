@extends('admin.master')

@section('title', 'Admin - Edit Category')

@section('content')
    <h1>Edit Category</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cat.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Sử dụng phương thức PUT để cập nhật dữ liệu -->

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" required>
        </div>

        <div class="form-group">
            <label for="img_chinh">Image:</label>
            <input type="file" name="img_chinh" id="img_chinh" class="form-control-file">
            @if ($category->img_chinh)
                <img src="{{ asset('eshoe/img/' . $category->img_chinh) }}" alt="{{ $category->name }}" width="100">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
@endsection
