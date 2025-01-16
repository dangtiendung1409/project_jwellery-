@extends('admin.layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product Details /</span> {{ $product->product_name }}</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Product Details</h5>
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            @if($product->images->isNotEmpty())
                                @foreach($product->images as $image)
                                    <img src="{{ asset($image->image_path) }}" alt="Product Image" class="d-block rounded" height="150" width="150" />
                                @endforeach
                            @else
                                <img src="{{ asset('path/to/default/image.png') }}" alt="Default Image" class="d-block rounded" height="150" width="150" />
                            @endif
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST" onsubmit="return false">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="productCode" class="form-label">Product Code</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="productCode"
                                        name="productCode"
                                        value="{{ $product->product_code }}"
                                        readonly
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="productName" class="form-label">Type</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="type"
                                        name="type"
                                        value="{{ $product->type }}"
                                        readonly
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="productName" class="form-label">Product Name</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="productName"
                                        name="productName"
                                        value="{{ $product->product_name }}"
                                        readonly
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="price" class="form-label">Stone Type</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="stone_type"
                                        name="stone_type"
                                        value="{{ $product->stone_type }}"
                                        readonly
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="price" class="form-label">Price</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="price"
                                        name="price"
                                        value="{{ $product->price }}"
                                        readonly
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="qty" class="form-label">Color</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="color"
                                        name="color"
                                        value="{{ $product->color }}"
                                        readonly
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="qty" class="form-label">Quantity</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="qty"
                                        name="qty"
                                        value="{{ $product->qty }}"
                                        readonly
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="category" class="form-label">Material</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="material"
                                        name="material"
                                        value="{{ $product->material }}"
                                        readonly
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="category" class="form-label">Category</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="category"
                                        name="category"
                                        value="{{ $product->category->category_name }}"
                                        readonly
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="category" class="form-label">Gender</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="gender"
                                        name="gender"
                                        value="{{ $product->gender }}"
                                        readonly
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="category" class="form-label">Finish Quality</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="finish_quality"
                                        name="finish_quality"
                                        value="{{ $product->finish_quality }}"
                                        readonly
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="category" class="form-label">Created at</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="created_at"
                                        name="created_at"
                                        value="{{$product->created_at ? $product->created_at->format('d/m/Y') : 'N/A' }}"
                                        readonly
                                    />
                                </div>
                            </div>
                            <a href="{{ route('admin.products') }}" class="btn btn-secondary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
