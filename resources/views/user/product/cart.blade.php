@extends('user.layout.master')
@section('content')
    <section>
        <!-- Cart Start -->
        <div class="container-fluid mt-5">
            <div class="row px-xl-5">
                <div class="col-lg-8 table-responsive mb-5">
                    <table class="table table-light table-borderless table-hover text-center mb-0"id="dataTable">
                        <thead class="thead-dark">
                            <tr>
                                <th></th>
                                <th>Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach ($carts as $c)
                                <tr>
                                    <td class="align-middle"width="100px"height="100px"><img
                                            src="{{ asset('storage/' . $c->product_image) }}" alt=""
                                            class="img-thumbnail"></td>
                                    <td class="align-middle">{{ $c->product_name }}</td>
                                    <input type="hidden" name="productId"value="{{ $c->product_id }}"class="productId">
                                    <input type="hidden" name="userId"value="{{ $c->user_id }}"class="userId">
                                    {{-- <input type="hidden" name=""value="{{$c->order_id}}"class="orderId"> --}}
                                    <td class="align-middle"id="price">{{ $c->product_price }} kyats</td>
                                    <td class="align-middle">
                                        <div class="input-group quantity mx-auto" style="width: 120px;">
                                            <input type="number"
                                                class="form-control form-control-sm border-0 text-center"value="{{ $c->qty }}"
                                                id="qty"min="0">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-success btn-plus"id="btn-check"type="button"><i
                                                        class="fa-solid fa-check"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle"id="total">{{ $c->product_price * $c->qty }} kyats</td>
                                    <td class="align-middle"><button class="btn btn-sm btn-danger btn-remove"><i
                                                class="fa-solid fa-times"></i></button></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart
                            Summary</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="border-bottom pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>Subtotal</h6>
                                <h6 id="subTotalPrice">{{ $totalPrice }} kyats</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Delivery(yangon only)</h6>
                                <h6 class="font-weight-medium">3500 kyats</h6>
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Total</h5>
                                <h5 id="finalPrice">{{ $totalPrice + 3500 }} kyats</h5>
                            </div>
                            <button class="btn btn-block btn-primary font-weight-bold my-3 py-3"id="orderBtn">Proceed To
                                Checkout</button>
                            <button class="btn btn-block btn-danger font-weight-bold my-3 py-3"id="clearBtn">Clear
                                Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart End -->
    </section>
@endsection
@section('scriptSource')
    <script src="{{ asset('admin/js/cart.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#orderBtn").click(function() {
                $orderList = [];
                $random = Math.floor((Math.random() * 10000) + 01);
                $("#dataTable tbody tr").each(function(index, row) {
                    $orderList.push({
                        "user_id": $(row).find(".userId").val(),
                        "product_id": $(row).find(".productId").val(),
                        "qty": $(row).find("#qty").val(),
                        "total": $(row).find("#total").text().replace("kyats", "") * 1,
                        "order_code": "fams" + $random + "0000"
                    });
                });
                $.ajax({
                    type: "get",
                    url: "http://127.0.0.1:8000/cart/order",
                    data: Object.assign({}, $orderList),
                    dataType: "json",
                    success: function(response) {
                        if (response.status == "true") {
                            window.location.href = "http://127.0.0.1:8000/customer/homePage"
                        }
                    }
                })
            })
            $("#clearBtn").click(function() {
                $("#dataTable tbody tr").remove();
                $("#subTotalPrice").html("0 kyats");
                $("#finalPrice").html("0 kyats");
                $.ajax({
                    type: "get",
                    url: "http://127.0.0.1:8000/cart/clear/cart",
                    dataType: "json",
                })
            })
            $(".btn-remove").click(function() {
                $parentNode = $(this).parents("tr");
                $productId = $parentNode.find(".productId").val();
                $.ajax({
                    type: "get",
                    url: "http://127.0.0.1:8000/cart/remove/cart",
                    data: {
                        "productId": $productId
                    },
                    dataType: "json"
                })
            })
        });
    </script>
@endsection
