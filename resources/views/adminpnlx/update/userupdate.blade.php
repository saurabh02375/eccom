@extends('user.layout.default')
@section('section')
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Update Your Details</p>

                                    <form method="POST" action="{{ route('updatecoupon', $user->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="fow">
                                            <label for="code">Code</label>
                                            <div class="input-group">
                                                <input type="text" value="{{ $user->code }}"name="code"
                                                    id="code" class="form-control" required>
                                                <div class="input-group-append">
                                                    <button type="button" id="generateCode"
                                                        class="btn btn-secondary">Generate
                                                        Code</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Update title</label>
                                            <input type="text" name="title" class="form-control" id="yourName"
                                                value="{{ $user->title }}">
                                            <div class="invalid-feedback">Please enter your title!</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourName" class="form-label"> discount_amount</label>
                                            <input type="number" name="discount_amount" class="form-control" id="yourName"
                                                value="{{ $user->discount_amount }}">
                                            <div class="invalid-feedback">Please enter discount_amount!</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourName" class="form-label"> quantity</label>
                                            <input type="number" name="quantity" class="form-control" id="yourName"
                                                value="{{ $user->quantity }}">
                                            <div class="invalid-feedback">Please enter quantity!</div>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <select name="type" value="{{ $user->type }}">
                                                <option value="percent">Percent</option>
                                                <option value="amount">Amount</option>
                                            </select><br>
                                        </div>
                                        <div class="col-12">
                                            <label for="start_at" class="form-label">Update start_at</label>
                                            <input type="date" name="start_at" class="form-control" id="yourName"
                                                value="{{ $user->start_at }}">
                                            <div class="invalid-feedback">Please enter your start_at!</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="expire_at" class="form-label">Update
                                                expire_at</label>
                                            <input type="date" name="expire_at" class="form-control"
                                                value="{{ $user->expire_at }}"id="yourName">
                                            <div class="invalid-feedback">Please enter your expire_at!</div>
                                        </div>
                                        <button class="btn btn-primary w-100" type="submit">Update Account</button>
                                </div>
                                </form>
                                <span class="position-relative"> <img
                                        src="{{ config('constants.brand_image_path') }}/{{ $user->image }}"
                                        class="card-image"
                                        style="height:250px;width:250px;position:absolute;left:500px;right:0%; top:-300px;"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#generateCode").click(function() {
                var code = "GET" + Math.random().toString().substr(2, 6);
                $("#code").val(code);
            })
        })
    </script>
@endsection
