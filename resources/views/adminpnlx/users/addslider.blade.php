@extends('adminpnlx.layouts.default')
@section('section')

<section>
  <form action="{{ route('addslider') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6">
          <div class="row">
            <div class="col text-center">
              <h1>Register</h1>
            <div class="row align-items-center">
              <div class="col mt-4">
                <div class="form-group">
                  <label for="firstname"><b>Title</b></label>
                  <input type="text" class="form-control" placeholder="Enter First Name" name="title" id="title" required>
                </div>
              </div>
              </div>

              <div class="col mt-4">
                <div class="form-group">
                  <label for="lastname"><b>Sub Title</b></label>
                  <input type="text" class="form-control" placeholder="Enter Sub Title" name="subtitle" required>
                </div>
              </div>

            <div class="mb-3">
                <label for="sliderimage" class="form-label">sliderimage</label>
                <input type="file" class="form-control" id="sliderimage" name="sliderimage" accept="image/*" >
            </div>


            <div class="row align-items-center mt-4">
              <div class="col">
                <input type="desc" class="form-control" name="description" placeholder="Description">
              </div>
            </div>
            <div class="row align-items-center mt-4">
              <div class="col">
                <input type="text" class="form-control" name="button_text" placeholder="button_text">
              </div>
            </div>
            <div class="row align-items-center mt-4">
                <div class="col">
                  <input type="text" class="form-control" name="button_link" placeholder="button_link">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function () {
    /*------------------------------------------
    --------------------------------------------
    Country Dropdown Change Event
    --------------------------------------------
    --------------------------------------------*/
    $('#country-dropdown').on('change', function () {
      var idCountry = this.value;
      $("#state-dropdown").html('');
      $.ajax({
        url: "{{url('api/fetch-states')}}",
        type: "POST",
        data: {
          country_id: idCountry,
          _token: '{{csrf_token()}}'
        },
        dataType: 'json',
        success: function (result) {
          $('#state-dropdown').html('<option value="">-- Select State --</option>');
          $.each(result.states, function (key, value) {
            $("#state-dropdown").append('<option value="' + value.id + '">' + value.name + '</option>');
          });
          $('#city-dropdown').html('<option value="">-- Select City --</option>');
        }
      });
    });

    /*------------------------------------------
    --------------------------------------------
    State Dropdown Change Event
    --------------------------------------------
    --------------------------------------------*/
    $('#state-dropdown').on('change', function () {
      var idState = this.value;
      $("#city-dropdown").html('');
      $.ajax({
        url: "{{url('api/fetch-cities')}}",
        type: "POST",
        data: {
          state_id: idState,
          _token: '{{csrf_token()}}'
        },
        dataType: 'json',
        success: function (res) {
          $('#city-dropdown').html('<option value="">-- Select City --</option>');
          $.each(res.cities, function (key, value) {
            $("#city-dropdown").append('<option value="' + value.id + '">' + value.name + '</option>');
          });
        }
      });
    });
  });
</script>
@endsection
