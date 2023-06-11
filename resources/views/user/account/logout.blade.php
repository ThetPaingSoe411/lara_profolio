@extends('user.layout.master')
<style>
    .card {
        padding: 1.5em .5em .5em;
        border-radius: 3em;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
    }
.text-title{
    text-align: center;
}
</style>
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-5 offset-3 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-title">
                                Are You Sure To Logout ?
                            </div>
<div class="row">
    <div class="col-3 offset-6">
<a href="{{route("user#home")}}"><button class="btn mt-4">cancel</button></a>
    </div>
<div class="col-3">
    <form action="{{ route('logout') }}" method="post"enctype="multipart/form-data">
        @csrf
        <button type="submit" class="btn btn-primary mt-4">logout</button>
    </form>
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
