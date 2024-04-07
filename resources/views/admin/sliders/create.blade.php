@extends('admin.master')
@section('title','Admin')
    @section('content')
    <div class="span9">
        <h1>Create Slider</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="img">Image:</label>
            <input type="file" class="form-control" id="img" name="img">
        </div>

        <div class="form-group">
            <label for="title1">Title 1:</label>
            <input type="text" class="form-control" id="title1" name="title1" value="{{ old('title1') }}">
        </div>

        <div class="form-group">
            <label for="title2">Title 2:</label>
            <input type="text" class="form-control" id="title2" name="title2" value="{{ old('title2') }}">
        </div>

        <div class="form-group">
            <label for="truong">Truong:</label>
            <select class="form-control" id="truong" name="truong">
                <option value="1" {{ old('truong') == '1' ? 'selected' : '' }}>Ảnh Carousel</option>
                <option value="2" {{ old('truong') == '2' ? 'selected' : '' }}>Ảnh Sale</option>
                <option value="3" {{ old('truong') == '3' ? 'selected' : '' }}>Ảnh Thương Hiệu</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Slider</button>
    </form>
    </div>
@endsection