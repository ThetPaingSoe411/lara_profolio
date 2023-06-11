@extends('admin.layout.master')
@section('adminContent')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="title-1 text-muted">Category List</h2>

                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('admin#category') }}">
                                <button class="btn btn-dark">
                                    <i class="zmdi zmdi-plus"></i>add category
                                </button>
                            </a>
                            <button class="btn btn-danger">
                                CSV download
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="col-6 float-end">
                                <form class="form-header" action="{{ route('admin#adminList') }}" method="GET">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="text"
                                            class="form-control"name="searchKey"value="{{ request('searchKey') }}"
                                            placeholder="category....." aria-describedby="button-addon2">
                                        <button class="btn btn-secondary" type="submit" id="button-addon2"><i
                                                class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END DATA TABLE -->

                    <div class="table-responsive table-responsive-data2">
                        @if (count($category) != 0)
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>name</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $c)
                                        <tr class="tr-shadow">
                                            <td>{{ $c->name }}</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <a href="{{ route('admin#editPage', $c->id) }}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('admin#delete', $c->id) }}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                @else
                    <div class="text-muted fs-3 text-center mt-5">
                        <i class="fa-solid fa-face-sad-tear me-3 text-danger"></i>There is no category here!
                    </div>
                    @endif
                    <div class="mt-2">
                        {{ $category->appends(request()->query())->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
