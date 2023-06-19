@extends('adminpnlx.layouts.default')
@section('section')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <a href="{{ route('contacttablepage') }}" class="btn btn-primary">Add Contact Detail</a>
                    </div>
                    {{-- {{ route('addslider') }} --}}
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">email 	</th>
                                <th scope="col">address	</th>
                                <th scope="col"> phone</th>
                                <th scope="col"> description</th>
                           >

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contactus as $view)
                                <tr>

                                    <td> {{ $view->address }}</td>
                                    <td> {{ $view->email }}</td>
                                    <td> {{ $view->phone }}</td>
                                    <td> {{ $view->description }}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger" name="delete" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal_{{ $view->id }}">
                                            <a href="{{ route('deletecontactus', ['id' => $view->id]) }}" class="text-light">
                                                <i class="bi bi-trash-fill"></i> Delete  </a>
                                        </button>
                                        <button class="btn btn-primary" name="edit" data-bs-toggle="modal"
                                        data-bs-target="#editModal_{{ $view->id }}">
                                        <a href="{{ route('contactusupdate', [$view->id]) }}" class="text-light">
                                            <i class="bi bi-pencil-fill"></i> Update
                                        </a>
                                    </button>
                                    </td>
                                    @if($view->is_active==1)
                                    <td>
                                        <button type="button"  class="btn btn-info" > <a href="{{route('contactstatus' , $view->id)}}">
                                            <i class="bi bi-trash-active"></i> Active <a> </button>
                                        </td>
                                        @else
                                        <td>
                                           <button type="button" class="btn btn-danger"> <a href="{{route('contactstatus' , $view->id)}}" class="text-light">
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
