@extends('adminpnlx.layouts.default')
@section('section')
    <div class="card-toolbar position-relative">

        <a href="{{ route('addeuserpage') }}" class="btn btn-primary position-absolute" style="top:-10px;right:0;3">Add
            user</a>
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

                                    <th scope="col">name</th>
                                    <th scope="col">email </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $view)
                                    <tr>

                                        <td> {{ $view->name }}</td>
                                        <td> {{ $view->email }}</td>

                                        <td>
                                            <button type="button" class="btn btn-danger" name="delete"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $view->id }}">
                                                <a href="{{ route('deleteuser', ['id' => $view->id]) }}" class="text-light">
                                                    <i class="bi bi-trash-fill"></i> Delete </a>
                                            </button>
                                            <button class="btn btn-primary" name="edit" data-bs-toggle="modal"
                                                data-bs-target="#editModal_{{ $view->id }}">
                                                <a href="{{ route('sliderupdate', [$view->id]) }}" class="text-light">
                                                    <i class="bi bi-pencil-fill"></i> Update
                                                </a>
                                            </button>
                                        </td>

                                        @if ($view->is_active == 1)
                                            <td>
                                                <button type="button" class="btn btn-info"> <a
                                                        href="{{ route('userstatus', $view->id) }}">

                                                        <i class="bi bi-trash-active"></i> Active <a> </button>
                                            </td>
                                        @else
                                            <td>

                                                <button type="button" class="btn btn-danger"> <a
                                                        href="{{ route('userstatus', $view->id) }}" class="text-light">
                                                        <i class="bi bi-trash-active"></i> Deactive <a> </button>
                                            </td>
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
