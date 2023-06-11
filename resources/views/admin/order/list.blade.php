@extends('admin.layout.master')
@section('adminContent')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="title-1 text-muted">Order List</h2>

                            </div>
                        </div>
                        {{-- <div class="table-data__tool-right">
                            <a href="{{ route('admin#category') }}">
                                <button class="btn btn-dark">
                                    <i class="zmdi zmdi-plus"></i>add category
                                </button>
                            </a>
                            <button class="btn btn-danger">
                                CSV download
                            </button>
                        </div> --}}
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="col-4 float-end">
                                <form class="form-header" action="{{ route('admin#orderList') }}" method="GET">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="text"
                                            class="form-control"name="searchKey"value="{{ request('searchKey') }}"
                                            placeholder="Enter user name....." aria-describedby="button-addon2">
                                        <button class="btn btn-secondary" type="submit" id="button-addon2"><i
                                                class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END DATA TABLE -->

                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>User Name</th>
                                    <th>OrderCode</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $o)
                                    <tr class="tr-shadow">
                                        <td>{{ $o->user_id }}</td>
                                        <input type="hidden" name=""value="{{ $o->id }}"class="orderId">
                                        <td>{{ $o->user_name }}</td>
                                        <td class="text-primary"><a href="{{route("admin#orderDetail",$o->order_code)}}"class="text-decoration-none">{{ $o->order_code }}</a></td>
                                        <td>{{ $o->total_price }} kyats</td>
                                        <td><select name="status" id=""
                                                class="btn btn-outline-warning order-status">
                                                <option value="0" @if ($o->status == '0') selected @endif>
                                                    pending..</option>
                                                <option value="1"@if ($o->status == '1') selected @endif>
                                                    accept..</option>
                                                <option value="2"@if ($o->status == '2') selected @endif>
                                                    reject..</option>
                                            </select>
                                        </td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="{{route("admin#StatusDelete",$o->id)}}">
                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="Delete">
                                                        <i class="zmdi zmdi-delete text-danger fs-3"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
@section('scriptSource')
    <script>
        $(document).ready(function() {
            $(".order-status").change(function() {
                $currentStatus = $(this).val();
                $parentNode = $(this).parents("tr");
                $orderId = $parentNode.find(".orderId").val();

                $data = {
                    "orderId": $orderId,
                    "status": $currentStatus
                };
                $.ajax({
                    type: "get",
                    url: "http://127.0.0.1:8000/order/status/change",
                    data: $data,
                    dataType: "json"

                })
            })
        })
    </script>
@endsection
