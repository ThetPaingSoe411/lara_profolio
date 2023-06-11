@extends('admin.layout.master')
@section('adminContent')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-10 offset-1">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route("admin#contactList")}}" class="text-decoration-none text-dark p-2"><i
                                    class="fa-solid fa-arrow-left me-2"></i>Back</a>
                            <div class="card-title">
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-2">
                                                <i class="fa-solid fa-user text-muted fs-3"></i>
                                            </div>
                                            <div class="col-8">{{ $contact->name }}</div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-2">
                                                <i class="fa-solid fa-envelope text-muted fs-3"></i>
                                            </div>
                                            <div class="col-8">{{ $contact->email }}</div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-2">
                                                <i class="fa-solid fa-house-user text-muted fs-3"></i>
                                            </div>
                                            <div class="col-8">{{$contact->subject }}</div>
                                        </div>
                                    </div>

                                    <div class="col-6">

                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <p class="text-align-center text-muted"> {{ $contact->message }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
