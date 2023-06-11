@extends('admin.layout.master')
@section('adminContent')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-8 offset-2">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route("admin#adminPage")}}" class="text-decoration-none text-dark p-2"><i class="fa-solid fa-arrow-left me-2"></i>Back</a>
                           <div class="card-title">
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    @if ($admins->image == null)
                                        @if ($admins->gender == 'male')
                                            <img src="{{ asset('admin/images/male.default.png') }}" alt=""
                                                class="img-thumbnail" style="width:200px; height:200px">
                                        @else
                                            <img src="{{ asset('admin/images/default.female.png') }}" alt="" class="img-thumbnail"style="width:200px; height:200px">
                                        @endif
                                    @else
                                        <img src="{{ asset('storage/' . $admins->image) }}" alt=""class="img-thumbnail"style="width:200px; height:200px">
                                    @endif
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fa-solid fa-user text-muted fs-3"></i>
                                        </div>
                                        <div class="col-8">{{ $admins->name }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fa-solid fa-envelope text-muted fs-3"></i>
                                        </div>
                                        <div class="col-8">{{ $admins->email }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fa-solid fa-male text-muted fs-3"></i>
                                        </div>
                                        <div class="col-8">{{ $admins->role }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fa-solid fa-phone text-muted fs-3"></i>
                                        </div>
                                        <div class="col-8">{{ $admins->phone }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fa-solid fa-venus-double  text-muted fs-3"></i>
                                        </div>
                                        <div class="col-8">{{ $admins->gender }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fa-solid fa-home text-muted fs-3"></i>
                                        </div>
                                        <div class="col-8">{{ $admins->address }}</div>
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
