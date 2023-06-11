@extends('user.layout.master')
@section('content')
    <style>
        .card {
            padding: 1.5em .5em .5em;
            border-radius: 2em;
            text-align: center;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        }
    </style>
    <!-- ======= Account Section ======= -->
    <section id="" class="">
        <div class="container" data-aos="fade-up">
            <div class="section-header">

                <p> <span>Profile</span></p>
            </div>

            <div class="row">

                <div class="col-8 offset-2">
                    <div class="card bg-dark">
                        <div class="col-2">
                            <a href="{{ route('user#account') }}" class="text-decoration-none text-white p-2">
                                <i class="fa-solid fa-arrow-left me-2"></i>Back</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user#accountUpdate') }}" method="post" role="form" class=""
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-4">
                                        <div class="input-group mt-3">
                                            @if (Auth::user()->image == null)
                                                @if (Auth::user()->gender == 'male')
                                                    <img
                                                        src="{{ asset('admin/images/male.default.png') }}"alt=""class="img-thumbnail"style="width:150px;height:150px">
                                                @else
                                                    <img
                                                        src="{{ asset('admin/images/default.female.png') }}"alt=""class="img-thumbnail"style="width:150px;height:150px">
                                                @endif
                                            @else
                                                <img
                                                    src="{{ asset('storage/' . Auth::user()->image) }}"alt=""class="img-thumbnail"style="width:150px;height:150px">
                                            @endif

                                        </div>
                                        <div class="input-group mt-3">
                                            <input type="file" name="image"
                                                id=""class="form-control @error('image')is-invalid

                                                @enderror"value="{{ old('name', $user->image) }}">
                                        </div>
                                        @error('image')
                                            <div class="mt-2">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                        @enderror
                                        <button type="submit"class="btn btn-danger mt-3 form-control"><i
                                                class="fa-solid fa-pen-nib me-2"></i>Update</button>
                                    </div>
                                    <div class="col">
                                        <div class="input-group mt-3">
                                            <input
                                                type="text"name="name"class="form-control @error('name') is-invalid
                                                @enderror"placeholder="Enter name...."value="{{ old('name', $user->name) }}">
                                        </div>
                                        @error('name')
                                            <div class="mt-2">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                        @enderror
                                        <div class="input-group mt-3">
                                            <input
                                                type="email"name="email"class="form-control @error('email') is-invalid

                                                @enderror"placeholder="Enter email...."value="{{ old('name', $user->email) }}">
                                        </div>
                                        @error('email')
                                            <div class="mt-2">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                        @enderror
                                        <div class="input-group mt-3">
                                            <input
                                                type="number"name="phone"class="form-control @error('phone') is-invalid

                                                @enderror"placeholder="Enter phone...."value="{{ old('phone', $user->phone) }}">
                                        </div>
                                        @error('phone')
                                            <div class="mt-2">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                        @enderror
                                        <div class="input-group mt-3">
                                            <select name="gender"
                                                id=""class="form-control @error('gender') is-invalid
                                                @enderror"placeholder="Enter gender...."value="{{ old('gender', $user->gender) }}">
                                                <option value="male">male</option>
                                                <option value=""></option>
                                                <option value="female">female</option>
                                            </select>
                                        </div>
                                        @error('gender')
                                            <div class="mt-2">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                        @enderror
                                        <div class="input-group mt-3">
                                            <input
                                                type="text"name="address"class="form-control @error('address')is-invalid
                                                @enderror"placeholder="Enter address..."value="{{ old('address', $user->address) }}">
                                        </div>
                                        @error('address')
                                            <div class="mt-2">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </form>
                            <!--End Contact Form -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Account Section -->
@endsection
