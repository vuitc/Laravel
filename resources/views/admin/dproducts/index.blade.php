@extends('admin.master')
@section('title', 'Admin - CtProduct Index')
@section('content')
    <div class="span9">
        <h1>CtProducts</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('dproduct.create') }}" class="btn btn-primary">Create CtProduct</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID Product</th>
                    <th>ID Color</th>
                    <th>ID Size</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Discount</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ctProducts as $ctProduct)
                    <tr>
                        <td>{{ $ctProduct->idproduct }}</td>
                        <td>{{ $ctProduct->idcolor }}</td>
                        <td>{{ $ctProduct->idsize }}</td>
                        <td>{{ $ctProduct->price }}</td>
                        <td>{{ $ctProduct->soluongton }}</td>
                        <td>{{ $ctProduct->giamgia }}</td>
                        <td>
                            @if ($ctProduct->image)
                                <img src="{{ asset('eshoe/img/' . $ctProduct->image) }}" alt="Product Image" width="50">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('dproduct.show', ['idproduct' => $ctProduct->idproduct, 'idcolor' => $ctProduct->idcolor, 'idsize' => $ctProduct->idsize]) }}" class="btn btn-info">View</a>
                            <a href="{{ route('dproduct.edit', ['idproduct' => $ctProduct->idproduct, 'idcolor' => $ctProduct->idcolor, 'idsize' => $ctProduct->idsize]) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('dproduct.destroy', ['idproduct' => $ctProduct->idproduct, 'idcolor' => $ctProduct->idcolor, 'idsize' => $ctProduct->idsize]) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">Không có CtProducts nào được tìm thấy.</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8">
                        {{ $ctProducts->links() }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
