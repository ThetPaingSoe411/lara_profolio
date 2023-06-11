@extends('admin.layout.master')
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
                                <h3 class="text-center title-2">Edit Category</h3>
                            </div>
                            <hr>
                            <form action="{{ route('admin#edit') }}" method="post"
                                novalidate="novalidate"enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                    <input type="hidden" name="categoryId" value="{{ $category->id }}">
                                    <input id="cc-pament" name="name"value="{{ old('name', $category->name) }}"
                                        type="text"
                                        class="form-control @error('name')
                                is-invalid
                                @enderror"
                                        aria-required="true" aria-invalid="false" placeholder="Enter Category...">
                                </div>
                                @error('name')
                                            <div class="mb-3">
                                                <div class="text-danger fst-italic">{{ $message }}</div>
                                            </div>
                                        @enderror
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-dark text-white btn-block">
                                        <span id="payment-button-amount">Edit</span>
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
