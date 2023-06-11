@extends('user.layout.master')
@section('content')
    <style>
        #menu-card {
            padding: 1.5em .5em .5em;
            border-radius: 3rem;
            text-align: center;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        }
    </style>
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center section-bg">
        <div class="container">
            @if (session('bookSuccess'))
            <div class="col-4 offset-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-check me-2"></i>{{session('bookSuccess')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            </div>
            @endif
            <div class="row justify-content-between gy-5">
                <div
                    class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                    <h2 data-aos="fade-up">Enjoy Your Healthy<br>Delicious Food</h2>
                    <p data-aos="fade-up" data-aos-delay="100">Sed autem laudantium dolores. Voluptatem itaque ea
                        consequatur eveniet. Eum quas beatae cumque eum quaerat.</p>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        <a href="#book-a-table" class="btn-book-a-table">Book a Table</a>
                        <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ"
                            class="glightbox btn-watch-video d-flex align-items-center"><i
                                class="bi bi-play-circle"></i><span>Watch Video</span></a>
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                    <img src="{{ asset('user/img/menu/menu-item-2.png') }}" class="img-fluid" alt=""
                        data-aos="zoom-out" data-aos-delay="300">
                </div>
            </div>
        </div>
    </section><!-- End Hero Section -->
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>About Us</h2>
                <p>Learn More <span>About Us</span></p>
            </div>

            <div class="row gy-4">
                <div class="col-lg-7 position-relative about-img"
                    style="background-image: url({{ asset('user/img/about.jpg') }}) ;" data-aos="fade-up"
                    data-aos-delay="150">
                    <div class="call-us position-absolute">
                        <h4>Book a Table</h4>
                        <p>+959983522985</p>
                    </div>
                </div>
                <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
                    <div class="content ps-0 ps-lg-5">
                        <p class="fst-italic">
                            You Can book o rYou can shop because we have online service.
                        </p>
                        <ul>
                            <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </li>
                            <li><i class="bi bi-check2-all"></i> Duis aute irure dolor in reprehenderit in voluptate velit.
                            </li>
                            <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu
                                fugiat nulla pariatur.</li>
                        </ul>
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                            in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident
                        </p>

                        <div class="position-relative mt-4">
                            <img src="{{ asset('user/img/about-2.jpg') }}" class="img-fluid" alt="">
                            <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- menu section --}}
    <section id="" class="">
        <div class="container">
            <div class="section-header">
                <h2>Family'Resturant</h2>
                <p>Check Our <span> Menu</span></p>
            </div>
            <ul class="nav justify-content-center">
                <li class="nav-item"><a href="{{ route('user#productMenu') }}"class="nav-link">
                        <h4 class="text-danger">all</h4>
                    </a></li>
                @foreach ($categories as $c)
                    <li class="nav-item">
                        <a href="{{ route('user#productFilter', $c->id) }}"class="nav-link active">
                            <h4 class="text-danger">{{ $c->name }}</h4>
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="row">
                @foreach ($products as $p)
                    <div class="col-3 mt-5">
                        <div class="card" id="menu-card">
                            <div class="card-body">
                                <a href="{{ asset('storage/' . $p->image) }}"><img src="{{ asset('storage/' . $p->image) }}"
                                        alt=""class="img-thumbnail"style="width:180px;height:180px"></a>
                                <div class="row mt-3">
                                    <div class="col-8 text-muted">{{ $p->price }} kyats</div>
                                    <div class="col"><a href="{{ route('user#productDetail', $p->id) }}">
                                            <button class="btn rounded-pill btn btn-danger"data-toggle="tooltip"
                                                data-placement="top"title="More">
                                                <i class="fa-solid fa-cart-shopping"></i></button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- @endforeach --}}
        </div>
    </section>
    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
        <div class="container-fluid" data-aos="fade-up">

            <div class="section-header">
                <h2>Events</h2>
                <p>Share <span>Your Moments</span> In Our Restaurant</p>
            </div>

            <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <div class="swiper-slide event-item d-flex flex-column justify-content-end"
                        style="background-image: url({{ asset('admin/images/events-1.jpg') }})">
                        <h3>Custom Parties</h3>
                        <div class="price align-self-start">500000 kyats</div>
                        <p class="description">
                            Quo corporis voluptas ea ad. Consectetur inventore sapiente ipsum voluptas eos omnis facere.
                            Enim facilis veritatis id est rem repudiandae nulla expedita quas.
                        </p>
                    </div><!-- End Event item -->

                    <div class="swiper-slide event-item d-flex flex-column justify-content-end"
                        style="background-image: url({{ asset('admin/images/events-2.jpg') }})">
                        <h3>Private Parties</h3>
                        <div class="price align-self-start">480000 Kyats</div>
                        <p class="description">
                            In delectus sint qui et enim. Et ab repudiandae inventore quaerat doloribus. Facere nemo vero
                            est ut dolores ea assumenda et. Delectus saepe accusamus aspernatur.
                        </p>
                    </div><!-- End Event item -->

                    <div class="swiper-slide event-item d-flex flex-column justify-content-end"
                        style="background-image: url({{ asset('admin/images/events-3.jpg') }})">
                        <h3>Birthday Parties</h3>
                        <div class="price align-self-start">680000 Kyats</div>
                        <p class="description">
                            Laborum aperiam atque omnis minus omnis est qui assumenda quos. Quis id sit quibusdam. Esse
                            quisquam ducimus officia ipsum ut quibusdam maxime. Non enim perspiciatis.
                        </p>
                    </div><!-- End Event item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Events Section -->
    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Chefs</h2>
                <p>Our <span>Proffesional</span> Chefs</p>
            </div>

            <div class="row gy-4">

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">

                    <div class="chef-member">
                        <div class="member-img">
                            <img src="{{ asset('admin/images/chefs-1.jpg') }}" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Walter White</h4>
                            <span>Master Chef</span>
                            <p>Velit aut quia fugit et et. Dolorum ea voluptate vel tempore tenetur ipsa quae aut. Ipsum
                                exercitationem iure minima enim corporis et voluptate.</p>
                        </div>
                    </div>
                </div><!-- End Chefs Member -->

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="chef-member">
                        <div class="member-img">
                            <img src="{{ asset('admin/images/chefs-2.jpg') }}" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Sarah Jhonson</h4>
                            <span>Patissier</span>
                            <p>Quo esse repellendus quia id. Est eum et accusantium pariatur fugit nihil minima suscipit
                                corporis. Voluptate sed quas reiciendis animi neque sapiente.</p>
                        </div>
                    </div>
                </div><!-- End Chefs Member -->

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                    <div class="chef-member">
                        <div class="member-img">
                            <img src="{{ asset('admin/images/chefs-3.jpg') }}" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>William Anderson</h4>
                            <span>Cook</span>
                            <p>Vero omnis enim consequatur. Voluptas consectetur unde qui molestiae deserunt. Voluptates
                                enim aut architecto porro aspernatur molestiae modi.</p>
                        </div>
                    </div>
                </div><!-- End Chefs Member -->

            </div>

        </div>
    </section><!-- End Chefs Section -->
    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Book A Table</h2>
                <p>Book <span>Your Stay</span> With Us</p>
            </div>

            <div class="row g-0">

                <div class="col-lg-4 reservation-img"
                    style="background-image: url({{ asset('admin/images/reservation.jpg') }});" data-aos="zoom-out"
                    data-aos-delay="200"></div>

                <div class="col-lg-8 d-flex align-items-center">
                    <form action="{{ route('user#BookTable') }}" method="post" role="form" class=""
                        data-aos="fade-up" data-aos-delay="100"enctype="multipart/form-data">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-lg-4 col-md-6">
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid

                                @enderror"
                                    id="name" placeholder="Your Name" data-msg="Please enter at least 4 chars">
                                @error('name')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" placeholder="Your Email">
                                @error('email')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <input type="text"
                                    class="form-control @error('phone') is-invalid
                                @enderror"
                                    name="phone" id="phone" placeholder="Your Phone">
                                @error('phone')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6 mt-3">
                                <input type="text" name="date"
                                    class="form-control @error('date') is-invalid
                                @enderror"
                                    id="date" placeholder="Date">
                                @error('date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6 mt-3">
                                <input type="text"
                                    class="form-control @error('time') is-invalid
                                @enderror"
                                    name="time" id="time"placeholder="Time">
                                @error('time')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6 mt-3">
                                <input type="number"
                                    class="form-control @error('people')is-invalid
                                @enderror"
                                    name="people" id="people"placeholder="People">
                                @error('people')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control @error('message') is-invalid

                            @enderror" name="message"
                                rows="5" placeholder="Message"></textarea>
                            @error('message')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="text-center"><button type="submit" class="btn btn-danger">Book a Table</button>
                        </div>
                    </form>
                </div><!-- End Reservation Form -->

            </div>

        </div>
    </section><!-- End Book A Table Section -->
    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>gallery</h2>
                <p>Check <span>Our Gallery</span></p>
            </div>

            <div class="gallery-slider swiper">
                <div class="swiper-wrapper align-items-center">

                    <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                            href="{{ asset('admin/images/gallery-2.jpg') }}">
                            <img src="{{ asset('admin/images/gallery-2.jpg') }}" class="img-fluid" alt=""></a>
                    </div>
                    <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                            href="{{ asset('admin/images/gallery-3.jpg') }}">
                            <img src="{{ asset('admin/images/gallery-3.jpg') }}" class="img-fluid" alt=""></a>
                    </div>
                    <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                            href="{{ asset('admin/images/gallery-4.jpg') }}">
                            <img src="{{ asset('admin/images/gallery-4.jpg') }}" class="img-fluid" alt=""></a>
                    </div>
                    <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                            href="{{ asset('admin/images/gallery-5.jpg') }}">
                            <img src="{{ asset('admin/images/gallery-5.jpg') }}" class="img-fluid" alt=""></a>
                    </div>
                    <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                            href="{{ asset('admin/images/gallery-7.jpg') }}">
                            <img src="{{ asset('admin/images/gallery-7.jpg') }}" class="img-fluid" alt=""></a>
                    </div>
                    <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                            href="{{ asset('admin/images/gallery-8.jpg') }}">
                            <img src="{{ asset('admin/images/gallery-8.jpg') }}" class="img-fluid" alt=""></a>
                    </div>

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Gallery Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-12">
                    <div class="bg-light p-100 mb-100">
                        <iframe style="width: 100%; height: 250px;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                            frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2 ml-4"> <i class="fa-solid fa-envelope fs-3"></i></div>
                                        <div class="col">pthet5216@gmail.com</div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-2 ml-4"> <i class="fa-solid fa-home fs-3"></i></div>
                                        <div class="col">No-36,MingalarDon </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2 ml-4"> <i class="fa-solid fa-phone fs-3"></i></div>
                                        <div class="col">09983522985</div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-2 ml-4"> <i class="fa-solid fa-message fs-3"></i></div>
                                        <div class="col">Contact Us</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{route("user#BookContact")}}" method="post" role="form" class="mt-5"enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-6 form-group">
                        <input type="text" name="contactName" class="form-control @error("contactName") is-invalid
                        @enderror" id="name"
                            placeholder="Your Name...">
                            @error("contactName")
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                    </div>

                    <div class="col-xl-6 form-group">
                        <input type="contactEmail" class="form-control @error("contactEmail")is-invalid
                        @enderror" name="contactEmail" id="email"
                            placeholder="Your Email....">
                            @error("contactEmail")
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                    </div>

                </div>
                <div class="form-group">
                    <input type="text" class="form-control @error("subject")is-invalid
                    @enderror" name="subject" id="subject" placeholder="address To deliver..">
                    @error("subject")
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <textarea class="form-control @error("contactMessage") is-invalid
                    @enderror" name="contactMessage" rows="5" placeholder="Message"></textarea>
                    @error("contactMessage")
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="text-center"><button type="submit"class="btn btn-danger">Send Message</button></div>
            </form>
            <!--End Contact Form -->

        </div>
    </section><!-- End Contact Section -->
@endsection
