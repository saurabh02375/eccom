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
                               <form method="POST" action="{{ route('productpostupdate', $user->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Update name</label>
                                            <input type="text" name="name" class="form-control" id="yourName"
                                                value="{{ $user->name }}">
                                            <div class="invalid-feedback">Please enter your name!</div>
                                        </div>

{{--
                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Update brand_id</label>
                                            <input type="text" name="brand_id" class="form-control" id="yourName"
                                                value="{{ $user->brand_id }}">
                                            <div class="invalid-feedback">Please enter your brand_id!</div>
                                        </div>
                                    </div> --}}

{{--

                                    <div class="row align-items-center mt-4">
                                        <div class="col">

                                            <label for="yourName" class="form-label">Update Brand</label>
                                            <select id="state-dropdown" name="brand_id" class="form-control">
                                                <option value="" selected disabled hidden>{{$user->brandname}}</option>
                                                @foreach ($brand as $brands)
                                                    <option value="{{ $brands->id }}"
                                                        @if ($brands->id == $brands->name) selected @endif>
                                                        {{ $brands->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                        </div>
                                    </div> --}}




                                        <div class="form-outline mb-4">
                                            <select id="brand" name="brand_id" class="form-select" >
                                            <label class="form-label"  for="brand">Brand</label>
                                            @foreach($brand as $brands)
                                                <option value="{{ $brands->id }}" {{$user->brand_id == $brands->id ? 'selected' :''}}>{{ $brands->name }}</option>
                                              @endforeach
                                            </select>
                                          </div>

                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Update price</label>
                                            <input type="text" name="price" class="form-control" id="yourName"
                                                value="{{ $user->price }}">
                                            <div class="invalid-feedback">Please enter your price!</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Update description</label>
                                            <input type="text" name="description" class="form-control" id="yourName"
                                                value="{{ $user->description }}">
                                            <div class="invalid-feedback">Please enter your description!</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-4">

                                              <div class="mb-3">
                                                  <label for="image"  class="form-label">Image</label>
                                                  <input type="file" class="form-control" id="image" name="image" accept="image/*" >
                                              </div>
                                            </div>
                                            <button class="btn btn-primary w-100" type="submit">Update Account</button>
                                        </div>

                                    </form>
                                   <span class="position-relative"> <img  src="{{config('constants.Product_image_path')}}/{{$user->image}}" class="card-image" style="height:250px;width:250px;position:absolute;left:500px;right:0%; top:-300px;"></span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection
