@extends('admin.layout.master')
@section('adminContent')
    <!-- MAIN CONTENT-->
    <style>
        .card {
            padding: 1.5em .5em .5em;
            border-radius: 2em;
            text-align: center;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        }
    </style>
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="row">
                <div class="col-4">
                    @if (session('updateSuccess'))
                  <div class="">
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <i class="fa-solid fa-check me-2"></i>{{ session('updateSuccess') }}
                          <button type="button" class="btn-close" data-bs-dismiss="alert"
                              aria-label="Close"></button>
                      </div>
                  </div>
              @endif</div>
                <div class="col-4 offset-4">
                    <form class="form-header" action="{{ route('admin#productListPage') }}" method="GET">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control"name="searchKey"value="{{ request('searchKey') }}"
                                placeholder="product....." aria-describedby="button-addon2">
                            <button class="btn btn-secondary" type="submit" id="button-addon2"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="container-fluid">
                @if (count($products) != 0)
                    <div class="row">
                        @foreach ($products as $p)
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-title text-bold">{{ $p->name }}</div>
                                    <div class="card-body">
                                        <img src="{{ asset('storage/' . $p->image) }}"
                                            alt=""style="width:400px; height:200px"class="img-thumbnail rounded mx-auto d-block">
                                        <div class="row mt-2">
                                            <div class="col text-muted">
                                                price
                                            </div>
                                            <div class="col text-muted">
                                                -
                                            </div>
                                            <div class="col text-muted">{{ $p->price }}Kyats</div>
                                        </div>
                                        <div class="row mt-4 p-1">
                                            <div class="col"> <a href="{{ route('admin#productMore', $p->id) }}">
                                                    <button class="btn rounded-pill btn btn-secondary"data-toggle="tooltip"
                                                        data-placement="top"title="More">
                                                        <i class="zmdi zmdi-more text-white"></i></button></a>
                                            </div>
                                            <div class="col"> <a href="{{ route('admin#productEdit', $p->id) }}">
                                                    <button
                                                        class="btn rounded-pill btn btn-secondary"title="Edit"data-toggle="tooltip"
                                                        data-placement="top">
                                                        <i class="zmdi zmdi-edit text-white"></i></button></a>
                                            </div>
                                            <div class="col"> <a href="{{route("admin#productDelete",$p->id)}}">
                                                    <button class="btn rounded-pill btn btn-secondary"data-toggle="tooltip"
                                                        data-placement="top"title="Delete">
                                                        <i class="zmdi zmdi-delete text-white"></i></button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-muted fs-3 text-center mt-5">
                    <i class="fa-solid fa-face-sad-tear me-3 text-danger"></i>There is no product here!
            </div>
            @endif

            <div class="">
                {{ $products->links() }}
            </div>
        </div>
    </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
