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

                                    <form method="POST" action="{{ route('sliderpostupdate', $user->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="col-12">
                                            <label for="title" class="form-label">Update Title</label>
                                            <input type="text" name="title" class="form-control" id="yourName"
                                                value="{{ $user->title }}">
                                            <div class="invalid-feedback">Please enter your name!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourName" class="form-label"> subtitle</label>
                                            <input type="text" name="subtitle" class="form-control" id="yourName"
                                                value="{{ $user->subtitle }}">
                                            <div class="invalid-feedback">Please enter subtitle!</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourName" class="form-label"> Description</label>
                                            <input type="text" name="description" class="form-control" id="yourName"
                                                value="{{ $user->description }}">
                                            <div class="invalid-feedback">Please enter description!</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourName" class="form-label"> button_text</label>
                                            <input type="text" name="button_text" class="form-control" id="yourName"
                                                value="{{ $user->button_text }}">
                                            <div class="invalid-feedback">Please enter button_text!</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourName" class="form-label"> button_link</label>
                                            <input type="text" name="button_link" class="form-control" id="yourName"
                                                value="{{ $user->button_link }}">
                                            <div class="invalid-feedback">Please enter button_link!</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-4">

                                              <div class="mb-3">
                                                  <label for="image"  class="form-label">Image</label>
                                                  <input type="file" class="form-control" id="image" name="sliderimage" accept="image/*" >
                                              </div>
                                            </div>
                                            <button class="btn btn-primary w-100" type="submit">Update Account</button>
                                        </div>

                                    </form>
                                   <span class="position-relative"> <img  src="{{config('constants.Slider_image_path') }}/{{ $user->sliderimage }}" class="card-image" style="height:250px;width:250px;position:absolute;left:500px;right:0%; top:-300px;"></span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection
