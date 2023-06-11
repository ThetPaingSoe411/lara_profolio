<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>family'Resturant</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('admin/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('admin/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('admin/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Main CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="{{ asset('admin/css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('admin/images/admin-removebg-preview.png') }}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="text-decoration-none" href="{{route("admin#Home")}}">
                                <i class="fas fa-tachometer-alt me-2"></i>Home Page
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin#adminList') }}" class="text-decoration-none">
                                <i class="fa-solid fa-chart-bar text-secondary me-2"></i>Category</a>
                        </li>
                        <li>
                            <a href="{{route("admin#productListPage")}}" class="text-decoration-none">
                                <i class="fa-solid fa-utensils text-secondary me-2"></i>Menu</a>
                        </li>
                        <li>
                            <a href="{{route("admin#productCreatePage")}}" class="text-decoration-none">
                                <i class="fa-solid fa-plus text-secondary me-2"></i>Add Menu</a>
                        </li>
                        <li>
                            <a href="{{route("admin#orderList")}}" class="text-decoration-none">
                                <i class="fa-solid fa-sort me-2"></i>OrderList</a>
                        </li>
                        <li>
                            <a href="{{route("admin#bookingList")}}" class="text-decoration-none">
                                <i class="fa-solid fa-book me-2"></i>BookingList</a>
                        </li>
                        <li>
                            <a href="{{route("admin#adminPage")}}" class="text-decoration-none">
                                <i class="fa-solid fa-users me-2"></i>Admins</a>
                        </li>
                        <li>
                            <a href="{{route("admin#userListPage")}}" class="text-decoration-none">
                                <i class="fa-solid fa-users me-2"></i>Users</a>
                        </li>
                        <li>
                            <a href="{{route("admin#contactList")}}" class="text-decoration-none">
                                <i class="fa-solid fa-address-book me-2"></i>Contact</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <div class="row">
                <div class="col">
                    <header class="header-desktop">
                        <div class="section__content section__content--p30">
                            <div class="container-fluid">
                                <div class="header-wrap">
                                    <div class="">
                                    </div>
                                    <div class="header-button">
                                        <div class="account-wrap">
                                            <div class="account-item clearfix js-item-menu">
                                                <div class="image">
                                                    @if (Auth::user()->image == null)
                                                        @if (Auth::user()->gender == 'male')
                                                            <img src="{{ asset('admin/images/male.default.png') }}"
                                                                alt="" class="img-thumbnail">
                                                        @else
                                                            <img src="{{ asset('admin/images/default.female.png') }}"
                                                                alt="" class="img-thumbnail">
                                                        @endif
                                                    @else
                                                        <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                                            alt=""class="img-thumbnail">
                                                    @endif
                                                </div>
                                                <div class="text-dark text-muted ml-5 p-2">
                                                    {{ Auth::user()->name }}
                                                </div>
                                                <div class="account-dropdown js-dropdown">
                                                    <div class="info clearfix">
                                                        <div class="image">
                                                            @if (Auth::user()->image == null)
                                                                @if (Auth::user()->gender == 'male')
                                                                    <img src="{{ asset('admin/images/male.default.png') }}"
                                                                        alt="" class="img-thumbnail">
                                                                @else
                                                                    <img src="{{ asset('admin/images/default.female.png') }}"
                                                                        alt="" class="img-thumbnail">
                                                                @endif
                                                            @else
                                                                <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                                                    alt="" class="img-thumbnail">
                                                            @endif
                                                        </div>
                                                        <div class="content">
                                                            <h5 class="name text-decoration-none">
                                                                <a
                                                                    href="#"class="text-decoration-none">{{ Auth::user()->name }}</a>
                                                            </h5>
                                                            <span class="email">{{ Auth::user()->email }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="account-dropdown__body">
                                                        <div class="account-dropdown__item">
                                                            <a href="{{ route('admin#accountPage') }}"
                                                                class="text-decoration-none">
                                                                <i
                                                                    class="fa-solid fa-user fs-5 text-secondary me-2"></i>Account</a>
                                                        </div>
                                                    </div>
                                                    <div class="account-dropdown__body">
                                                        <div class="account-dropdown__item">
                                                            <a href="{{ route('admin#passwordCreatePage') }}"
                                                                class="text-decoration-none">
                                                                <i
                                                                    class="fa-solid fa-key fs-5 text-secondary me-2"></i>Password</a>
                                                        </div>
                                                    </div>
                                                    <div class="account-dropdown__footer">
                                                        <form action="{{ route('logout') }}" method="post">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-dark form-control"><i
                                                                    class="fa-solid fa-right-from-bracket me-2"></i>LogOut</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                </div>
            </div>

            <!-- HEADER DESKTOP-->
            @yield('adminContent')
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('admin/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('admin/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/select2/select2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <!-- Main JS-->
    <script src="{{ asset('admin/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- font awesome --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
        integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.min.js" integrity="sha512-mlz/Fs1VtBou2TrUkGzX4VoGvybkD9nkeXWJm3rle0DPHssYYx4j+8kIS15T78ttGfmOjH0lLaBXGcShaVkdkg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
@yield("scriptSource")
</html>
<!-- end document-->
