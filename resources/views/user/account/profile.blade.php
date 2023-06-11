@extends('user.layout.master')
@section('content')
    <style>
        .card {
            padding: 1.5em .5em .5em;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        }

        .image {
            border-radius: 50%;

            width: 7rem;
        }
    </style>
    <section>
        <div class="container">
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-6 offset-3 mt-5">
                                <div class="card">
                                    <div class="col">
                                        <a href="{{ route('user#home') }}" class="text-decoration-none text-dark p-2"><i
                                                class="fa-solid fa-arrow-left me-2"></i>Back</a>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col offset-4">
                                                @if (Auth::user()->image == null)
                                                    @if (Auth::user()->gender = 'male')
                                                        <img src="{{ asset('admin/images/male.default.png') }}"
                                                            alt=""class="image"style="width:150px; height:150px;">
                                                    @else
                                                        <img src="{{ asset('admin/images/default.female.png') }}"
                                                            alt=""class="image"style="width:150px; height:150px;">
                                                    @endif
                                                @else
                                                    <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                                        alt=""class="image"style="width:150px; height:150px;">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <form
                                                    action="{{ route("user#accountPassword") }}"class="mt-3"enctype="multipart/form-data"method="POST">
                                                    @csrf
                                                    <div class=" mt-3">
                                                        <label for="">Old Password</label>
                                                        <input type="password"
                                                            name="oldPassword"placeholder="Enter old password..."
                                                            id=""class="form-control @error('oldPassword') is-invalid
                                                            @enderror">
                                                    </div>
                                                    @error('oldPassword')
                                                    <div class=" mt-3 text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                    <div class=" mt-3">
                                                        <label for="">New Password</label>
                                                        <input type="password"
                                                            name="newPassword"placeholder="Enter new Password...."
                                                            id=""class="form-control @error('newPassword') is-invalid
                                                            @enderror">
                                                    </div>
                                                    @error('newPassword')
                                                        <div class=" mt-3 text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror

                                                    <div class="mt-3">
                                                        <label for="">Confirm Password</label>
                                                        <input type="password"
                                                            name="confirmPassword"placeholder="Enter confirm Password.."
                                                            id=""class="form-control @error('confirmPassword') is-invalid
                                                            @enderror">
                                                    </div>
                                                    @error('confirmPassword')
                                                    <div class=" mt-3 text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                    <div class="mt-3">
                                                        <button class="btn btn-primary form-control">Change</button>
                                                    </div>
                                                </form>
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
    </section>
@endsection
