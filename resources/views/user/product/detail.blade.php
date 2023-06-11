@extends('user.layout.master')
@section('content')
    <style>
        #card {
            padding: 1.5em .5em .5em;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        }
    </style>
    <section>
        <!-- Shop Detail Start -->
        <div class="container-fluid pb-5 mt-5">
            <input type="hidden"value="{{ Auth::user()->id }}"id="userId">
            <div class="row px-xl-5">

                <div class="row">

                    <div class="col-lg-7 h-auto mb-30 offset-2">
                        <div class="h-100 bg-light p-30"id="card">
                            <a href="{{ route('user#home') }}" class="text-dark text-decoration-none"><i
                                class="fa-solid fa-arrow-left me-2"></i>back</a>
                            <div class="row">
                                <div class="col-lg-5 mb-30">
                                    <div id="product-carousel" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner bg-light">
                                            <input type="hidden" name="productId" value="{{ $products->id }}">
                                            <div class="carousel-item active">
                                                <img src="{{ asset('storage/' . $products->image) }}" alt="Image"
                                                    class="img-thumbnail w-100 h-100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <h3>{{ $products->name }}</h3>
                                    <div class="d-flex mb-3">
                                        <small class="pt-1"><i class="fa-solid fa-eye me-2"></i></small>
                                    </div>
                                    <h3 class="font-weight-semi-bold mb-4">{{ $products->price }} kyats</h3>
                                </div>
                            </div>

                            <p class="mb-4">{{ $products->description }}</p>
                            <div class="d-flex align-items-center mb-4 pt-2">
                                <div class="input-group quantity mr-3" style="width: 130px;">
                                    <input type="number" class="form-control bg-white border-0 text-center" value="1"
                                        id="orderCount" name="count">
                                    <input type="hidden" name="userId" id="userId" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="productId" id="productId" value="{{ $products->id }}">
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger btn-plus">
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                    </div>
                                </div>
                                <button class="btn btn-danger px-3"id="addCartBtn"type="button"><i
                                        class="fa-solid fa-shopping-cart mr-1"></i> Add To
                                    Cart</button>
                            </div>
                            <div class="d-flex pt-2">
                                <strong class="text-dark mr-2">Share on:</strong>
                                <div class="d-inline-flex">
                                    <a class="text-dark px-2" href="">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a class="text-dark px-2" href="">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a class="text-dark px-2" href="">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a class="text-dark px-2" href="">
                                        <i class="fab fa-pinterest"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Detail End -->
    </section>
@endsection
@section('scriptSource')
    <script>
        $(document).ready(function() {
            $("#addCartBtn").click(function() {
                $source = {
                    "userId": $("#userId").val(),
                    "productId": $("#productId").val(),
                    "count": $("#orderCount").val()
                }
                $.ajax({
                    type: "get",
                    url: "http://127.0.0.1:8000/cart/addcart",
                    data: $source,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == "success") {
                            window.location.href = "/customer/homePage"
                        }
                    }
                })
            })
        })
    </script>
@endsection
