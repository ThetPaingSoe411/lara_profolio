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
                                <h2 class="title-1 text-muted">User List</h2>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="col-4 float-end">
                                <form class="form-header" action="{{ route('admin#userListPage') }}" method="GET">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="text"
                                            class="form-control"name="searchKey"value="{{ request('searchKey') }}"
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
                        @if (count($users) != 0)
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>image</th>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>phone</th>
                                        <th>role</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $u)
                                        <tr class="tr-shadow">
                                            <td>
                                                @if ($u->image == null)
                                                    @if ($u->gender == 'male')
                                                        <img src="{{ asset('admin/images/male.default.png') }}"
                                                            alt=""class="img-thumbnail"style="width:120px ; height:120px">
                                                    @else
                                                        <img src="{{ asset('admin/images/default.female.png') }}"
                                                            alt=""class="img-thumbnail"style="width:120px ; height:120px">
                                                    @endif
                                                @else
                                                    <img src="{{ asset('storage/' . $u->image) }}"
                                                        alt=""class="img-thumbnail"style="width:120px ; height:120px">
                                                @endif
                                            </td>
                                            <td>{{ $u->name }}</td>
                                            <td>{{ $u->email }}</td>
                                            <td>{{ $u->phone }}</td>
                                            <td><a href="{{ route('admin#userCreate', $u->id) }}"><button
                                                        class="btn btn-dark">User</button></a></td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <a href="{{route("admin#userDelete",$u->id)}}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Delete">
                                                          <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{route("admin#userMore",$u->id)}}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="More">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-muted fs-3 text-center mt-5">
                                <i class="fa-solid fa-face-sad-tear me-3 text-danger"></i>Nobody Here!
                            </div>
                        @endif
                    </div>


                    <div class="mt-3">
                        {{ $users->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
