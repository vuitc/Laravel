@extends('admin.master')
@section('title', 'Admin - Edit CtProduct')
@section('content')
    <div class="span9">
        <h1>Edit CtProduct</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('dproduct.update', ['idproduct' => $ctProduct->idproduct, 'idcolor' => $ctProduct->idcolor, 'idsize' => $ctProduct->idsize]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="idproduct">Product Name:</label>
                <select class="form-control" id="idproduct" name="idproduct" disabled>
                    <option value="{{ $ctProduct->idproduct }}" selected>{{ $ctProduct->product->name }}</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="idcolor">Color Name:</label>
                <select class="form-control" id="idcolor" name="idcolor" disabled>
                    <option value="{{ $ctProduct->idcolor }}" selected>{{ $ctProduct->color->color }}</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="idsize">Size Name:</label>
                <select class="form-control" id="idsize" name="idsize" disabled>
                    <option value="{{ $ctProduct->idsize }}" selected>{{ $ctProduct->size->size }}</option>
                </select>
            </div>
            
            
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $ctProduct->price) }}">
            </div>

            <div class="form-group">
                <label for="soluongton">Quantity:</label>
                <input type="number" class="form-control" id="soluongton" name="soluongton" value="{{ old('soluongton', $ctProduct->soluongton) }}">
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image">
                <img src="{{ asset('eshoe/img/' . $ctProduct->image) }}" alt="Current Image" width="100" class="mt-2">
            </div>

            <div class="form-group">
                <label for="giamgia">Discount:</label>
                <input type="number" class="form-control" id="giamgia" name="giamgia" value="{{ old('giamgia', $ctProduct->giamgia) }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('dproduct.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
