@extends('adminpnlx.layouts.default')
@section('section')

<section>
  <form action="{{ route('addoffer') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6">
          <div class="row">
            <div class="col text-center">
              <h1>Register </h1>

            <div class="row align-items-center">
              <div class="col mt-4">
                <div class="form-group">
                  <label for="firstname"><b>title</b></label>
                  <input type="text" class="form-control" placeholder="Enter First Name" name="title" id="title" required>
                </div>
              </div>
              <div class="col mt-4">
                <div class="form-group">
                  <label for="firstname"><b>subtitle</b></label>
                  <input type="text" class="form-control" placeholder="Enter clothtype Name" name="subtitle" id="title" required>
                </div>
              </div>
              <div class="col mt-4">
                <div class="form-group">
                  <label for="firstname"><b>price</b></label>
                  <input type="text" class="form-control" placeholder="Enter price " name="price" id="title" required>
                </div>
              </div>
              <div class="col mt-4">
                <div class="form-group">
                  <label for="firstname"><b>description</b></label>
                  <input type="text" class="form-control" placeholder="Enter price " name="description" id="title" required>
                </div>
              </div>
            <div class="mb-3">
                <label for="sliderimage" class="form-label">offerimage</label>
                <input type="file" class="form-control" id="sliderimage" name="offerimage" accept="image/*" >
            </div>
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

@endsection
