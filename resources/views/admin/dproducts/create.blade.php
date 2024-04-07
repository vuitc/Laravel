@extends('admin.master')
@section('title', 'Admin - Create CtProduct')
@section('content')
    <div class="span9">
        <h1>Create CtProduct</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('dproduct.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="idproduct">ID Product:</label>
                <select class="form-control" id="idproduct" name="idproduct">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="idcolor">ID Color:</label>
                <select class="form-control" id="idcolor" name="idcolor">
                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}">{{ $color->color }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="idsize">ID Size:</label>
                <select class="form-control" id="idsize" name="idsize">
                    @foreach ($sizes as $size)
                        <option value="{{ $size->id }}">{{ $size->size }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}">
            </div>

            <div class="form-group">
                <label for="soluongton">Quantity:</label>
                <input type="number" class="form-control" id="soluongton" name="soluongton" value="{{ old('soluongton') }}">
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <div class="form-group">
                <label for="giamgia">Discount:</label>
                <input type="number" class="form-control" id="giamgia" name="giamgia" value="{{ old('giamgia') }}">
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
