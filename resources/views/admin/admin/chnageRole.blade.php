@extends('admin.layout.master')
@section('adminContent')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-6 offset-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Admin To User</h3>
                            </div>
                            <form action="{{ route('admin#adminroleChange') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $adminid->id }}" name="adminId">
                                <select name="role" id="" class="form-control changeRole mb-3">
                                    <option value="admin" class="bg-white text-dark rounded-bottom">
                                        admin</option>
                                    <option value="user" class="bg-white text-dark">user</option>
                                </select>
                                <button type="submit" class="btn btn-dark form-control">
                                    <i class="fa-solid fa-pen-nib me-2"></i>Change</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
