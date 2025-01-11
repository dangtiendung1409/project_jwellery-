@extends("admin.layout")
@section("content")
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> List Blogs</h4>
        <a href="{{route('admin.addBlog')}}" style="margin-bottom: 15px" class="btn btn-dark">Add blog</a>
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Table Basic</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Thumbnail</th>
                        <th>Content</th>
                        <th>Created at</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @if($blogs->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center text-danger">No data available</td>
                        </tr>
                    @else
                        @foreach($blogs as $blog)
                            <tr>
                                <td>{{$blog->id}}</td>
                                <td>{{$blog->title}}</td>
                                <td>
                                    @if($blog->thumbnail)
                                        <img src="{{ asset($blog->thumbnail) }}" alt="Blog Image" style="width: 150px; height: 150px;">
                                    @else
                                        <img src="{{ asset('path/to/default/image.png') }}" alt="Default Image" style="width: 150px; height: 150px;">
                                    @endif
                                </td>
                                <td>{{$blog->content}}</td>
                                <td>{{ $blog->created_at ? $blog->created_at->format('d/m/Y') : 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('admin.editBlog', $blog->id) }}" class="btn btn-warning">
                                        <i class="bx bx-edit-alt me-1"></i>
                                    </a>
                                    <form action="{{ route('admin.deleteBlog', $blog->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this blog?');">
                                            <i class="bx bx-trash me-1"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                @if($blogs->total() > 0)
                    <nav aria-label="Page navigation" style="margin-left: 12px">
                        <ul class="pagination">
                            <!-- Link tới trang đầu tiên -->
                            <li class="page-item {{ ($blogs->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $blogs->url(1) }}"><i class="tf-icon bx bx-chevrons-left"></i></a>
                            </li>
                            <!-- Link tới trang trước -->
                            <li class="page-item {{ ($blogs->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $blogs->previousPageUrl() }}"><i class="tf-icon bx bx-chevron-left"></i></a>
                            </li>
                            @if ($blogs->total() <= 10)
                                <!-- Hiển thị trang đầu tiên -->
                                <li class="page-item active">
                                    <a class="page-link" href="{{ $blogs->url(1) }}">1</a>
                                </li>
                            @else
                                <!-- Hiển thị các liên kết trang -->
                                @if ($blogs->lastPage() > 1)
                                    <!-- Hiển thị trang đầu tiên -->
                                    <li class="page-item {{ ($blogs->currentPage() == 1) ? ' active' : '' }}">
                                        <a class="page-link" href="{{ $blogs->url(1) }}">1</a>
                                    </li>
                                    @if ($blogs->currentPage() > 3)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    @for ($i = max(2, $blogs->currentPage() - 1); $i <= min($blogs->currentPage() + 1, $blogs->lastPage() - 1); $i++)
                                        <li class="page-item {{ ($blogs->currentPage() == $i) ? ' active' : '' }}">
                                            <a class="page-link" href="{{ $blogs->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    @if ($blogs->currentPage() < $blogs->lastPage() - 2)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    <!-- Hiển thị trang cuối cùng -->
                                    <li class="page-item {{ ($blogs->currentPage() == $blogs->lastPage()) ? ' active' : '' }}">
                                        <a class="page-link" href="{{ $blogs->url($blogs->lastPage()) }}">{{ $blogs->lastPage() }}</a>
                                    </li>
                                @endif
                            @endif
                            <!-- Link tới trang kế tiếp -->
                            <li class="page-item {{ ($blogs->currentPage() == $blogs->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $blogs->nextPageUrl() }}"><i class="tf-icon bx bx-chevron-right"></i></a>
                            </li>
                            <!-- Link tới trang cuối cùng -->
                            <li class="page-item {{ ($blogs->currentPage() == $blogs->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $blogs->url($blogs->lastPage()) }}"><i class="tf-icon bx bx-chevrons-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </div>
@endsection
