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
                                <h2 class="title-1 text-muted">Admin List</h2>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="col-4 float-end">
                                <form class="form-header" action="{{ route('admin#adminPage') }}" method="GET">
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
                        @if (count($admins) != 0)
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
                                    @foreach ($admins as $a)
                                        <tr class="tr-shadow">
                                            <td class="">
                                                @if ($a->image == null)
                                                    @if ($a->gender == 'male')
                                                        <img src="{{ asset('admin/images/male.default.png') }}"
                                                            alt="" class="img-thumbnail"style="width:120px; height:120px">
                                                    @else
                                                        <img src="{{ asset('admin/images/default.female.png') }}"
                                                            alt="" class="img-thumbnail"style="width:120px; height:120px" >
                                                    @endif
                                                @else
                                                    <img src="{{ asset('storage/' . $a->image) }}"
                                                        alt=""class="img-thumbnail" style="width:120px; height:120px">
                                                @endif
                                            </td>
                                            <input type="hidden" name="adminId" value="{{ $a->id }}" id="adminId"
                                                class="text-danger">
                                            <td>{{ $a->name }}</td>
                                            <td>{{ $a->email }}</td>
                                            <td>{{ $a->phone }}</td>
                                            @if (Auth::user()->id == $a->id)
                                                <td>
                                                    <button class="btn btn-success">{{ $a->role }}</button>
                                                </td>
                                                <td>
                                                </td>
                                            @else
                                                <td>
                                                    <a href="{{ route('admin#adminChangeRolePage', $a->id) }}">
                                                        <button class="btn btn-dark text-white">Admin</button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="{{ route('admin#adminDelete', $a->id) }}">
                                                            <button class="item" data-toggle="tooltip"
                                                                data-placement="top" title="Delete">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </a>
                                                        <a href="{{route("admin#adminMore",$a->id)}}">
                                                            <button class="item" data-toggle="tooltip"
                                                                data-placement="top" title="More">
                                                                <i class="zmdi zmdi-more"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </td>
                                            @endif
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


                    <div class="mt-2">
                        {{ $admins->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection

