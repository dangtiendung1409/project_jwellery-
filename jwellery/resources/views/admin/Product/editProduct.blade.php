@extends('admin.layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Edit Product</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Product</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.updateProduct', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="product-name">Product Name</label>
                                    <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product-name" name="product_name" value="{{ $product->product_name }}" placeholder="Product Name" />
                                    @error('product_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="product-price">Price</label>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="product-price" name="price" value="{{ $product->price }}" placeholder="Price" />
                                    @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="product-quantity">Quantity</label>
                                    <input type="number" class="form-control @error('qty') is-invalid @enderror" id="product-quantity" name="qty" value="{{ $product->qty }}" placeholder="Quantity" />
                                    @error('qty')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="product-category">Category</label>
                                    <select class="form-control @error('category_id') is-invalid @enderror" id="product-category" name="category_id">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if($product->category_id == $category->id) selected @endif>{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="product-type">Type</label>
                                    <input type="text" class="form-control @error('type') is-invalid @enderror" id="product-type" name="type" value="{{ $product->type }}" placeholder="Type" />
                                    @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="product-stone-type">Stone Type</label>
                                    <input type="text" class="form-control @error('stone_type') is-invalid @enderror" id="product-stone-type" name="stone_type" value="{{ $product->stone_type }}" placeholder="Stone Type" />
                                    @error('stone_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="product-color">Color</label>
                                    <input type="text" class="form-control @error('color') is-invalid @enderror" id="product-color" name="color" value="{{ $product->color }}" placeholder="Color" />
                                    @error('color')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="product-material">Material</label>
                                    <input type="text" class="form-control @error('material') is-invalid @enderror" id="product-material" name="material" value="{{ $product->material }}" placeholder="Material" />
                                    @error('material')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="product-gender">Gender</label>
                                    <input type="text" class="form-control @error('gender') is-invalid @enderror" id="product-gender" name="gender" value="{{ $product->gender }}" placeholder="Gender" />
                                    @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="product-finish-quality">Finish Quality</label>
                                    <input type="text" class="form-control @error('finish_quality') is-invalid @enderror" id="product-finish-quality" name="finish_quality" value="{{ $product->finish_quality }}" placeholder="Finish Quality" />
                                    @error('finish_quality')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="product-description">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="product-description" name="description" placeholder="Description">{{ $product->description }}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="product-images">Images (max 4)</label>
                                    <input type="file" class="form-control @error('images') is-invalid @enderror" id="product-images" name="images[]" multiple accept="image/*" />
                                    @error('images')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @error('images.*')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Hiển thị ảnh đã chọn -->
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div id="image-preview">
                                        @foreach($product->images as $image)
                                            <img src="{{ asset($image->image_path) }}" alt="Product Image" style="max-width: 100px; margin: 5px;">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Product</button>
                            <a href="{{ route('admin.products') }}" class="btn btn-secondary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript để hiển thị ảnh đã chọn -->
    <script>
        document.getElementById('product-images').addEventListener('change', function(event) {
            const imagePreview = document.getElementById('image-preview');
            imagePreview.innerHTML = ''; // Xóa nội dung cũ

            const files = event.target.files;
            if (files.length > 4) {
                alert('You can only upload a maximum of 4 images');
                event.target.value = ''; // Xóa các file đã chọn
                return;
            }

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '100px'; // Đặt kích thước ảnh
                    img.style.margin = '5px';
                    imagePreview.appendChild(img);
                };

                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
