@extends("auth.master")
@section("content")
<div class="login-form">
    <form action="{{route("login")}}" method="post">
        @csrf
        <div class="form-group">
            <label>Email</label>
            <div class="input-group mb-3">
                <div class="input-group-text rounded-pill bg-dark" id="basic-addon1"><i class="fa-solid fa-envelope text-white"></i></div>
                <div class="col-10 offset-2">
                    <input type="email" class="form-control rounded-5 @error("email") is-invalid @enderror" placeholder="............" name="email" aria-describedby="basic-addon1">
                </div>
                @error('email')
                <div class="mb-3">
                    <div class="text-danger fst-italic">{{ $message }}</div>
                </div>
            @enderror
              </div>
        </div>
        <div class="form-group">
            <label>Password</label>
            <div class="input-group mb-3">
                <div class="input-group-text rounded-pill bg-dark"id="basic-addon1"width="100px"><i class="fa-solid fa-key f-5 text-white"></i></div>
                <div class="col-10">
                    <input type="password" class="form-control rounded-5 @error("password") is-invalid
                    @enderror" placeholder="..........."name="password" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                @error('password')
                <div class="mb-3">
                    <div class="text-danger fst-italic">{{ $message }}</div>
                </div>
            @enderror
              </div>
        </div>
        <div class="col-11">
            <button class="btn btn-dark form-control rounded-3" type="submit">SIGN IN</button>
</div>
    </form>
    <div class="register-link">
        <p>
            Don't you have account?
            <a href="{{route("admin#register")}}">Sign Up Here</a>
        </p>
    </div>
</div>
@endsection




