
@extends("admin.layout.master")
@section("adminContent")
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route("admin#userListPage")}}" class="text-decoration-none text-dark p-2"><i class="fa-solid fa-arrow-left me-2"></i>Back</a>
                       <div class="card-title">
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                @if ($user->image == null)
                                    @if ($user->gender == 'male')
                                        <img src="{{ asset('admin/images/male.default.png') }}" alt=""
                                            class="img-thumbnail" style="width:200px; height:200px">
                                    @else
                                        <img src="{{ asset('admin/images/default.female.png') }}" alt="" class="img-thumbnail"style="width:200px; height:200px">
                                    @endif
                                @else
                                    <img src="{{ asset('storage/' . $user->image) }}" alt=""class="img-thumbnail"style="width:200px; height:200px">
                                @endif
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="fa-solid fa-user text-muted fs-3"></i>
                                    </div>
                                    <div class="col-8">{{ $user->name }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <i class="fa-solid fa-envelope text-muted fs-3"></i>
                                    </div>
                                    <div class="col-8">{{ $user->email }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <i class="fa-solid fa-male text-muted fs-3"></i>
                                    </div>
                                    <div class="col-8">{{ $user->role }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <i class="fa-solid fa-phone text-muted fs-3"></i>
                                    </div>
                                    <div class="col-8">{{ $user->phone }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <i class="fa-solid fa-venus-double  text-muted fs-3"></i>
                                    </div>
                                    <div class="col-8">{{ $user->gender }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <i class="fa-solid fa-home text-muted fs-3"></i>
                                    </div>
                                    <div class="col-8">{{ $user->address }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
