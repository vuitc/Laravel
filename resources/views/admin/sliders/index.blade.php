@extends('admin.master')
@section('title','Admin')
    @section('content')
    <div class="span9">
        <h1>Slider List</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('slider.create') }}" class="btn btn-primary mb-3">Create Slider</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title 1</th>
                    <th>Title 2</th>
                    <th>Truong</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sliders as $slider)
                    <tr>
                        <td>{{ $slider->id }}</td>
                        <td>
                            <img src="{{ asset('eshoe/img/' . $slider->img) }}" alt="Slider Image" width="50">
                        </td>
                        <td>{{ $slider->title1 }}</td>
                        <td>{{ $slider->title2 }}</td>
                        <td>{{ $slider->truong }}</td>
                        <td>
                            <a href="{{ route('slider.show', $slider->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('slider.destroy', $slider->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No sliders found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection