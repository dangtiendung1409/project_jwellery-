@extends('admin.layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Category List</h4>
        <a href="{{route('admin.addCategory')}}" style="margin-bottom: 15px" class="btn btn-dark">Add Category</a>
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Table Basic</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Slug</th>
                        <th>Image</th>
                        <th>Parent Category</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                @if($category->image)
                                    <img src="{{ asset($category->image) }}" alt="Category Image" style="width: 150px; height: 150px;">
                                @else
                                    <img src="{{ asset('path/to/default/image.png') }}" alt="Default Image" style="width: 150px; height: 150px;">
                                @endif
                            </td>
                            <td>
                                @if($category->parent_category_id)
                                    {{ $category->parent->category_name ?? 'N/A' }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.editCategory', $category->id) }}" class="btn btn-warning">
                                    <i class="bx bx-edit-alt me-1"></i>
                                </a>
                                <form action="{{ route('admin.deleteCategory', $category->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?');">
                                        <i class="bx bx-trash me-1"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- Hiển thị các liên kết phân trang tùy chỉnh nếu cần -->
                <nav aria-label="Page navigation" style="margin-left: 12px">
                    <ul class="pagination">
                        <!-- Link tới trang đầu tiên -->
                        <li class="page-item {{ ($categories->currentPage() == 1) ? ' disabled' : '' }}">
                            <a class="page-link" href="{{ $categories->url(1) }}"><i class="tf-icon bx bx-chevrons-left"></i></a>
                        </li>
                        <!-- Link tới trang trước -->
                        <li class="page-item {{ ($categories->currentPage() == 1) ? ' disabled' : '' }}">
                            <a class="page-link" href="{{ $categories->previousPageUrl() }}"><i class="tf-icon bx bx-chevron-left"></i></a>
                        </li>
                        <!-- Hiển thị các liên kết trang -->
                        @if ($categories->lastPage() > 1)
                            <!-- Hiển thị trang đầu tiên -->
                            <li class="page-item {{ ($categories->currentPage() == 1) ? ' active' : '' }}">
                                <a class="page-link" href="{{ $categories->url(1) }}">1</a>
                            </li>
                            @if ($categories->currentPage() > 3)
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                            @endif
                            @for ($i = max(2, $categories->currentPage() - 1); $i <= min($categories->currentPage() + 1, $categories->lastPage() - 1); $i++)
                                <li class="page-item {{ ($categories->currentPage() == $i) ? ' active' : '' }}">
                                    <a class="page-link" href="{{ $categories->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            @if ($categories->currentPage() < $categories->lastPage() - 2)
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                            @endif
                            <!-- Hiển thị trang cuối cùng -->
                            <li class="page-item {{ ($categories->currentPage() == $categories->lastPage()) ? ' active' : '' }}">
                                <a class="page-link" href="{{ $categories->url($categories->lastPage()) }}">{{ $categories->lastPage() }}</a>
                            </li>
                        @endif
                        <!-- Link tới trang kế tiếp -->
                        <li class="page-item {{ ($categories->currentPage() == $categories->lastPage()) ? ' disabled' : '' }}">
                            <a class="page-link" href="{{ $categories->nextPageUrl() }}"><i class="tf-icon bx bx-chevron-right"></i></a>
                        </li>
                        <!-- Link tới trang cuối cùng -->
                        <li class="page-item {{ ($categories->currentPage() == $categories->lastPage()) ? ' disabled' : '' }}">
                            <a class="page-link" href="{{ $categories->url($categories->lastPage()) }}"><i class="tf-icon bx bx-chevrons-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
