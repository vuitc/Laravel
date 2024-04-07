@extends('home.master')
@section('title','Cart')
@section('content')
      <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Payment</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Payment</p>
            </div>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{route('home.get.index')}}" class="nav-item nav-link active">Về trang chủ</a>
        </div>
    </div>
    <!-- Page Header End -->
</div>
</div>
</div>
    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
           
        </div>
    </div>
    <!-- Cart End -->
@endsection