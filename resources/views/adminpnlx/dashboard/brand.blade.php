@extends('adminpnlx.layouts.default')
@section('section')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <a href="{{ route('brandadd') }}" class="btn btn-primary">Add Brand</a>
                    </div>
                    {{-- {{ route('addslider') }} --}}
                    <table class="table datatable">
                        <thead>
                            <tr>

                                <th scope="col">name</th>
                                <th scope="col"> image</th>
                                <th scope="col"> description</th>
                                <th scope="col"> Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brand as $view)
                                <tr>

                                    <td> {{ $view->name }}</td>
                                    <td><img style="height:80px;width:80px;"
                                            src="{{ Config('constants.catimage_IMAGE_ROOT_PATH') }}/{{ $view->image }}">
                                    </td>
                                    <td>{{ $view->description }} </td>
                                    <td>
                                        <button type="button" class="btn btn-danger deleteButton" name="delete"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $view->id }}">
                                            <a href="{{ route('deletebrand', ['id' => $view->id]) }}" class="text-light">
                                                <i class="bi bi-trash-fill"></i> Delete
                                            </a>
                                        </button>
                                        <button class="btn btn-primary" name="edit" data-bs-toggle="modal"
                                        data-bs-target="#editModal_{{ $view->id }}">
                                        <a href="{{ route('brandupdate', [$view->id]) }}" class="text-light">
                                            <i class="bi bi-pencil-fill"></i> Update
                                        </a>
                                    </button>
                                        <script>
                                            < script >
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    var deleteButtons = document.querySelectorAll('.deleteButton');
                                                    var confirmDeleteButton = document.getElementById('confirmDeleteButton');

                                                    deleteButtons.forEach(function(button) {
                                                        button.addEventListener('click', function() {
                                                            var deleteUrl = button.querySelector('a').href;
                                                            confirmDeleteButton.href = deleteUrl;
                                                            $('#confirmationModal').modal('show');
                                                        });
                                                    });
                                                });
                                        </script>;
                                        </script>

                                        @if ($view->is_active == 1)
                                    <td>
                                        <button type="button" class="btn btn-info"> <a
                                                href="{{ route('brandstatus', $view->id) }}">

                                                <i class="bi bi-trash-active"></i> Active <a> </button>
                                    </td>
                                @else
                                    <td>

                                        <button type="button" class="btn btn-danger"> <a
                                                href="{{ route('brandstatus', $view->id) }}" class="text-light">
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
