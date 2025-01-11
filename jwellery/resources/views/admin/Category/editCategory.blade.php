@extends('admin.layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Edit Category</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Category</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.updateCategory', $category->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="category-name">Category Name</label>
                                <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category-name" name="category_name" value="{{ $category->category_name }}" placeholder="Category Name"  />
                                @error('category_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="category-image">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="category-image" name="image" accept="image/*" />
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="mt-3">
                                    @if ($category->image)
                                        <img id="image-preview" src="{{ asset($category->image) }}" alt="Selected Image" style="max-width: 200px;" />
                                    @else
                                        <img id="image-preview" src="#" alt="Selected Image" style="max-width: 200px; display: none;" />
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="parent-category">Parent Category</label>
                                <select class="form-control @error('parent_category_id') is-invalid @enderror" id="parent-category" name="parent_category_id">
                                    <option value="">None</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ $cat->id == $category->parent_category_id ? 'selected' : '' }}>{{ $cat->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('parent_category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update Category</button>
                            <a href="{{ route('admin.category') }}" class="btn btn-secondary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript để hiển thị ảnh đã chọn -->
    <script>
        document.getElementById('category-image').addEventListener('change', function(event) {
            const imagePreview = document.getElementById('image-preview');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '#';
                imagePreview.style.display = 'none';
            }
        });
    </script>
@endsection
