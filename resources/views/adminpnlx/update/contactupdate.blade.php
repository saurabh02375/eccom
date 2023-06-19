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

                                    <form method="POST" action="{{ route('contactpostupdate', $user->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Update phone</label>
                                            <input type="text" name="phone" class="form-control" id="yourName"
                                                value="{{ $user->phone }}">
                                            <div class="invalid-feedback">Please enter your phone!</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Update address</label>
                                            <input type="text" name="address" class="form-control" id="yourName"
                                                value="{{ $user->address }}">
                                            <div class="invalid-feedback">Please enter your address!</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Update email</label>
                                            <input type="email" name="email" class="form-control" id="yourName"
                                                value="{{ $user->email }}">
                                            <div class="invalid-feedback">Please enter your email!</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Update description</label>
                                            <input type="text" name="description" class="form-control" id="yourName"
                                                value="{{ $user->description }}">
                                            <div class="invalid-feedback">Please enter your description!</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-4">


                                            <button class="btn btn-primary w-100" type="submit">Update Account</button>
                                        </div>

                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection
