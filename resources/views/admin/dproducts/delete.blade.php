@extends('admin.master')
@section('title', 'Admin - Delete CtProduct')
@section('content')
    <div class="span9">
        <h1>Delete CtProduct</h1>

        <p>Are you sure you want to delete this CtProduct?</p>

        <dl class="row">
            <dt class="col-sm-2">ID Product:</dt>
            <dd class="col-sm-10">{{ $ctProduct->idproduct }}</dd>

            <dt class="col-sm-2">ID Color:</dt>
            <dd class="col-sm-10">{{ $ctProduct->idcolor }}</dd>

            <dt class="col-sm-2">ID Size:</dt>
            <dd class="col-sm-10">{{ $ctProduct->idsize }}</dd>

            <dt class="col-sm-2">Price:</dt>
            <dd class="col-sm-10">{{ $ctProduct->price }}</dd>

            <dt class="col-sm-2">Quantity:</dt>
            <dd class="col-sm-10">{{ $ctProduct->soluongton }}</dd>

            <dt class="col-sm-2">Discount:</dt>
            <dd class="col-sm-10">{{ $ctProduct->giamgia }}</dd>

            <dt class="col-sm-2">Image:</dt>
            <dd class="col-sm-10">
                @if ($ctProduct->image)
                    <img src="{{ asset('eshoe/img/' . $ctProduct->image) }}" alt="Product Image" width="50">
                @else
                    No Image
                @endif
            </dd>
        </dl>

        <form action="{{ route('dproduct.destroy', ['idproduct' => $ctProduct->idproduct, 'idcolor' => $ctProduct->idcolor, 'idsize' => $ctProduct->idsize]) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="{{ route('dproduct.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
