@extends('admin.layout.master')
@section('adminContent')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-8 offset-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Password Mangement</h3>
                            </div>
                            @if (session('changeSuccess'))
                                <div class="col-12">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="fa-solid fa-check me-2"></i>{{ session('changeSuccess') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                            @if (session('notMatch'))
                                <div class="col-12">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="fa-solid fa-triangle-exclamation me-2"></i>{{ session('notMatch') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                            <hr>
                            <form action="{{ route('admin#passwordChange') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Old Password</label>
                                    <input type="password" class="form-control @error('oldPassword') is-invalid @enderror"
                                        name="oldPassword" placeholder="Enter password.....">
                                </div>

                                @error('oldPassword')
                                    <div class="mb-1">
                                        <span class="text-danger fst-italic">{{ $message }}</span>
                                    </div>
                                @enderror

                                <div class="mb-3">
                                    <label class="form-label">New Password</label>
                                    <input type="password"
                                        class="form-control @error('newPassword') is-invalid
                                    @enderror"
                                        name="newPassword" placeholder="Enter password.....">
                                </div>
                                @error('newPassword')
                                    <div class="mb-1">
                                        <span class="text-danger fst-italic">{{ $message }}</span>
                                    </div>
                                @enderror
                                <div class="mb-3">
                                    <label class="form-label">confirm-password</label>
                                    <input type="password"
                                        class="form-control @error('confirmPassword') is-invalid
                                    @enderror"
                                        name="confirmPassword" placeholder="Enter confirm-password.....">
                                </div>
                                @error('confirmPassword')
                                    <div class="mb-1">
                                        <span class="text-danger fst-italic">{{ $message }}</span>
                                    </div>
                                @enderror
                                <button type="submit" class="btn btn-dark form-control"><i
                                        class="fa-solid fa-key me-2"></i>Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
