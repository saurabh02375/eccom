@extends('adminpnlx.layouts.default')
@section('section')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <a href="{{ route('addblog') }}" class="btn btn-primary">Add Blog</a>
                    </div>
                    {{-- {{ route('addslider') }} --}}
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">title</th>
                                <th scope="col">subtitle</th>
                                <th scope="col"> description</th>
                                <th scope="col"> Blogimage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Blog as $view)
                                <tr>

                                    <td> {{ $view->title }}</td>
                                    <td> {{ $view->subtitle }}</td>
                                    <td> {{ $view->description }}</td>
                                    <td><img style="height:80px;width:80px;"
                                            src="{{ Config('constants.catimage_IMAGE_ROOT_PATH') }}/{{ $view->blogimage }}">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" name="delete" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal_{{ $view->id }}">
                                            <a href="{{ route('deleteblog', ['id' => $view->id]) }}" class="text-light">
                                                <i class="bi bi-trash-fill"></i> Delete  </a>
                                        </button>
                                        <button class="btn btn-primary" name="edit" data-bs-toggle="modal"
                                        data-bs-target="#editModal_{{ $view->id }}">
                                        <a href="{{ route('blogupdate', [$view->id]) }}" class="text-light">
                                            <i class="bi bi-pencil-fill"></i> Update
                                        </a>
                                    </button>
                                    </td>
                                    @if($view->is_active==1)
                                    <td>
                                        <button type="button"  class="btn btn-info" > <a href="{{route('blogstatus' , $view->id)}}">

                                            <i class="bi bi-trash-active"></i> Active <a> </button>
                                        </td>
                                        @else
                                        <td>

                                           <button type="button" class="btn btn-danger"> <a href="{{route('blogstatus' , $view->id)}}" class="text-light">
                                                <i class="bi bi-trash-active"></i> Deactive <a> </button>
                                            </td>
                                        </td>


                                        @endif

                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>

        </div>
        </div>

    </section>
@endsection
