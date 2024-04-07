@extends('admin.master')
@section('title', 'Admin - Edit Category')
@section('content')
    <div class="span9">
        <h1>Delete Slider</h1>
        <p>Are you sure you want to delete the slider "{{ $slider->slider }}"?</p>
        <form action="{{ route('slider.destroy', $slider->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="{{ route('slider.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection