@extends('adminpnlx.layouts.default')
@section('section')
    <section>
        <form action="{{ route('savecoupon') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-8 col-xl-6">
                        <div class="row">
                            <div class="col">
                                <h1>Add Coupon</h1>
                                <div class="fow">
                                    <label for="code">Code</label>
                                    <div class="input-group">
                                        <input type="text" name="code" id="code" class="form-control" required>
                                        <div class="input-group-append">
                                            <button type="button" id="generateCode" class="btn btn-secondary">Generate
                                                Code</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="lastname"><b>title</b></label>
                                        <input type="title" class="form-control" name="title" placeholder="Enter  Title"
                                            required>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="form-group">
                                        <label for="lastname"><b>discount_amount</b></label>
                                        <input type="number" step="0.01" class="form-control"
                                            placeholder="discount_amount" name="discount_amount" required>
                                    </div>
                                </div>
                                <div class="col-3 sm-5 ">
                                    <div class="form-group">
                                        <label for="lastname"><b>quantity</b></label>
                                        <input type="number" name="quantity" class="form-control" placeholder="quantity">
                                    </div>
                                </div>
                                <div class="col mt-4">
                                    <div class="form-group">
                                        <label for="used"><b>used</b></label>

                                        <input type="number" name="used" class="form-control" placeholder="quantity">
                                    </div>
                                </div>


                                <div class="form-outline mb-4">
                                    <select name="type">
                                        <option value="percent">Percent</option>
                                        <option value="amount">Amount</option>
                                    </select><br>
                                </div>

                                <div class="row align-items-center mt-4">
                                    <div class="col">
                                        <label for="lastname"><b>start date</b></label>
                                        <input type="date" class="form-control" name="start_at" placeholder="start_at">
                                    </div>
                                </div>
                                <div class="row align-items-center mt-4">
                                    <div class="col">
                                        <label for="lastname"><b>end date</b></label>
                                        <input type="date" class="form-control" name="expire_at" placeholder="expire_at">
                                    </div>
                                </div>
                                <div class="form-check form-switch">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Do you want to give In
                                        user?</label>
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault">
                                    <select id="user" name="user_id" class="form-select" style="display: none;">
                                        @foreach ($user as $users)
                                            <label class="form-label" for="user">Users</label>
                                            <option value="{{ $users->id }}">{{ $users->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-check form-switch">
                                    <label class="form-check-label" for="flexSwitchCheckDefaults">Do you want to give In
                                        user?</label>
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefaults">
                                    <select id="product" name="product_id" class="form-select" style="display: none;">
                                        @foreach ($products as $product)
                                            <label class="form-label" for="user">product_id</label>
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-outline mb-4">

                                </div>


                                <div class="row justify-content-start mt-4">
                                    <div class="col">
                                        <button class="btn btn-primary mt-4">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#generateCode").click(function() {
                var code = "GET" + Math.random().toString().substr(2, 6);
                $("#code").val(code);
            })
        })
        $(document).ready(function() {
            $('#flexSwitchCheckDefault').click(function() {
                if ($(this).is(':checked')) {
                    $('#user').slideDown();
                } else {
                    $('#user').slideUp();
                }
            });
            $('#flexSwitchCheckDefaults').click(function() {
                if ($(this).is(':checked')) {
                    $('#product').slideDown();
                } else {
                    $('#product').slideUp();
                }
            });
        });
    </script>
@endsection
