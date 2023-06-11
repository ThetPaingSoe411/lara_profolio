@extends("admin.layout.master")
@section("adminContent")
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-8 offset-2">
                <div class="card">
                    <a href="{{route("admin#productListPage")}}" class="text-decoration-none text-dark p-2"><i class="fa-solid fa-arrow-left me-2"></i>Back</a>
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Create Menu</h3>

                        <form action="{{route("admin#productCreate")}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control @error("name") is-invalid

                                @enderror"
                                    name="name" placeholder="Enter name.....">
                            </div>
                            @error('name')
                            <div class="mb-1">
                                <span class="text-danger fst-italic">{{ $message }}</span>
                            </div>
                        @enderror
                            <div class="mb-3">
                                <label class="form-label">Category Name</label>
                                <select name="categoryId" id="" class="form-control @error("categoryId") is-invalid
                                @enderror">
                                    <option value="">choose category..</option>
                                    @foreach ($categories as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('categoryId')
                            <div class="mb-1">
                                <span class="text-danger fst-italic">{{ $message }}</span>
                            </div>
                        @enderror
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control @error("image") is-invalid
                                @enderror"
                                    name="image" placeholder="Enter image.....">
                            </div>
                            @error('image')
                            <div class="mb-1">
                                <span class="text-danger fst-italic">{{ $message }}</span>
                            </div>
                        @enderror
                            <div class="mb-3">
                                <label class="form-label">Decreption</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control @error("description") is-invalid

                                @enderror"placeholder="Enter dectription..."></textarea>
                            </div>
                            @error('description')
                            <div class="mb-1">
                                <span class="text-danger fst-italic">{{ $message }}</span>
                            </div>
                        @enderror
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="text" class="form-control @error("price")is-invalid
                                @enderror"
                                    name="price" placeholder="Enter price.....">
                            </div>
                            @error('price')
                            <div class="mb-1">
                                <span class="text-danger fst-italic">{{ $message }}</span>
                            </div>
                        @enderror
                            <div class="mb-3">
                                <label class="form-label">View_Count</label>
                                <input type="text" class="form-control"
                                    name="viewCount" placeholder="Enter viewCount....."disabled>
                            </div>
                            <button type="submit" class="btn btn-dark form-control"><i
                                    class="fa-solid fa-key me-2"></i>Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

