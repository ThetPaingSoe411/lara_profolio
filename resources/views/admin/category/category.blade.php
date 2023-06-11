@extends('admin.layout.master')
@section("title","CategoryCreatePage")
@section('adminContent')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3 offset-8">
                        <a href="{{route("admin#adminList")}}"><button class="btn bg-dark text-white my-3">List</button></a>
                    </div>
                </div>
                <div class="col-lg-6 offset-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Create Category</h3>
                            </div>
                            <hr>
                            <form action="{{route("admin#addCategory")}}" method="post" novalidate="novalidate"enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Name</label>
                                    <input id="cc-pament" name="name" type="text" class="form-control @error("name")
                                    is-invalid
                                    @enderror"
                                        aria-required="true" aria-invalid="false" placeholder="Enter Category...">
                                </div>
                                @error('name')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-dark text-white btn-block">
                                        <span id="payment-button-amount">Create</span>
                                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                                        <i class="fa-solid fa-circle-right"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
