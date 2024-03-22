@extends('admin.layouts.index')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3 fs-6">Product Management</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item fs-6">
                                <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active fs-6" aria-current="page">
                                Create Product
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ url()->previous() }}"class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->


            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <x-message />
                    <div class="card">
                        <div class="card-body p-4">
                            <form class="row g-3" method="POST" action="{{ route('product.update', $product->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6">
                                    <label for="product_name" class="form-label">Product Name</label>
                                    <input type="text"
                                        class="form-control mb-3 @error('product_name') is-invalid @enderror"
                                        name="product_name" id="product_name" placeholder="Enter the Product name"
                                        value="{{ $product->name }}">
                                    @error('product_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="product_price" class="form-label">Product Price</label>
                                    <input type="text"
                                        class="form-control mb-3 @error('product_price') is-invalid @enderror"
                                        name="product_price" id="product_price" placeholder="Product Price"
                                        value="{{ $product->price }}">
                                    @error('product_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="product_description" class="form-label">Product description</label>
                                    <input type="text"
                                        class="form-control mb-3 @error('product_description') is-invalid @enderror"
                                        name="product_description" id="product_description"
                                        placeholder="Product Description" value="{{ $product->description }}">
                                    @error('product_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="product_quantity" class="form-label">Product quantity</label>
                                    <input type="text"
                                        class="form-control mb-3 @error('product_quantity') is-invalid @enderror"
                                        name="product_quantity" id="product_quantity" placeholder="Product Quantity"
                                        value="{{ $product->quantity }}">
                                    @error('product_quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="product_discount" class="form-label">Product Discount</label>
                                    <input type="text"
                                        class="form-control mb-3 @error('product_discount') is-invalid @enderror"
                                        name="product_discount" id="product_discount" placeholder="Product Discount"
                                        value="{{ $product->discount }}">
                                    @error('product_discount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exampleInputName" class="form-label">Product Category</label>
                                    <select class="form-select mb-3 @error('product_category') is-invalid @enderror"
                                        aria-label="Default select example" name="product_category" id="product_category">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('product_category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>




                                {{-- test image  --}}
                                <div class="col-md-6 mb-3">
                                    <label for="formFile" class="form-label">Product Image</label>
                                    <input class="form-control @error('product_image') is-invalid @enderror" type="file"
                                        id="product_image" name="product_image" accept="image/*">

                                    <div class="d-flex justify-content-between">

                                        @if ($product->image)
                                            <div class="mt-2">
                                                <p>Current Image:</p>
                                                <img src="{{ asset('storage/' . $product->image) }}"
                                                    alt="{{ $product->name }} Image" style="max-width: 200px;">
                                            </div>
                                        @else
                                            <p>No image available</p>
                                        @endif


                                        <div class="mt-2">
                                            <p>New Image Preview:</p>
                                            <img id="imagePreview" src="#" alt="Image Preview"
                                                style="display:none;max-width: 200px;">
                                        </div>
                                    </div>

                                    @error('product_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" class="btn btn-primary px-4">
                                            Update
                                        </button>
                                        <button type="button" class="btn btn-light px-4">
                                            Reset
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
    <!--end page wrapper -->
    <script>
        document.getElementById("product_image").addEventListener("change", function() {
            console.log("product_image");
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("imagePreview").setAttribute("src", e.target.result);
                document.getElementById("imagePreview").style.display = "block";
            }
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@endsection
