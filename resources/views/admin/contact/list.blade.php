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
                                <h2 class="title-1 text-muted"> Contact</h2>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                        </div>
                    </div>
                    <!-- END DATA TABLE -->
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>Address(to deliver)</th>
                                    <th>message</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $c)
                                    <tr class="tr-shadow">
                                        <td>{{$c->name}}</td>
                                        <td>{{$c->email}}</td>
                                        <td>{{$c->subject}}</td>
                                        <td>{{Str::substr($c->message,0,25)}}.....</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="{{route("admin#contactMore",$c->id)}}">
                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="More">
                                                        <i class="zmdi zmdi-more"></i>
                                                    </button>
                                                </a>
                                                <a href="{{route("admin#contactDelete",$c->id)}}">
                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
