@extends('adminpnlx.layouts.default')
@section('section')
    <div class="card-toolbar position-relative">

        <a href="{{ route('addcoupon') }}" class="btn btn-primary position-absolute" style="top:-10px;right:0;3">Add
            Coupon</a>
    </div>


    <section class="section mt-5">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">


                        {{-- {{ route('addslider') }} --}}
                        <table class="table datatable">
                            <thead>
                                <tr>


                                    <th scope="col">Coupon Code</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Discount_Amount</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Start_date</th>
                                    <th scope="col"> End_date</th>
                                    <th scope="col"> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupon as $view)
                                    <tr>
                                        <td> {{ $view->code }}</td>
                                        <td> {{ $view->title }}</td>
                                        <td> {{ $view->discount_amount }}</td>
                                        <td> {{ $view->quantity }}</td>
                                        <td> {{ $view->type }}</td>
                                        <td> {{ $view->start_at }}</td>
                                        <td> {{ $view->expire_at }}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger" name="delete"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $view->id }}">
                                                <a href="{{ route('deletecoupon', ['id' => $view->id]) }}"
                                                    class="text-light">
                                                    <i class="bi bi-trash-fill"></i> Delete </a>
                                            </button>
                                            <button class="btn btn-primary" name="edit" data-bs-toggle="modal"
                                                data-bs-target="#editModal_{{ $view->id }}">
                                                <a href="{{ route('updateCouponpage', [$view->id]) }}" class="text-light">
                                                    <i class="bi bi-pencil-fill"></i> Update
                                                </a>
                                            </button>

                                            @if ($view->is_active == 1)
                                                <button type="button" class="btn btn-info"> <a
                                                        href="{{ route('couponstatus', $view->id) }}">
                                                        <i class="bi bi-trash-active"></i> Active <a> </button>
                                            @else
                                                <button type="button" class="btn btn-danger"> <a
                                                        href="{{ route('couponstatus', $view->id) }}" class="text-light">
                                                        <i class="bi bi-trash-active"></i> Deactive <a> </button>

                                        </td>
                                @endif



                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection
