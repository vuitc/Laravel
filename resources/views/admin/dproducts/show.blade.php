@extends('admin.master')
@section('title', 'Admin - View CtProduct')
@section('content')
    <div class="span9">
        <h1>Xem CtProduct</h1>

        <table class="table">
            <tbody>
                <tr>
                    <th>ID Sản phẩm:</th>
                    <td>{{ $ctProduct->idproduct }}</td>
                </tr>
                <tr>
                    <th>ID Màu sắc:</th>
                    <td>{{ $ctProduct->idcolor }}</td>
                </tr>
                <tr>
                    <th>ID Kích thước:</th>
                    <td>{{ $ctProduct->idsize }}</td>
                </tr>
                <tr>
                    <th>Giá:</th>
                    <td>{{ $ctProduct->price }}</td>
                </tr>
                <tr>
                    <th>Số lượng tồn:</th>
                    <td>{{ $ctProduct->soluongton }}</td>
                </tr>
                <tr>
                    <th>Giảm giá:</th>
                    <td>{{ $ctProduct->giamgia }}</td>
                </tr>
                <tr>
                    <th>Ảnh:</th>
                    <td>
                        @if ($ctProduct->image)
                            <img src="{{ asset('eshoe/img/' . $ctProduct->image) }}" alt="Hình ảnh sản phẩm" width="100">
                        @else
                            Không có ảnh
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('dproduct.index') }}" class="btn btn-secondary">Quay lại</a>
    </div>
@endsection

