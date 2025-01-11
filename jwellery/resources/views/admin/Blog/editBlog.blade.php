@extends("admin.layout")
@section("content")
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Edit Blog</h4>

        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Blog</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.updateBlog', $blog->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="blog-title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="blog-title" name="title" value="{{ $blog->title }}" required />
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
                                    @if($blog->thumbnail)
                                        <img id="thumbnail-preview" src="{{ asset($blog->thumbnail) }}" alt="Selected Image" style="max-width: 200px;" />
                                    @else
                                        <img id="thumbnail-preview" src="#" alt="Selected Image" style="max-width: 200px; display: none;" />
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="blog-content">Content</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" id="blog-content" name="content" required>{{ $blog->content }}</textarea>
                                @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="blog-tag">Tag</label>
                                <input type="text" class="form-control @error('tag') is-invalid @enderror" id="blog-tag" name="tag" value="{{ $blog->tag }}" />
                                @error('tag')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update Blog</button>
                            <a href="{{ route('admin.blogs') }}" class="btn btn-secondary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
