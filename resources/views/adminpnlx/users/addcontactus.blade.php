@extends('adminpnlx.layouts.default')
@section('section')
    <section>
        <form action="{{ route('addcontactus') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-8 col-xl-6">
                        <div class="row">
                            <div class="col text-center">
                                <h1>Register your Account</h1>

                                <div class="row align-items-center">
                                    <div class="col mt-4">
                                        <div class="form-group">
                                            <label for="email"><b>email </b></label>
                                            <input type="text" class="form-control" placeholder="Enter email"
                                                name="email" id="title" required>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col mt-4">
                                            <div class="form-group">
                                                <label for="phone"><b>phone </b></label>
                                                <input type="text" class="form-control" placeholder="Enter phone"
                                                    name="phone" id="title" required>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col mt-4">
                                                <div class="form-group">
                                                    <label for="firstname"><b>address</b></label>
                                                    <input type="address" class="form-control" placeholder="Enter address "
                                                        name="address" id="title" required>
                                                </div>
                                            </div>
                                            <div class="row align-items-center">
                                                <div class="col mt-4">
                                                    <div class="form-group">
                                                        <label for="firstname"><b>description</b></label>
                                                        <input type="desc" class="form-control"
                                                            placeholder="Enter description " name="description"
                                                            id="title" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="row">
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
            /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#country-dropdown').on('change', function() {
                var idCountry = this.value;
                $("#state-dropdown").html('');
                $.ajax({
                    url: "{{ url('api/fetch-states') }}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#state-dropdown').html(
                            '<option value="">-- Select State --</option>');
                        $.each(result.states, function(key, value) {
                            $("#state-dropdown").append('<option value="' + value.id +
                                '">' + value.name + '</option>');
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
            $('#state-dropdown').on('change', function() {
                var idState = this.value;
                $("#city-dropdown").html('');
                $.ajax({
                    url: "{{ url('api/fetch-cities') }}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                        $.each(res.cities, function(key, value) {
                            $("#city-dropdown").append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection
