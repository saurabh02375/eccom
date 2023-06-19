@extends('user.layout.default')
@section('section')
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="shopping-cart spad">
        <div class="container">
            <form action="{{ route('proceed') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th class="p-name">Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th><i class="ti-close"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $view)
                                        <tr>
                                            <td class="cart-pic first-row"><img
                                                    src="{{ Config('constants.Product_image_path') }}/{{ $view->image }}"
                                                    alt="">
                                            </td>
                                            <td class="cart-title first-row">
                                                <h5>{{ $view->name }}</h5>
                                            </td>
                                            <td>
                                                <input type="hidden" name="product_id" value="{{ $view->id }}">
                                            </td>
                                            <td class="p-price first-row">
                                                <span data-id="{{ $view->id }}" id="price_{{ $view->id }}">
                                                    {{ $view->price }}</span>
                                            </td>
                                            <td class="qua-col first-row">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <span class="dec qtybtn" data-id="{{ $view->id }}">-</span>
                                                        <input type="text" value="1" min="0" class="quantity"
                                                            data-id="{{ $view->id }}"
                                                            name="quantity[{{ $view->product_id }}]"
                                                            id="addprice{{ $view->id }}">
                                                        <span class="inc qtybtn" data-id="{{ $view->id }}">+</span>
                                                    </div>

                                                </div>
                                            </td>
                                            <td class="total-price first-row">
                                                <span data-id="{{ $view->id }}" id="total_{{ $view->id }}"
                                                    class="total">
                                                    {{ $view->price }}</span>
                                            </td>
                                            <td class="close-td first-row"><a
                                                    href="{{ route('deletecart', $view->id) }}"><i class="ti-close"></i>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        {{-- <input type="text" name="finalprice" value="{{ $subtotal }}" class="sub">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="cart-buttons">
                                    <a href="#" class="primary-btn continue-shop">Continue shopping</a>
                                    <a href="#" class="primary-btn up-cart">Update cart</a>
                                </div>
                                <div class="discount-coupon">
                                    <h6>Discount Codes</h6>
                                    <form id="coupon_form">
                                        <input type="text" class="coupon_code" id="coupon_code" name="coupon_code"
                                            placeholder="Enter your codes">
                                        <input type="hidden" class="subtotals" name="subtotal"
                                            value="{{ $subtotal }}">
                                        <button type="button" onclick="applycouponcode()"
                                            class="site-btn coupon-btn">Apply</button>


                                    </form>

                                </div>
                                <div id="coupon_code_msg">
                                    Hello
                                </div>
                            </div> --}}

                        {{-- </form> --}}
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">


                                <button type="submit" class="proceed"> PROCEED TO CHECK OUT</button>
                            </div>
                        </div>
            </form>


        </div>
        </div>
        </div>
        </div>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // function applycouponcode() {
        //     $('#coupon_code').html('');
        //     var coupon = $('#coupon').val();

        //     $.ajax({
        //         type: 'POST',
        //         url: '{{ route('applyCoupon') }}',
        //         data: {
        //             coupon_code: coupon_code,
        //             _token: "{{ csrf_token() }}"
        //         },
        //         success: function(response) {

        //         }
        //     })
        // }

        // function applycouponcode() {
        //     var loginForm = $('#coupon_form').closest("form");
        //     var loginFormData = new FormData(loginForm[0]);
        //     loginFormData.append('review_id', review_id);

        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     $.ajax({
        //         method: 'POST',
        //         url: "{{ route('applyCoupon') }}",
        //         data: loginFormData,
        //         contentType: false,
        //         cache: false,
        //         processData: false,
        //         success: function(data) {
        //             if (data.status == true) {
        //                 console.log('success: ' + data.message);
        //             } else {
        //                 $('#coupon_code_msg').html('Failed to apply the coupon code.');
        //             }
        //         },
        //         error: function() {
        //             $('#coupon_code_msg').html('An error occurred during the AJAX request.');
        //         }
        //     });
        // }
    </script>
@endsection
