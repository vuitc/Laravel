@extends('home.master')
@section('title','Cart')
@section('content')
      <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            {{-- <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div> --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

        </div>
    </div>
    <!-- Page Header End -->
</div>
</div>
</div>
    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @php
                            $sum = 0;    
                        @endphp
                        @foreach(session('cart', []) as $index => $cartItem)
                            <tr>
                                <td class="align-middle">
                                    <img src="{{ asset('eshoe/img/' . $cartItem['image']) }}" alt="" style="width: 50px;"> {{ $cartItem['name'] }}-{{$cartItem['nameSize']}}-{{$cartItem['nameColor']}}
                                </td>
                                <td class="align-middle">
                                    @php
                                        $discountedPrice = \App\Function\Help::tinhGiamGia($cartItem['price'], $cartItem['giamgia']);    
                                    @endphp
                                {{ $discountedPrice }}                                   
                                </td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <!-- Hiển thị số lượng từ Session -->
                                        <a href="{{ route('cart.minus', ['index' => $index]) }}"><i class="fa fa-minus"></i></a>
                                        <input type="text" class="form-control form-control-sm bg-secondary text-center" value="{{ $cartItem['soluongmua'] }}">
                                        <a href="{{ route('cart.plus', ['index' => $index]) }}"><i class="fa fa-plus"></i></a>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    @php
                                        $total = \App\Function\Help::total($cartItem['price'], $cartItem['giamgia'],$cartItem['soluongmua']);    
                                        $sum+=$total;
                                    @endphp
                                    {{ \App\Function\Help::formatVND($total) }}          
                                </td>
                                <td class="align-middle">
                                    <a href="{{ route('cart.del', ['index' => $index]) }}" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                           
                    </tbody>
                    
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium"> @php 
                                echo  \App\Function\Help::formatVND($sum);
                             @endphp</h6>
                             
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">Freeship</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">
                            @php 
                                $fsum = \App\Function\Help::formatVND($sum);
                                echo $fsum;
                            @endphp 
                            </h5>
                        </div>
                        <a href="{{route('home.get.checkout')}}"  class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection