@extends('admin.layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> List product</h4>
        <a href="{{ route('admin.addProduct') }}" style="margin-bottom: 15px" class="btn btn-dark">Add Product</a>
        <div class="card">
            <h5 class="card-header">Table Basic</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Product Code</th>
                        <th>Images</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Average Rating</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @if($products->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center text-danger">No data available</td>
                        </tr>
                    @else
                    @foreach($products as $product)
                        <tr>
                            <td><strong>{{ $product->product_code }}</strong></td>
                            <td>
                                @if($product->images->isNotEmpty())
                                    <img src="{{ asset($product->images->first()->image_path) }}" alt="Product Image" style="width: 150px; height: 150px;">
                                @else
                                    <img src="{{ asset('path/to/default/image.png') }}" alt="Default Image" style="width: 150px; height: 150px;">
                                @endif
                            </td>
                            <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                                {{$product->product_name}}
                            </td>

                            <td>${{ $product->price }}</td>
                            <td>{{ $product->qty }}</td>
                            <td>
                                @php
                                    $averageRating = $product->averageAcceptedRating();
                                    $fullStars = floor($averageRating);
                                    $halfStar = $averageRating - $fullStars >= 0.5 ? 1 : 0;
                                @endphp
                                @if($averageRating > 0)
                                    @for ($i = 0; $i < $fullStars; $i++)
                                        <i class="bx bxs-star text-warning"></i>
                                    @endfor
                                    @if ($halfStar)
                                        <i class="bx bxs-star-half text-warning"></i>
                                    @endif
                                    @for ($i = $fullStars + $halfStar; $i < 5; $i++)
                                        <i class="bx bx-star text-warning"></i>
                                    @endfor
                                @else
                                    No reviews
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.detailProduct', $product->id) }}" class="btn btn-info">
                                    <i class="bx bx-show me-1"></i>
                                </a>
                                <a href="{{ route('admin.editProduct', $product->id) }}" class="btn btn-warning">
                                    <i class="bx bx-edit-alt me-1"></i>
                                </a>
                                <form action="{{ route('admin.deleteProduct', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">
                                        <i class="bx bx-trash me-1"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
                @if($products->total() > 0)
                    <nav aria-label="Page navigation" style="margin-left: 12px">
                        <ul class="pagination">
                            <!-- Link tới trang đầu tiên -->
                            <li class="page-item {{ ($products->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $products->url(1) }}"><i class="tf-icon bx bx-chevrons-left"></i></a>
                            </li>
                            <!-- Link tới trang trước -->
                            <li class="page-item {{ ($products->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $products->previousPageUrl() }}"><i class="tf-icon bx bx-chevron-left"></i></a>
                            </li>
                            @if ($products->total() <= 10)
                                <!-- Hiển thị trang đầu tiên -->
                                <li class="page-item active">
                                    <a class="page-link" href="{{ $products->url(1) }}">1</a>
                                </li>
                            @else
                                <!-- Hiển thị các liên kết trang -->
                                @if ($products->lastPage() > 1)
                                    <!-- Hiển thị trang đầu tiên -->
                                    <li class="page-item {{ ($products->currentPage() == 1) ? ' active' : '' }}">
                                        <a class="page-link" href="{{ $products->url(1) }}">1</a>
                                    </li>
                                    @if ($products->currentPage() > 3)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    @for ($i = max(2, $products->currentPage() - 1); $i <= min($products->currentPage() + 1, $products->lastPage() - 1); $i++)
                                        <li class="page-item {{ ($products->currentPage() == $i) ? ' active' : '' }}">
                                            <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    @if ($products->currentPage() < $products->lastPage() - 2)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    <!-- Hiển thị trang cuối cùng -->
                                    <li class="page-item {{ ($products->currentPage() == $products->lastPage()) ? ' active' : '' }}">
                                        <a class="page-link" href="{{ $products->url($products->lastPage()) }}">{{ $products->lastPage() }}</a>
                                    </li>
                                @endif
                            @endif
                            <!-- Link tới trang kế tiếp -->
                            <li class="page-item {{ ($products->currentPage() == $products->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $products->nextPageUrl() }}"><i class="tf-icon bx bx-chevron-right"></i></a>
                            </li>
                            <!-- Link tới trang cuối cùng -->
                            <li class="page-item {{ ($products->currentPage() == $products->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $products->url($products->lastPage()) }}"><i class="tf-icon bx bx-chevrons-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </div>
@endsection
