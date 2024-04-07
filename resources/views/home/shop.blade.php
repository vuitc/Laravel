@extends('home.master')
@section('title','Home')
@section('content')
    <!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{route('home.get.index')}}">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shop</p>
        </div>
    </div>
</div>
<!-- Page Header End -->
</div>
</div>
</div>
<!-- Navbar End -->





<!-- Shop Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-12">
            <!-- Price Start -->
           <div class="vu_common-sidebar-widget">
                <div class="vu_sidebar-title">Color</div>
                {{-- dsColor --}}
                <ul class="vu_sidebar-list">
                    @foreach($dsColor as $item)
                        <li><a href="{{route('home.get.shop',['idcolor'=>$item->id])}}">{{$item->color}}</a></li>
                    @endforeach
                </ul>
                
           </div>
            <!-- Price End -->
            
            <!-- Color Start -->
            <div class="vu_common-sidebar-widget">
                <div class="vu_sidebar-title">Size</div>
                {{-- dsSize --}}
                <ul class="vu_sidebar-list">
                    @foreach($dsSize as $item)
                        <li><a href="{{route('home.get.shop',['idsize'=>$item->id])}}">{{$item->size}}</a></li>
                    @endforeach
                </ul>
                
           </div>
            <!-- Color End -->

            <!-- Size Start -->
           
            <!-- Size End -->
        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-12">
            <div class="row pb-3">

                @php $isHangHoa=false @endphp
                    @foreach($products as $product)
                        @if($product->ctProducts->isNotEmpty())
                            @php
                                $isHangHoa = true;
                            @endphp   
                            @foreach ($product->ctProducts->take(1) as $ctProduct)
                           
                            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                                    <div class="card product-item border-0 mb-4">
                                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                            <img class="img-fluid w-100" src="{{asset('eshoe/img/'.$ctProduct->image)}}" alt="">
                                        </div>
                                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                            <h6 class="text-truncate mb-3">{{ $product->name }}</h6>
                                            <div class="d-flex justify-content-center">
                                                @if($ctProduct->soluongton>0)
                                                    <h6>
                                                        @php
                                                            $priceSP = \App\Function\Help::formatVND($ctProduct->price);    
                                                        @endphp
                                                        {{ $priceSP }}
                                                    </h6>
                                                    <h6 class="text-muted ml-2">
                                                        @if($ctProduct->giamgia > 0)
                                                            @php
                                                                $discountedPrice = \App\Function\Help::tinhGiamGia($ctProduct->price, $ctProduct->giamgia);    
                                                            @endphp
                                                            <h6 class="text-muted ml-2">
                                                                <del>{{ $discountedPrice }}</del>
                                                            </h6>
                                                        @endif
                                                    </h6>
                                                @else
                                                    <h6>Sản phẩm đang cập nhật</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex justify-content-between bg-light border">
                                            <a href="{{route('home.get.detail',['id'=>$product->id])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                            {{-- <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a> --}}
                                            <form action="{{ route('addToCart') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" class="form-control bg-secondary text-center" value="1" name="soluong">
                                                <input type="hidden" name="checkid" value="{{ $product->id }}">
                                                <input type="hidden" name="checkcolor" value="{{ $ctProduct->idcolor }}">
                                                <input type="hidden" name="checksize" value="{{ $ctProduct->idsize }}">
                                                <button type="submit" class="btn btn-sm text-dark p-0">
                                                    <i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart
                                                </button>
                                            </form> 
                                        </div>
                                    </div>
                               
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                        @if (!$isHangHoa)
                            <h2>Chưa có sản phẩm</h2>
                        @endif
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->
@endsection