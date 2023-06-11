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
                                <h2 class="title-1 text-muted">Booking List</h2>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="col-4 float-end">
                                <form class="form-header" action="{{route("admin#bookingList")}}" method="GET">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control"name="key"value="{{ request('key') }}"
                                            placeholder="Search....." aria-describedby="button-addon2">
                                        <button class="btn btn-secondary" type="submit" id="button-addon2"><i
                                                class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END DATA TABLE -->
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>date</th>
                                    <th>time</th>
                                    <th>people</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $b)
                                    <tr class="tr-shadow">
                                        <td>{{ $b->name }}</td>
                                        <td>{{ $b->email }}</td>
                                        <td>{{ $b->date }}</td>
                                        <td>{{ $b->time }}</td>
                                        <td>{{ $b->people }}</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="{{ route('admin#bookingMore', $b->id) }}">
                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="More">
                                                        <i class="zmdi zmdi-more"></i>
                                                    </button>
                                                </a>
                                                <a href="{{ route('admin#bookingDelete', $b->id) }}">
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
                    <div class="">
                        {{ $books->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
