@extends('admin.layout.master')
@section('adminContent')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-10 offset-1">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route("admin#bookingList")}}" class="text-decoration-none text-dark p-2"><i
                                    class="fa-solid fa-arrow-left me-2"></i>Back</a>
                            <div class="card-title">
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-2">
                                                <i class="fa-solid fa-user text-muted fs-3"></i>
                                            </div>
                                            <div class="col-8">{{ $book->name }}</div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-2">
                                                <i class="fa-solid fa-envelope text-muted fs-3"></i>
                                            </div>
                                            <div class="col-8">{{ $book->email }}</div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-2">
                                                <i class="fa-solid fa-phone text-muted fs-3"></i>
                                            </div>
                                            <div class="col-8">{{ $book->phone }}</div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-2">
                                                <i class="fa-solid fa-calendar-days text-muted fs-3"></i>
                                            </div>
                                            <div class="col-8">{{ $book->date }}</div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-2">
                                                <i class="fa-solid fa-clock text-muted fs-3"></i>
                                            </div>
                                            <div class="col-8">{{ $book->time }}</div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-2">
                                                <i class="fa-solid fa-person text-muted fs-3"></i>
                                            </div>
                                            <div class="col-8">{{ $book->people }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <p class="text-align-center text-muted"> {{ $book->message }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
