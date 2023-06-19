@extends('adminpnlx.layouts.default')
@section('section')
    <div class="card-toolbar position-relative">

        <a href="{{ route('slideraddpage') }}" class="btn btn-primary position-absolute" style="top:-10px;right:0;3">Add
            Slider</a>
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

                                    <th scope="col">title</th>
                                    <th scope="col">subtitle</th>
                                    <th scope="col">description</th>
                                    <th scope="col"> button_text</th>
                                    <th scope="col"> button_link</th>
                                    <th scope="col"> sliderimage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($slider as $view)
                                    <tr>

                                        <td> {{ $view->title }}</td>
                                        <td> {{ $view->subtitle }}</td>
                                        <td> {{ $view->description }}</td>
                                        <td> {{ $view->button_text }}</td>
                                        <td> {{ $view->button_link }}</td>
                                        <td><img style="height:80px;width:80px;"
                                                src="{{ Config('constants.slider_IMAGE_ROOT_PATH') }}/{{ $view->sliderimage }}">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger" name="delete"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $view->id }}">
                                                <a href="{{ route('deleteData', ['id' => $view->id]) }}" class="text-light">
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
                                                        href="{{ route('Status', $view->id) }}">

                                                        <i class="bi bi-trash-active"></i> Active <a> </button>
                                            </td>
                                        @else
                                            <td>

                                                <button type="button" class="btn btn-danger"> <a
                                                        href="{{ route('Status', $view->id) }}" class="text-light">
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
