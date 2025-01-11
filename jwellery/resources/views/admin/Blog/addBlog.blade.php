@extends("admin.layout")
@section("content")
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Add Blog</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add Blog</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.storeBlog') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="blog-title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="blog-title" name="title" placeholder="Blog Title"  />
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="blog-thumbnail">Thumbnail</label>
                                <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" id="blog-thumbnail" name="thumbnail" accept="image/*" />
                                @error('thumbnail')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="mt-3">
                                    <img id="thumbnail-preview" src="#" alt="Selected Image" style="max-width: 200px; display: none;" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="blog-content">Content</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" id="blog-content" name="content" placeholder="Blog Content" ></textarea>
                                @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="blog-tag">Tag</label>
                                <input type="text" class="form-control @error('tag') is-invalid @enderror" id="blog-tag" name="tag" placeholder="Tag" />
                                @error('tag')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Add Blog</button>
                            <a href="{{ route('admin.blogs') }}" class="btn btn-secondary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript để hiển thị ảnh đã chọn -->
    <script>
        document.getElementById('blog-thumbnail').addEventListener('change', function(event) {
            const thumbnailPreview = document.getElementById('thumbnail-preview');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    thumbnailPreview.src = e.target.result;
                    thumbnailPreview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                thumbnailPreview.src = '#';
                thumbnailPreview.style.display = 'none';
            }
        });
    </script>
@endsection
