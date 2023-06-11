@extends('user.layout.master')
@section('content')
    <style>
        .card {
            padding: 1.5em .5em .5em;
            border-radius: 2em;

            box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        }
    </style>
    <section>
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 offset-3 mt-5">
                            <div class="card">
                                <div class="col-2">
                                    <a href="{{route("user#home")}}" class="text-decoration-none text-dark p-2"><i
                                            class="fa-solid fa-arrow-left me-2"></i>Back</a>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            @if ($users->image == null)
                                                @if ($users->gender == 'male')
                                                    <img src="{{ asset('admin/images/male.default.png') }}"
                                                        alt=""class="img-thumbnail"style="width:150px;height:150px">
                                                @else
                                                    <img src="{{ asset('admin/images/default.female.png') }}"
                                                        alt=""class="img-thumbnail"style="width:150px;height:150px">
                                                @endif
                                            @else
                                                <img src="{{ asset('storage/' . $users->image) }}"
                                                    alt=""class="img-thumbnail"style="width:150px;height:150px">
                                            @endif
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-2">
                                                    <i class="fa-solid fa-user text-muted fs-3"></i>
                                                </div>
                                                <div class="col-5">{{ Auth::user()->name }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-2">
                                                    <i class="fa-solid fa-envelope text-muted fs-3"></i>
                                                </div>
                                                <div class="col-5">{{ Auth::user()->email }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-2">
                                                    <i class="fa-solid fa-male text-muted fs-3"></i>
                                                </div>
                                                <div class="col-5">{{ Auth::user()->role }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-2">
                                                    <i class="fa-solid fa-phone text-muted fs-3"></i>
                                                </div>
                                                <div class="col-5">{{ Auth::user()->phone }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-2">
                                                    <i class="fa-solid fa-venus-double  text-muted fs-3"></i>
                                                </div>
                                                <div class="col-5">{{ Auth::user()->gender }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-2">
                                                    <i class="fa-solid fa-home text-muted fs-3"></i>
                                                </div>
                                                <div class="col-5">{{ Auth::user()->address }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-muted float-left mt-3"></p>
                                    <div class="mb-3 me-3"style="text-align:right">
                                        <a href="{{ route("user#accountProfile") }}"> <button class="btn btn-dark "><i
                                                    class="fa-solid fa-key me-2"></i>password</button></a>
                                                     <a href="{{ route('user#accountedit') }}"> <button class="btn btn-dark "><i
                                                    class="fa-solid fa-pen-to-square me-2"></i>Edit</button></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
    </section>
@endsection
