@extends('admin.master')
@section('title', 'Admin - Edit Category')
@section('content')
<div class="span9">
    <h1>Edit Slider</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="img">Image:</label>
                <input type="file" class="form-control" id="img" name="img">
                <img src="{{ asset('eshoe/img/' . $slider->img) }}" alt="Current Image" width="100" class="mt-2">
            </div>

            <div class="form-group">
                <label for="title1">Title 1:</label>
                <input type="text" class="form-control" id="title1" name="title1" value="{{ old('title1', $slider->title1) }}">
            </div>

            <div class="form-group">
                <label for="title2">Title 2:</label>
                <input type="text" class="form-control" id="title2" name="title2" value="{{ old('title2', $slider->title2) }}">
            </div>

            <div class="form-group">
                <label for="truong">Truong:</label>
                <input type="number" class="form-control" id="truong" name="truong" value="{{ old('truong', $slider->truong) }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
</div>
@endsection
