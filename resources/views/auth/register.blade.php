@extends('auth.master')
@section('content')
    <div class="login-form">
        <form action="{{ route('register') }}" method="post">
            @csrf
            @error('terms')
            <div class="mb-3">
                <div class="text-danger fst-italic">{{ $message }}</div>
            </div>
        @enderror
            <div class="form-group">
                <input class="form-control @error('name') is-invalid
                @enderror rounded-2" type="text"
                    name="name" placeholder="Username.....">
            </div>
            @error('name')
            <div class="mb-3">
                <div class="text-danger fst-italic">{{ $message }}</div>
            </div>
        @enderror
            <div class="form-group">
                <input class="form-control rounded-2 @error('email') is-invalid  @enderror" type="email" name="email"
                    placeholder="Email.....">
            </div>
            @error('email')
            <div class="mb-3">
                <div class="text-danger fst-italic">{{ $message }}</div>
            </div>
        @enderror
            <div class="form-group">
                <input class="form-control @error('phone') is-invalid  @enderror rounded-2" type="number" name="phone"
                    placeholder="09......">
            </div>
            @error('phone')
            <div class="mb-3">
                <div class="text-danger fst-italic">{{ $message }}</div>
            </div>
        @enderror
            <div class="form-group">
                <select name="gender" id="" class="form-control rounded-2 @error('gender') is-invalid
@enderror">
                    <option value="">Choose gender..</option>
                    <option value="male">male</option>
                    <option value="female">female</option>

                </select>
            </div>
            @error('gender')
            <div class="mb-3">
                <div class="text-danger fst-italic">{{ $message }}</div>
            </div>
        @enderror
            <div class="form-group">
                <input class="form-control @error('address') is-invalid @enderror rounded-2" type="text" name="address"
                    placeholder="address.......">
            </div>
            @error('address')
            <div class="mb-3">
                <div class="text-danger fst-italic">{{ $message }}</div>
            </div>
        @enderror
            <div class="form-group">
                <input class="form-control @error('password') is-invalid @enderror rounded-2" type="password"
                    name="password" placeholder="Password.......">
            </div>
            @error("password")
            <div class="mb-3">
                <div class="text-danger fst-italic">{{ $message }}</div>
            </div>
        @enderror
            <div class="form-group">
                <input
                    class="form-control @error('password_confirmation')
                is-invalid
                @enderror rounded-2"
                    type="password" name="password_confirmation" placeholder="Confirm Password......">
            </div>
            @error('password_confirmation')
            <div class="mb-3">
                <div class="text-danger fst-italic">{{ $message }}</div>
            </div>
        @enderror
            <button class="btn btn-dark form-control rounded-2" type="submit">REGISTER</button>

        </form>
        <div class="register-link">
            <p>
                Already have account?
                <a href="{{ route('admin#login') }}">Sign In</a>
            </p>
        </div>
    </div>
@endsection
