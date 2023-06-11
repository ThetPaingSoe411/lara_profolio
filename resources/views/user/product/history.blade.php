@extends('user.layout.master')
@section('content')
    <section>
        <!-- Cart Start -->
        <div class="container-fluid mt-5">
            <div class="row px-xl-5">
                <div class="col-lg-8 offset-2 table-responsive mb-5">
                    <table class="table table-light table-borderless table-hover text-center mb-0"id="dataTable">
                        <thead class="thead-dark">
                            <tr>
                                <th>Date</th>
                                <th>Order ID</th>
                                <th>Total Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach ($order as $o)
                                <tr>
                                    <td class="align-middle">{{ $o->created_at->format('F-j-Y') }}</td>
                                    <td class="align-middle">{{ $o->order_code }}</td>
                                    <td class="align-middle">{{ $o->total_price }}</td>
                                    <td class="align-middle">
                                        @if ($o->status == 0)
                                            <div class="text-warning"><i class="fa-solid fa-clock me-2"></i> pending...
                                            </div>
                                        @elseif($o->status == 1)
                                            <div class="text-success"><i class="fa-solid fa-check me-2"></i> success...
                                            </div>
                                        @elseif($o->status == 2)
                                            <div class="text-danger"><i class="fa-solid fa-triangle-exclamation me-2"></i>
                                                reject...</div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-4 offset-7">
                    {{ $order->links() }}
                </div>
            </div>
        </div>
        <!-- Cart End -->
    </section>
@endsection
@section('scriptSource')
    {{-- <script src="{{ asset('admin/js/cart.js') }}"></script> --}}

    <script></script>
@endsection
