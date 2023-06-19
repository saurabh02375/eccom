@extends('adminpnlx.layouts.default')
@section('section')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <a href="{{ route('categoryaddpage') }}" class="btn btn-primary">Add Category</a>
                    </div>
                    {{-- {{ route('addslider') }} --}}
                    <table class="table datatable">
                        <thead>
                            <tr>

                                <th scope="col">name</th>
                                <th scope="col"> catimage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $view)
                                <tr>

                                    <td> {{ $view->name }}</td>
                                    <td><img style="height:80px;width:80px;"
                                            src="{{ Config('constants.catimage_IMAGE_ROOT_PATH') }}/{{ $view->catimage }}">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" name="delete" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal_{{ $view->id }}">
                                            <a href="{{ route('deletecategorydata', ['id' => $view->id]) }}" class="text-light">
                                                <i class="bi bi-trash-fill"></i> Delete  </a>
                                        </button>
                                        <button class="btn btn-primary" name="edit" data-bs-toggle="modal"
                                        data-bs-target="#editModal_{{ $view->id }}">
                                        <a href="{{ route('categoryupdate', [$view->id]) }}" class="text-light">
                                            <i class="bi bi-pencil-fill"></i> Update
                                        </a>
                                    </button>
                                    </td>
                                    @if($view->is_active==1)
                                    <td>
                                        <button type="button"  class="btn btn-info" > <a href="{{route('categoryStatus' , $view->id)}}">

                                            <i class="bi bi-trash-active"></i> Active <a> </button>
                                        </td>
                                        @else
                                        <td>

                                           <button type="button" class="btn btn-danger"> <a href="{{route('categoryStatus' , $view->id)}}" class="text-light">
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
