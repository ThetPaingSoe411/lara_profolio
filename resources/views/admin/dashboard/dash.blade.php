@extends('admin.layout.master')
@section('adminContent')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title text-black-50">Sales</h5>
                                </div>

                                <div class="col-auto">
                                    <a href="">
                                        <button class="btn rounded-pill"style="background-color:rgba(255, 99, 71, 0.5);">
                                            <i class="fa-solid fa-scale-balanced text-white"></i></button></a>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">2.382</h1>
                            <div class="mb-0">
                                <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                                <span class="text-muted">Since last week</span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title text-black-50">Visitors</h5>
                                </div>

                                <div class="col-auto">
                                    <a href="">
                                        <button class="btn rounded-pill"style="background-color:rgba(255, 99, 71, 0.5);">
                                            <i class="fa-solid fa-user text-white-50"></i></button></a>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">14.212</h1>
                            <div class="mb-0">
                                <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
                                <span class="text-muted">Since last week</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title text-black-50">Earnings</h5>
                                </div>

                                <div class="col-auto">
                                    <a href="">
                                        <button class="btn rounded-pill"style="background-color:rgba(255, 99, 71, 0.5);">
                                            <i class="fa-solid fa-dollar-sign text-white-50"></i></button></a>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">$21.300</h1>
                            <div class="mb-0">
                                <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
                                <span class="text-muted">Since last week</span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title text-black-50">Orders</h5>
                                </div>
                                <div class="col-auto">
                                    <a href="">
                                        <button class="btn rounded-pill"style="background-color:rgba(255, 99, 71, 0.5);">
                                            <i class="fa-solid fa-cart-shopping text-white-50"></i></button></a>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">64</h1>
                            <div class="mb-0">
                                <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
                                <span class="text-muted">Since last week</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bg-light p-100 mb-100">
                        <iframe style="width: 100%; height: 250px;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                            frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe>
                    </div>
                    <div class="bg-light p-30 mb-3">
                        <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Pyay Road ,AungLan</p>
                        <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>pthet5216@gmail.com</p>
                        <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>09983522985</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
