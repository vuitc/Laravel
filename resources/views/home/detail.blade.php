@extends('home.master')
@section('title','Detail')
@section('content')
{{-- Sử dụng dump để hiển thị dữ liệu --}}
{{-- @dump($products) --}}
     <!-- Page Header Start -->
     <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop Detail</p>
            </div>
        </div>
    </div>
</div>
</div>
</div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
           
               
                    <div class="col-lg-5 pb-5">
                        <div id="product-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner border">
                                <div class="carousel-item active">
                                    {{-- @dump($product->ctProducts->toArray()) --}}
                                    @php
                                        $ctProductsArray=$product->ctProducts->toArray()
                                        @endphp
                                        <script>
                                            var ctProductsArray = @json($ctProductsArray);
                                            // Sử dụng ctProductsArray trong JavaScript
                                            console.log(ctProductsArray);
                                        </script>
                                    {{-- @dump($selectedProduct) --}}
                                    {{-- @dump($selectedColor)
                                    @dump($selectedSize) --}}
                                    <img class="w-100 h-100" src="{{ asset('eshoe/img/'.$selectedProduct->image) }}" alt="Image">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 pb-5">
                        <h3 class="font-weight-semi-bold">{{$product->name}}</h3>
                        <div class="d-flex mb-3">
                            <div class="text-primary mr-2">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star-half-alt"></small>
                                <small class="far fa-star"></small>
                            </div>
                            <small class="pt-1">(50 Reviews)</small>
                        </div>
                        <div class="font-weight-semi-bold mb-4 d-flex justify-content-left">
                            @if($selectedProduct->soluongton>0)
                                <h6>
                                    @php
                                        $priceSP = \App\Function\Help::formatVND($selectedProduct->price);    
                                    @endphp
                                    {{ $priceSP }}
                                </h6>
                                <h6 class="text-muted ml-2">
                                    @if($selectedProduct->giamgia > 0)
                                        @php
                                            $discountedPrice = \App\Function\Help::tinhGiamGia($selectedProduct->price, $selectedProduct->giamgia);    
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
                        <p class="mb-4">{{$product->mota}}</p>
                        <div class="d-flex mb-3">
                            <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>

                                @foreach($product->ctProducts->pluck('idsize')->unique() as $idSize)
                                {{-- @dump($idSize); --}}
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="size-{{$idSize}}" name="size" {{ $idSize == $selectedSize ? 'checked' : '' }} value="{{$idSize}}">
                                        <label class="custom-control-label" for="size-{{$idSize}}">{{$sizes->where('id', $idSize)->first()['size']}}</label>
                                    </div>
                                    @endforeach
                                    {{-- hidden --}}
                        </div>
                        <form action="{{ route('addToCart') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex mb-4">
                                <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>

                                    @foreach($product->ctProducts->pluck('idcolor')->unique() as $idColor)
                                        {{-- @dump($idColor); --}}
                                        <div class="custom-control custom-radio custom-control-inline">
                                            @php
                                                $nameColor = $colors->where('id', $idColor)->first();
                                            @endphp

                                            <input type="radio" class="custom-control-input" id="color-{{$idColor}}" name="color" {{ $idColor == $selectedColor ? 'checked' : '' }} value="{{$idColor}}">
                                            <label class="custom-control-label" for="color-{{$idColor}}">{{$colors->where('id', $idColor)->first()['color']}}</label>
                                        </div>

                                    @endforeach
                                    <input type="hidden" name="checksize" value="{{$selectedSize}}" id="selectedSize">
                                    <input type="hidden" name="checkcolor" value="{{$selectedColor}}" id="selectedColor">
                                    <input type="hidden" name="checkid" value="{{$selectedProduct->idproduct}}" id="selectedColor">
                            </div>
                            <div class="d-flex align-items-center mb-4 pt-2">
                                <div class="input-group quantity mr-3" style="width: 130px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary btn-minus" type="button" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control bg-secondary text-center" value="1" id="quantityInput" name="soluong">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary btn-plus" type="button">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                            </div>
                        </form>
                        <div class="d-flex pt-2">
                            <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                            <div class="d-inline-flex">
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-pinterest"></i>
                                </a>
                            </div>
                        </div>
                    </div>
               
        </div>
        {{-- js ở đây --}}
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
   $(document).ready(function () {
    // Lắng nghe sự kiện click nút giảm
    $('.btn-minus').click(function () {
        var quantityInput = $('#quantityInput');
        var currentValue = parseInt(quantityInput.val(), 10);
        if (currentValue <1) {
            quantityInput.val(1);
        }
    });

    // Lắng nghe sự kiện click nút tăng
    $('.btn-plus').click(function () {
        var quantityInput = $('#quantityInput');
        var currentValue = parseInt(quantityInput.val(), 10);
        var selectedSize = $('input[name="size"]:checked').val();
        var selectedColor = $('input[name="color"]:checked').val();

        var soluong = ctProductsArray.find(item => item.idcolor == selectedColor && item.idsize == selectedSize);

        // Kiểm tra nếu giá trị hiện tại là một số nguyên và nhỏ hơn số lượng tồn thì mới tăng
        if (currentValue <= soluong.soluongton) {
            // quantityInput.val(currentValue + 1);
        } else {
            quantityInput.val(soluong.soluongton);
            alert('Vượt quá số lượng tồn của kho');
        }
    });
});



    $(document).ready(function () {
        // Lắng nghe sự kiện thay đổi của input size
        $('input[name="size"]').change(function () {
            var selectedSize = $('input[name="size"]:checked').val(); // Retrieve the value of the selected radio button
            console.log('Selected Size:', selectedSize); // Log the selected size
            $('#selectedSize').val(selectedSize);
            updatePrice();
        });

        // Lắng nghe sự kiện thay đổi của input color
        $('input[name="color"]').change(function () {
            var selectedColor = $('input[name="color"]:checked').val(); // Retrieve the value of the selected radio button
            console.log('Selected Color:', selectedColor); // Log the selected color
            $('#selectedColor').val(selectedColor);
            updatePrice();
        });

        function updatePrice() {
            // Add your logic for updating the price here
        }
        
    });
</script>

        

        {{-- js ở đây --}}
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <p>{{$product->mota}}</p>
                        <p>Dolore magna est eirmod sanctus dolor, amet diam et eirmod et ipsum. Amet dolore tempor consetetur sed lorem dolor sit lorem tempor. Gubergren amet amet labore sadipscing clita clita diam clita. Sea amet et sed ipsum lorem elitr et, amet et labore voluptua sit rebum. Ea erat sed et diam takimata sed justo. Magna takimata justo et amet magna et.</p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Additional Information</h4>
                        <p>{{$product->chitiet}}</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                    </li>
                                  </ul> 
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                    </li>
                                  </ul> 
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">1 review for "Colorful Stylish Shirt"</h4>
                                <div class="media mb-4">
                                    <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                        <div class="text-primary mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>
                                <small>Your email address will not be published. Required fields are marked *</small>
                                <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Your Rating * :</p>
                                    <div class="text-primary">
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <form>
                                    <div class="form-group">
                                        <label for="message">Your Review *</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Your Name *</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email *</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection