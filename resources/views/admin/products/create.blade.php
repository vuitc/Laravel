@extends('admin.master')
@section('title','Admin')
    @section('content')
    <div class="span9">
        <h1>Create Product</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('product.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="id_category">Category:</label>
                <select class="form-control" id="id_category" name="id_category" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="dacbiet">Special Product:</label>
                <input type="checkbox" class="form-check-input" id="dacbiet" name="dacbiet" value="1" {{ old('dacbiet') ? 'checked' : '' }}>
            </div>

            <div class="form-group">
                <label for="luotxem">Views:</label>
                <input type="number" class="form-control" id="luotxem" name="luotxem" value="{{ old('luotxem') }}" required>
            </div>

            <div class="form-group">
                <label for="ngaylap">Date Created:</label>
                <input type="date" class="form-control" id="ngaylap" name="ngaylap" value="{{ old('ngaylap') }}" required>
            </div>

            <div class="form-group">
                <label for="mota">Description:</label>
                <textarea class="form-control" id="mota" name="mota" rows="3" required>{{ old('mota') }}</textarea>
            </div>

            <div class="form-group">
                <label for="chitiet">Details:</label>
                <textarea class="form-control" id="chitiet" name="chitiet" rows="5" required>{{ old('chitiet') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection