@extends('admin.layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> List product</h4>
        <a href="{{ route('admin.addProduct') }}" style="margin-bottom: 15px" class="btn btn-dark">Add Product</a>

        <!-- Form lọc sản phẩm -->
        <form action="{{ url('admin/products') }}" method="get" style="display: flex; align-items: center; border-radius: 5px; margin-bottom: 20px; margin-top: 10px; flex-wrap: nowrap;">
            <!-- Lọc theo mã sản phẩm -->
            <div class="input-group input-group-sm" style="margin-right: 5px;">
                <input class="form-control" type="text" name="product_code" placeholder="Product Code" style="height: 45px; font-size: 0.765625rem; padding: 4px 8px; background-color: white; border-radius: 5px; width: 120px;" />
            </div>

            <!-- Lọc theo tên sản phẩm -->
            <div class="input-group input-group-sm" style="margin-right: 5px;">
                <input class="form-control" type="text" name="product_name" placeholder="Product Name" style="height: 45px; font-size: 0.765625rem; padding: 4px 8px; background-color: white; border-radius: 5px; width: 120px;" />
            </div>

            <!-- Lọc theo giá từ -->
            <div class="input-group input-group-sm" style="margin-right: 5px;">
                <input class="form-control" type="number" name="min_price" placeholder="Min Price" style="height: 45px; font-size: 0.765625rem; padding: 4px 8px; background-color: white; border-radius: 5px; width: 120px;" />
            </div>

            <!-- Lọc theo giá đến -->
            <div class="input-group input-group-sm" style="margin-right: 5px;">
                <input class="form-control" type="number" name="max_price" placeholder="Max Price" style="height: 45px; font-size: 0.765625rem; padding: 4px 8px; background-color: white; border-radius: 5px; width: 120px;" />
            </div>

            <!-- Lọc theo ngày tạo từ ngày nào đến ngày nào -->
            <div class="input-group input-group-sm" style="margin-right: 5px;">
                <input type="date" class="form-control" name="start_date" placeholder="From Date" style="height: 45px; font-size: 0.765625rem; background-color: white; border-radius: 5px; width: 150px;" />
            </div>
            <div class="input-group input-group-sm" style="margin-right: 5px;">
                <input type="date" class="form-control" name="end_date" placeholder="To Date" style="height: 45px; font-size: 0.765625rem; background-color: white; border-radius: 5px; width: 150px;" />
            </div>

            <!-- Nút lọc -->
            <div class="input-group input-group-sm">
                <button style="height: 45px; background-color: white; border: none; border-radius: 5px;" type="submit" class="btn btn-default">
                    <i class="bx bx-search" style="padding: 10px;"></i>
                </button>
            </div>
        </form>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <form class="card-header-icon p-2 m-2" method="get" onchange="this.submit()">
                <select style="padding: 7px 13px; border: 2px solid #F1F1F1;" name="size">
                    <option value="10" {{ request('size') == 10 ? 'selected' : '' }}>10</option>
                    <option value="20" {{ request('size') == 20 ? 'selected' : '' }}>20</option>
                    <option value="50" {{ request('size') == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ request('size') == 100 ? 'selected' : '' }}>100</option>
                </select>

                <input type="hidden" name="page" value="{{ request('page', 1) }}">
            </form>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Product Code</th>
                        <th>Images</th>
                        <th>Product Name</th>
                        <th>Price</th>
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
                                    {{ $product->product_name }}
                                </td>
                                <td>${{ $product->price }}</td>
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
