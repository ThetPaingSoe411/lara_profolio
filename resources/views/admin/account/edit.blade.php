@extends('admin.layout.master')
@section('title', 'accountEdit')
@section('adminContent')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-10 offset-2">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route("admin#adminPage")}}" class="text-decoration-none text-dark p-2"><i class="fa-solid fa-arrow-left me-2"></i>Back</a>
                            <div class="card-title">
                                <h3 class="text-center title-2">Account Upload</h3>
                            </div>
                            <hr>
                            <form action="{{ route('admin#accountEdit', Auth::user()->id) }}"method="post"
                                enctype="multipart/form-data">
                                @csrf
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
                                        <input type="file"name="image"
                                            class="form-control @error('image') is-invalid
                                        @enderror"
                                            placeholder="enter image">
                                        @error('image')
                                            <div class="mb-3">
                                                <div class="text-danger fst-italic">{{ $message }}</div>
                                            </div>
                                        @enderror
                                        <button type="submit" class="btn btn-dark form-control mt-3"><i
                                                class="fa-solid fa-pen-nib me-2"></i>Upload</button>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" name="name"
                                            id=""class="form-control mb-3 @error('name') is-invalid
                                            @enderror"
                                            value="{{ old('name', Auth::user()->name) }}" placeholder="Enter name....">
                                        @error('name')
                                            <div class="mb-3">
                                                <div class="text-danger fst-italic">{{ $message }}</div>
                                            </div>
                                        @enderror
                                        <input type="email" name="email"
                                            id=""class="form-control mb-3 @error('email') is-invalid
                                            @enderror"value="{{ old('email', Auth::user()->email) }}"
                                            placeholder="Enter email....">
                                        @error('email')
                                            <div class="mb-3">
                                                <div class="text-danger fst-italic ">{{ $message }}</div>
                                            </div>
                                        @enderror
                                        <input type="number" name="phone"
                                            id=""class="form-control mb-3 @error('phone') is-invalid
                                            @enderror"value="{{ old('phone', Auth::user()->phone) }}"
                                            placeholder="Enter phone....">
                                        @error('phone')
                                            <div class="mb-3">
                                                <div class="text-danger fst-italic">{{ $message }}</div>
                                            </div>
                                        @enderror
                                        <select name="gender" id=""
                                            class="form-control mb-3 @error('gender') is-invalid
                                            @enderror">
                                            <option value="male">male</option>
                                            <option value="female">female</option>
                                        </select>
                                        @error('gender')
                                            <div class="mb-3">
                                                <div class="text-danger fst-italic">{{ $message }}</div>
                                            </div>
                                        @enderror
                                        <input type="text" name="address"
                                            id=""class="form-control mb-3 @error('address')is-invalid
                                            @enderror"value="{{ old('address', Auth::user()->address) }}"
                                            placeholder="Enter address....">
                                        @error('address')
                                            <div class="mb-3">
                                                <div class="text-danger fst-italic">{{ $message }}</div>
                                            </div>
                                        @enderror
                                        <input type="text" name="role"
                                            id=""class="form-control mb-3"value="{{ old('role', Auth::user()->role) }}"
                                            placeholder="Enter role...."disabled>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
