@extends('user.layout.default')
@section('section')
    <!-- Hero Section Begin -->

    <section class="hero-section">
        <div class="hero-items owl-carousel">
            @foreach ($slider as $slider)
                @if ($slider->is_active == 1)
                    <div class="single-hero-items set-bg"
                        data-setbg="{{ Config('constants.slider_IMAGE_ROOT_PATH') }}/{{ $slider->sliderimage }}">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5">
                                 <h4>   <span>{{ $slider->subtitle }}</span></h4>
                                    <h1>{{ $slider->title }}</h1>
                                    <p>{{ $slider->description }}</p>

                                    <a href="viewshop" class="primary-btn">Shop Now</a>
                                </div>
                            </div>
                            <div class="off-card">
                                <h2>Sale <span>50%</span></h2>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            {{-- <div class="single-hero-items set-bg" data-setbg="img/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                @foreach ($category as $cat)
                @if($cat->is_active== 1)
                    <div class="col-lg-4" style="height:400px;">
                        <div class="single-banner h-100">
                            <img src="{{ Config('constants.catimage_IMAGE_ROOT_PATH') }}/{{ $cat->catimage }} "  alt="" style="max-height: 100%; max-width: 100%;">
                            <div class="inner-text">
                                <h4>{{ $cat->name }} </h4>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="img/products/women-large.jpg">
                        <h2>Women’s</h2>
                        <a href="#">Discover More</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <li class="active">Clothings</li>
                            <li class="'active"> HandBag</li>
                            <li>Shoes</li>
                            <li>Accessories</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                        @foreach ($clothing as $view)
                            <div class="product-item" style="height:350px;width:300px;">
                                <div class="pi-pic h-75">
                                    <img src="{{ Config('constants.catimage_IMAGE_ROOT_PATH') }}/{{ $view->clothimage }}" alt="" class="h-100">
                                    <div class="sale">sa</div>
                                    <div class="icon">
                                        <i class="icon_heart_alt"  > <a hred=""> </i>
                                    </div>
                                    <ul>
                                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                        <li class="quick-view"><a href="#">+ Quick View</a></li>
                                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">
                                        <td> {{ $view->clothtype }}</td>
                                    </div>
                                    <a href="#">
                                        <td> {{ $view->title }}</td>
                                    </a>
                                    <div class="product-price">
                                        <td> {{ $view->price }}</td>
                                        <span>$35.00</span>
                                    </div>

                                </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Women Banner Section End -->

    <!-- Deal Of The Week Section Begin-->
        @foreach ($offer as $view)
        @if($view->is_active== 1)
        <div class="pi-pic h-150">
    <section class="deal-of-week set-bg spad" data-setbg="{{ Config('constants.catimage_IMAGE_ROOT_PATH') }}/{{ $view->offerimage }}" class="h-100">
        <div class="container">

            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <td> {{ $view->title }}</td>
                    <td> {{ $view->description }}</td>
                    <div class="product-price">
                        <td> {{ $view->price }} Rs. Only</td>

                    </div>
                    <td> {{ $view->subtitle }}</td>
                </div>
                <div class="countdown-" id="countdown">
                    <div class="cd-item">
                        <span>56</span>
                        <p>Days</p>
                    </div>
                    <div class="cd-item">
                        <span>12</span>
                        <p>Hrs</p>
                    </div>
                    <div class="cd-item">
                        <span>40</span>
                        <p>Mins</p>
                    </div>
                    <div class="cd-item">
                        <span>52</span>
                        <p>Secs</p>
                    </div>
                </div>
                <a href="#" class="primary-btn">Shop Now</a>
            </div>
        </div>
        @endif
        @endforeach
    </section>
    <!-- Deal Of The Week Section End -->

    <!-- Man Banner Section Begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control">
                        <ul>
                            <li class="active">Clothings</li>
                            <li>HandBag</li>
                            <li>Shoes</li>
                            <li>Accessories</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
@foreach ($clothing2 as $clothsec )
@if($clothsec->is_active==1)


                        <div class="product-item" style="height:400px;">
                            <div class="pi-pic h-75">
                                <img src="{{ Config('constants.catimage_IMAGE_ROOT_PATH') }}/{{ $clothsec->clothimage }}" class="h-100" alt="">
                                <div class="sale">Sale</div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">{{ $clothsec->clothtype }}</div>
                                <a href="#">
                                    <h5>{{ $clothsec->title }}</h5>
                                </a>
                                <div class="product-price">
                                    {{ $clothsec->price }}
                                    <span>$35.00</span>
                                </div>
                            </div>
                        </div>
                        @endif

           @endforeach

                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg m-large" data-setbg="img/products/man-large.jpg">
                        <h2>Men’s</h2>
                        <a href="#">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Man Banner Section End -->

    <!-- Instagram Section Begin -->
    <div class="instagram-photo">
        <div class="insta-item set-bg" data-setbg="img/insta-1.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-2.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-3.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-4.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-5.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-6.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
    </div>
    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row ">
                @foreach($blog as $view)
                @if($view->is_active== 1)
                <div class="col-lg-4 col-md-6" style="-ms-scrollbar-3dlight-color: 00px;">
                    <div class="single-latest-blog h-75">
                        <img src="{{ Config('constants.catimage_IMAGE_ROOT_PATH') }}/{{ $view->blogimage }}" alt="" class="h-75">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    {{date("d-m-Y",strtotime($view->created_at))}}
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>{{ $view->title }}</h4>
                            </a>
                            <p>{{ $view->description }} </p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free Shipping</h6>
                                <p>For all order over 99$</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="img/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Delivery On Time</h6>
                                <p>If good have prolems</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Secure Payment</h6>
                                <p>100% secure payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->

    <!-- Partner Logo Section Begin -->
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
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
@endsection
