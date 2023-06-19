@extends('adminpnlx.layouts.default')
@section('section')

<section>
  <form action="{{ route('addcloth') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6">
          <div class="row">
            <div class="col text-center">
              <h1>Register your Account</h1>
              <p class="text-h3">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>

            <div class="row align-items-center">
              <div class="col mt-4">
                <div class="form-group">
                  <label for="firstname"><b>title</b></label>
                  <input type="text" class="form-control" placeholder="Enter First Name" name="title" id="title" required>
                </div>
              </div>
              <div class="col mt-4">
                <div class="form-group">
                  <label for="firstname"><b>clothtype</b></label>
                  <input type="text" class="form-control" placeholder="Enter clothtype Name" name="clothtype" id="title" required>
                </div>
              </div>
              <div class="col mt-4">
                <div class="form-group">
                  <label for="firstname"><b>price</b></label>
                  <input type="text" class="form-control" placeholder="Enter price " name="price" id="title" required>
                </div>
              </div>
            <div class="mb-3">
                <label for="sliderimage" class="form-label">clothimage</label>
                <input type="file" class="form-control" id="sliderimage" name="clothimage" accept="image/*" >
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
