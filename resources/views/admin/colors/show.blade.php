@extends('admin.master')
@section('title','Admin')
    @section('content')
    <div class="span9">
        <h1>Color Details</h1>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>ID:</th>
                    <td>{{ $color->id }}</td>
                </tr>
                <tr>
                    <th>Color:</th>
                    <td>{{ $color->color }}</td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('color.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection