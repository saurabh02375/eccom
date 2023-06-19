@extends('user.layout.default')
@section('section')
    <!-- Product Shop Section Begin -->

    <form action="{{ route('viewshop') }}" method="GET" class="mb-3" enctype="multipart/form-data">
        @csrf
        <section class="product-shop spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">

                        <div class="filter-widget">
                            <h4 class="fw-title">Brand</h4>
                            @foreach ($brand as $brand)
                                @if ($brand->is_active == 1)
                                    <div class="fw-brand-check">
                                        <div class="bc-item">
                                            <input type="checkbox" name="brand" class="trail"
                                                value="{{ $brand->id }}">
                                            <label for="brand-{{ $brand->id }}">{{ $brand->name }}</label>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="filter-widget">
                            <h4 class="fw-title">Price</h4>
                            <div class="filter-range-wrap">
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" name="minamount" id="minamount">
                                        <input type="text" name="maxamount" id="maxamount">
                                    </div>

                                </div>
                                @php
                                    $max = $pricerange->max_price;
                                    $min = $pricerange->min_price;
                                @endphp
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="{{ $min }}" data-max="{{ $max }}">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                            </div>
                            <div class="filter-widget">
                                <h4 class="fw-title">Color</h4>
                                @foreach ($colors as $color)
                                    @if ($color)
                                        <div class="fw-brand-check">
                                            <div class="bc-item">
                                                <input type="checkbox" name="searchcolor" value="{{ $color->id }}">
                                                {{-- <input type="checkbox" name="searchcolor" value="{{$color->id}}"> --}}
                                                <label for="color-{{ $color->code }}">{{ $color->type }}</label>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary">Filter</button>
                                <a href="{{ route('viewshop') }}" class="btn btn-danger">Clear</a>
                            </div>
    </form>
    </div>

    <div class="filter-widget">
        <h4 class="fw-title">Size</h4>
        <div class="fw-size-choose">
            <div class="sc-item">
                <input type="radio" id="s-size">
                <label for="s-size">s</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="m-size">
                <label for="m-size">m</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="l-size">
                <label for="l-size">l</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="xs-size">
                <label for="xs-size">xs</label>
            </div>
        </div>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Tags</h4>
        <div class="fw-tags">
            <a href="#">Towel</a>
            <a href="#">Shoes</a>
            <a href="#">Coat</a>
            <a href="#">Dresses</a>
            <a href="#">Trousers</a>
            <a href="#">Men's hats</a>
            <a href="#">Backpack</a>
        </div>
    </div>
    </div>
    <div class="col-lg-9 order-1 order-lg-2">
        <div class="product-show-option">
            <div class="row">
                <div class="col-lg-7 col-md-7">
                    <div class="select-option">
                        <input type="text" value="" name="sortType" class="sort-input">
                        <select class="sorting" name="asc">
                            <option value="ASC">Ascending</option>
                            <option value="DESC">Descending</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    @foreach ($products as $product)
                        @if ($product->is_active == 1)
                            <div class="col-lg-4 col-sm-6 col-12 col-xl-4 cols-md-4" style="height:400px;">
                                <div class="product-item h-75">
                                    <div class="pi-pic h-100">
                                        <img class="h-75"
                                            src="{{ Config('constants.catimage_IMAGE_ROOT_PATH') }}/{{ $product->image }}"
                                            alt="">
                                        <div class="sale pp-sale">Sale</div>

                                        <?php $likeData = customlike($product->id); ?>
                                        {{-- @if (!empty($likeData) && $likeData->is_likes == 1)
                                       <i id="heartIcon" class="'fa-sharp fa-regular fa-heart bg-success"
                                          data-product-id="fa-sharp fa-solid fa-heart "></i>
                                            @else
                                            <i id="heartIcon" class="'fa-sharp fa-regular fa-heart"
                                            data-product-id="fa-sharp fa-solid fa-heart "></i>
                                            @endif --}}
                                        {{-- heartIcon{{$product->id}} --}}
                                        {{--
                                        <i class="fa-sharp fa-solid fa-heart" style="color: #ec2269;"></i>
                                        <i class="fa-sharp fa-light fa-heart" style="color: #1d1b1c;"></i> --}}
                                        <div class="icon">
                                            <?php $likeData = customlike($product->id); ?>

                                            @if (!empty($likeData) && $likeData->is_likes == 1)
                                                <i onclick="likeBtn({{ $product->id }})"id="heartIcon"
                                                    class="fa-sharp fa-regular fa-heart heartIcon{{ $product->id }}"
                                                    style="color: #fa0000;" data-product-id="fa-solid fa-heart"></i>
                                            @else
                                                <i onclick="likeBtn({{ $product->id }})"id="heartIcon"
                                                    class="fa-sharp fa-regular fa-heart heartIcon{{ $product->id }}"
                                                    style="color: #1d1b1c;"></i>
                                            @endif
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a>
                                            </li>

                                            <li class="quick-view">

                                                <a href="{{ route('addtocart', $product->id) }}">
                                                    Add
                                                    to Cart</a>

                                            </li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">{{ $product->brand_id }}</div>
                                        <a href="#">
                                            <h5>{{ $product->name }}</h5>
                                        </a>
                                        <div class="product-price">
                                            {{ $product->price }}
                                            <span>$35.00</span>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                @include('pagination.default', ['products' => $products])
                </section>

                <div class="partner-logo">
                    <div class="container">
                        <div class="logo-carousel owl-carousel">
                            <div class="logo-item">
                                <div class="tablecell-inner">
                                    <img src="img/logo-carousel/logo-1.png" alt="">
                                </div>
                            </div>
                            <div class="logo-item">
                                <div class="tablecell-inner">
                                    <img src="img/logo-carousel/logo-2.png" alt="">
                                </div>
                            </div>
                            <div class="logo-item">
                                <div class="tablecell-inner">
                                    <img src="img/logo-carousel/logo-3.png" alt="">
                                </div>
                            </div>
                            <div class="logo-item">
                                <div class="tablecell-inner">
                                    <img src="img/logo-carousel/logo-4.png" alt="">
                                </div>
                            </div>
                            <div class="logo-item">
                                <div class="tablecell-inner">
                                    <img src="img/logo-carousel/logo-5.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Shop Section End -->

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    var brandCheckboxes = document.querySelectorAll('input[name="brand"]');

                    brandCheckboxes.forEach(function(checkbox) {
                        checkbox.addEventListener('change', function() {
                            var selectedBrands = Array.from(brandCheckboxes)
                                .filter(function(checkbox) {
                                    return checkbox.checked;
                                })
                                .map(function(checkbox) {
                                    return checkbox.value;
                                });

                            // Make AJAX call
                            var xhr = new XMLHttpRequest();
                            xhr.open('GET', "{{ route('viewshop') }}?brand=" + selectedBrands.join(','));
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState === XMLHttpRequest.DONE) {
                                    if (xhr.status === 200) {
                                        // Handle the AJAX response and update the UI accordingly
                                        document.getElementById('brand-filter').innerHTML = xhr.responseText;
                                    } else {
                                        // Handle error
                                        console.error('AJAX request failed.');
                                    }
                                }
                            };
                            xhr.send();
                        });
                    });
                </script>



                <script>
                    function likeBtn(productId) {

                        // var isLikes = $('.like-btn[data-product-id="' + productId + '"]').hasClass('active') ? 1 : 0; // Toggle is_likes value

                        var a = $.ajax({
                            url: "{{ route('storelike') }}",
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                product_id: productId,

                            },
                            success: function(response) {
                                if (response.status == true) {

                                    // $('.like-btn[data-product-id="' + productId + '"]').toggleClass('active');

                                    if (response.is_likes == 1) {
                                        console.log(response.is_likes, 'dsfkjahl')
                                        $('.heartIcon' + productId).css("color", "red");
                                    } else {
                                        console.log(response.is_likes, 'white')
                                        $('.heartIcon' + productId).css("color", "white");
                                    }
                                } else {
                                    console.log('Error occurred while toggling like.');
                                }
                            },
                            error: function() {
                                console.log('AJAX request failed.');
                            }
                        });
                        console.log(a);
                    }

                    // function checkColor(id){

                    //     var dsa = $('#color_'+id).prop(":checked")
                    //     if(dsa == 1){
                    //         $('#color_'+id).val(id)
                    //     }
                    // }
                </script>
            @endsection
