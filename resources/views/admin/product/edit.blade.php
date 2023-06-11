@extends('admin.layout.master')
@section('title', 'accountEdit')
@section('adminContent')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-10 offset-2">
                    <div class="card">
                        <a href="{{route("admin#productListPage")}}" class="text-decoration-none text-dark p-2"><i class="fa-solid fa-arrow-left me-2"></i>Back</a>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Product</h3>
                            </div>
                            <hr>
                            <form action="{{route("admin#productUpdate")}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-4">
                                        <img src="{{ asset('storage/' . $products->image) }}"
                                            alt=""class="img-thumbnail"style="width:200px; height:200px">
                                        <div class="mt-1">
                                            <input type="file" name="image" id=""class="form-control @error("image") is-invalid
                                            @enderror">
                                        </div>
                                        @error('image')
                                        <div class="mb-3">
                                            <div class="text-danger fst-italic">{{ $message }}</div>
                                        </div>
                                    @enderror
                                        <div class="mt-3">
                                            <a href="">
                                                <button type="submit"class="btn btn-danger">
                                                    <i class="fa-solid fa-pen-nib me-2"></i> Update</button>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <input type="hidden" value="{{$products->id}}" id=""name="productId">
                                        <div class="input-group mb-3">
                                            <input type="text"class="form-control @error("name")is-invalid
                                            @enderror"
                                                value="{{ old('name', $products->name) }}" name="name">
                                        </div>
                                        @error('name')
                                        <div class="mb-3">
                                            <div class="text-danger fst-italic">{{ $message }}</div>
                                        </div>
                                    @enderror
                                        <div class="input-group mb-3">
                                            <select name="categoryId" id=""class="form-control @error("categoryId")

                                            @enderror">
                                                <option value="">Choose Categories</option>
                                                @foreach ($categories as $c)
                                                    <option
                                                        value="{{ $c->id }}"@if ($products->category_id == $c->id) selected @endif>
                                                        {{ $c->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('categoryId')
                                            <div class="mb-3">
                                                <div class="text-danger fst-italic">{{ $message }}</div>
                                            </div>
                                        @enderror
                                        <div class="input-group mb-3">
                                            <textarea name="description" id=""class="form-control @error("description")is-invalid

                                            @enderror" cols="30" rows="10"value="">{{ old('description', $products->description) }}</textarea>
                                        </div>
                                        @error('description')
                                        <div class="mb-3">
                                            <div class="text-danger fst-italic">{{ $message }}</div>
                                        </div>
                                    @enderror
                                        <div class="input-group mb-3">
                                            <input type="text"class="form-control @error("price") is-invalid
                                            @enderror"
                                                value="{{ old('price', $products->price) }}" name="price">
                                        </div>
                                        @error('price')
                                            <div class="mb-3">
                                                <div class="text-danger fst-italic">{{ $message }}</div>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
