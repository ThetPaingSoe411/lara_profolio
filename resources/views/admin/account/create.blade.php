@extends('admin.layout.master')
@section('title', 'createPage')
@section('adminContent')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-8 offset-2">
                    <div class="card">
                        <a href="{{route("admin#adminPage")}}" class="text-decoration-none text-dark p-2"><i class="fa-solid fa-arrow-left me-2"></i>Back</a>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Account Info</h3>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    @if (Auth::user()->image == null)
                                        @if (Auth::user()->gender == 'male')
                                            <img src="{{ asset('admin/images/male.default.png') }}" alt=""
                                                class="img-thumbnail" style="width:200px; height:150px">
                                        @else
                                            <img src="{{ asset('admin/images/default.female.png') }}" alt=""
                                                class="img-thumbnail" style="width:200px; height:150px">
                                        @endif
                                    @else
                                        <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                            alt=""class="img-thumbnail"style="width:200px; height:150px">
                                    @endif
                                    <a href="{{ route('admin#accounteditPage') }}"><button class="btn btn-dark mt-3"><i
                                                class="fa-solid fa-pen-to-square me-1"></i>Edit</button></a>
                                </div>
                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fa-solid fa-user text-muted fs-3"></i>
                                        </div>
                                        <div class="col-8">{{ Auth::user()->name }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fa-solid fa-envelope text-muted fs-3"></i>
                                        </div>
                                        <div class="col-8">{{ Auth::user()->email }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fa-solid fa-male text-muted fs-3"></i>
                                        </div>
                                        <div class="col-8">{{ Auth::user()->role }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fa-solid fa-phone text-muted fs-3"></i>
                                        </div>
                                        <div class="col-8">{{ Auth::user()->phone }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fa-solid fa-venus-double  text-muted fs-3"></i>
                                        </div>
                                        <div class="col-8">{{ Auth::user()->gender }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fa-solid fa-home text-muted fs-3"></i>
                                        </div>
                                        <div class="col-8">{{ Auth::user()->address }}</div>
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
