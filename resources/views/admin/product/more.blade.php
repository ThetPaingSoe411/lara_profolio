@extends('admin.layout.master')
@section('adminContent')
    <!-- MAIN CONTENT-->
    <style>
        .card {
            padding: 1.5em .5em .5em;
            border-radius: 2em;
            text-align: center;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        }
    </style>
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-10">
                        <div class="card">
<div class="col-2">
    <a href="{{route("admin#productListPage")}}" class="text-decoration-none text-dark p-2"><i class="fa-solid fa-arrow-left me-2"></i>Back</a>
</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="{{ asset('storage/' . $product->image) }}"
                                            alt=""class="img-thumbnail"style="width:200px; height:200px">
                                    </div>
                                    <div class="col">
                                        <div class="fs-2 pb-3">{{ $product->name }}</div>
                                        <div class="row mt-5">
                                            <div class="col">
                                                <button class="btn rounded-circle me-2"style="background-color:#20B2AA;">
                                                    <i class="fa-solid fa-chart-bar text-white"></i></button><span
                                                    class="fs-5">{{ $product->category_name }}</span>
                                            </div>

                                            <div class="col">
                                                <button class="btn rounded-circle me-2"style="background-color:#20B2AA;">
                                                    <i class="fa-solid fa-money-bill-wave text-white"></i></button><span
                                                    class="fs-5">{{ $product->price }} kyats</span>
                                            </div>
                                            <div class="col-3">
                                                <button class="btn rounded-circle me-2"style="background-color:#20B2AA;">
                                                    <i class="fa-solid fa-eye text-white"></i></button><span
                                                    class="fs-5">{{ $product->view_count }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted float-left mt-3">{{ $product->description }}</p>
                                <div class="mb-3 me-3"style="text-align:right">
                                    <button class="btn btn-dark "><i class="fa-solid fa-pen-to-square me-2"></i>Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
