@extends('admin.master')
@section('title','Admin')
    @section('content')
    <div class="span9">
        <h1>Slider Details</h1>
        <table class="table mt-3">
            <tr>
                <th>ID:</th>
                <td>{{ $slider->id }}</td>
            </tr>
            <tr>
                <th>Image:</th>
                <td>
                    <img src="{{ asset('eshoe/img/' . $slider->img) }}" alt="Slider Image" width="100">
                </td>
            </tr>
            <tr>
                <th>Title 1:</th>
                <td>{{ $slider->title1 }}</td>
            </tr>
            <tr>
                <th>Title 2:</th>
                <td>{{ $slider->title2 }}</td>
            </tr>
            <tr>
                <th>Truong:</th>
                <td>{{ $slider->truong }}</td>
            </tr>
        </table>


        <a href="{{ route('slider.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection