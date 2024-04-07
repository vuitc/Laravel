    @extends('home.master')
    @section('title','Home')
        @section('content')

    {{-- khung 3 div --}}
{{-- Hiển thị mảng bằng cách sử dụng @foreach --}}
{{-- @foreach($productedAoDai as $key => $value)
    <p>{{ $value }}</p>
@endforeach --}}
       <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @php $isActive=false;@endphp
            @foreach($slider as $item)
                @if($item->truong==1)
                    @if(!$isActive)
                        <div class="carousel-item active" style="height: 410px;">
                            @php $isActive=true;@endphp
                    @else
                        <div class="carousel-item" style="height: 410px;">
                    @endif
                            <img class="img-fluid" src="{{ asset('eshoe/img/' . $item->img) }}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">{{$item->title1}}</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">{{$item->title2}}</h3>
                                    <a href="{{ route('home.get.shop') }}" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                @endif
            @endforeach
           
        </div>
        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-prev-icon mb-n2"></span>
            </div>
        </a>
        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-next-icon mb-n2"></span>
            </div>
        </a>
    </div>
</div>
</div>
</div>

<!-- Navbar End -->


<!-- Featured Start -->
<div class="container-fluid pt-5">
<div class="row px-xl-5 pb-3">
<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
    <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
        <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
        <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
    <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
        <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
        <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
    <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
        <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
        <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
    <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
        <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
        <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
    </div>
</div>
</div>
</div>
<!-- Featured End -->

{{-- $ctgy --}}
<!-- Categories Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        @php $index=1;@endphp
        @foreach($ctgy as $item)
            <div class="col-lg-3 col-md-4 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <a href="{{ route('home.get.shop', ['idcatalog' => $index]) }}" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="{{ asset('eshoe/img') . '/' . $item->img_chinh }}" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">{{ $item->name }}</h5>
                </div>
            </div>
            @php $index++;@endphp
        @endforeach
    </div>
</div>
<!-- Categories End -->

{{-- $slider 2--}}
<!-- Offer Start -->
<div class="container-fluid offer pt-5">
<div class="row px-xl-5">
    @foreach($slider as $item)
        @if($item->truong == 2)
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="{{ asset('eshoe/img/' . $item->img) }}" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">{{$item->title1}}</h5>
                        <h1 class="mb-4 font-weight-semi-bold">{{$item->title2}}</h1>
                        <a href="{{ route('home.get.shop') }}" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
        @endif
    @endforeach

</div>
</div>
<!-- Offer End -->


<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Sản phẩm mới nhất</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        @foreach ($productedNew as $product)
            @foreach ($product->ctProducts->take(1) as $ctProduct)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
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
                            <a href="{{ route('home.get.detail',['id'=>$product->id]) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <form action="{{ route('addToCart') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control bg-secondary text-center" value="1" id="quantityInput" name="soluong">
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
        {{-- Thêm các trường khác cần hiển thị --}}
            @endforeach
        @endforeach
    </div>
</div>
<!-- Products End -->
<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Sản phẩm mới nhất</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        @foreach ($productedHot as $product)
            @foreach ($product->ctProducts->take(1) as $ctProduct)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
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
                            <a href="{{ route('home.get.detail',['id'=>$product->id]) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
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
                            {{-- <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a> --}}
                        </div>
                    </div>
                </div>
        {{-- Thêm các trường khác cần hiển thị --}}
            @endforeach
        @endforeach
    </div>
</div>
<!-- Products End -->

<!-- Subscribe Start -->
<div class="container-fluid bg-secondary my-5">
<div class="row justify-content-md-center py-5 px-xl-5">
<div class="col-md-6 col-12 py-5">
    <div class="text-center mb-2 pb-2">
        <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Stay Updated</span></h2>
        <p>Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo ipsum eirmod duo labore labore.</p>
    </div>
    <form action="">
        <div class="input-group">
            <input type="text" class="form-control border-white p-4" placeholder="Email Goes Here">
            <div class="input-group-append">
                <button class="btn btn-primary px-4">Subscribe</button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
<!-- Subscribe End -->


<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Áo dài</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        @foreach($productedAoDai as $product)
            @foreach ($product->ctProducts->take(1) as $ctProduct)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{asset('eshoe/img/'.$ctProduct->image)}}" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{$product->name}}</h6>
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
                            <a href="{{ route('home.get.detail',['id'=>$product->id]) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
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
        @endforeach
    </div>
</div>
<!-- Products End -->

{{-- slider 3 --}}
<!-- Vendor Start -->
<div class="container-fluid py-5">
<div class="row px-xl-5">
<div class="col">
    <div class="owl-carousel vendor-carousel">
        @foreach($slider as $item)
            @if($item->truong == 3)
                <div class="vendor-item border p-4">
                    <img src="{{asset('eshoe/img/'.$item->img)}}" alt="">
                </div>
            @endif
        @endforeach
    </div>
</div>
</div>
</div>
<!-- Vendor End -->
@endsection