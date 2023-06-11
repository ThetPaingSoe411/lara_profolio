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
    <section id="" class="">
        <div class="container">
            <div class="section-header">
                <h2>Family'Resturant</h2>
                <p>Check Our <span> Menu</span></p>
            </div>
            <ul class="nav justify-content-center">
                <li class="nav-item"><a href="{{ route('user#productMenu') }}"class="nav-link text-danger">
                        <h4>all</h4>
                    </a></li>
                @foreach ($categories as $c)
                    <li class="nav-item">
                        <a href="{{ route('user#productFilter', $c->id) }}"class="nav-link active text-danger">
                            <h4>{{ $c->name }}</h4>
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
                                    <div class="col">
                                        <a href="{{route("user#productDetail",$p->id)}}">
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
    <!-- End Menu Section -->
@endsection
