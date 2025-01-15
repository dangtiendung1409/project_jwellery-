@extends("admin.layout")
@section("content")
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Đảm bảo các thẻ nằm cùng một hàng -->
            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <i class="menu-icon tf-icons bx bx-dollar-circle" style="font-size: 2rem; color: green;"></i>
                            </div>
                            <div class="dropdown">
                                <button
                                    class="btn p-0"
                                    type="button"
                                    id="cardOpt3"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Total Revenue</span>
                        <h3 class="card-title mb-2">${{ number_format($totalRevenue, 2) }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <!-- Thay thế thẻ <img> bằng thẻ <i> để sử dụng icon BoxIcons -->
                                <i class="menu-icon tf-icons bx bx-box" style="font-size: 2rem; color: blue;"></i>
                            </div>
                            <div class="dropdown">
                                <button
                                    class="btn p-0"
                                    type="button"
                                    id="cardOpt6"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Total Products</span>
                        <h3 class="card-title mb-2">{{ $totalProducts }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <!-- Thay thế thẻ <img> bằng thẻ <i> để sử dụng icon BoxIcons -->
                                <i class="menu-icon tf-icons bx bx-time-five" style="font-size: 2rem; color: orange;"></i>
                            </div>
                            <div class="dropdown">
                                <button
                                    class="btn p-0"
                                    type="button"
                                    id="cardOpt6"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Pending Orders</span>
                        <h3 class="card-title mb-2">{{ $totalPendingOrders }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <!-- Thay thế thẻ <img> bằng thẻ <i> để sử dụng icon BoxIcons -->
                                <i class="menu-icon tf-icons bx bx-x-circle" style="font-size: 2rem; color: red;"></i>
                            </div>
                            <div class="dropdown">
                                <button
                                    class="btn p-0"
                                    type="button"
                                    id="cardOpt6"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Canceled Orders</span>
                        <h3 class="card-title mb-2">{{ $totalCanceledOrders }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <!-- Sử dụng icon BoxIcons -->
                                <i class="menu-icon tf-icons bx bx-package" style="font-size: 2rem; color: gray;"></i>
                            </div>
                            <div class="dropdown">
                                <button
                                    class="btn p-0"
                                    type="button"
                                    id="cardOpt6"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Out of Stock Products</span>
                        <h3 class="card-title mb-2">{{ $totalOutOfStockProducts }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <!-- Sử dụng icon BoxIcons -->
                                <i class="menu-icon tf-icons bx bx-user" style="font-size: 2rem; color: purple;"></i>
                            </div>
                            <div class="dropdown">
                                <button
                                    class="btn p-0"
                                    type="button"
                                    id="cardOpt6"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Total Customers</span>
                        <h3 class="card-title mb-2">{{ $totalCustomers }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <!-- Sử dụng icon BoxIcons -->
                                <i class="menu-icon tf-icons bx bx-message-square-detail" style="font-size: 2rem; color: yellow;"></i>
                            </div>
                            <div class="dropdown">
                                <button
                                    class="btn p-0"
                                    type="button"
                                    id="cardOpt6"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Pending Reviews</span>
                        <h3 class="card-title mb-2">{{ $totalPendingReviews }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <!-- Sử dụng icon BoxIcons -->
                                <i class="menu-icon tf-icons bx bx-reply" style="font-size: 2rem; color: teal;"></i>
                            </div>
                            <div class="dropdown">
                                <button
                                    class="btn p-0"
                                    type="button"
                                    id="cardOpt6"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Pending Product Returns</span>
                        <h3 class="card-title mb-2">{{ $totalPendingReturns }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--danh sách 10 sản phẩm bán chạy nhất--}}
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Top 10 Best Selling Products List</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Product Code</th>
                        <th>Images</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Average Rating</th>
                        <th>Total Sold</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @if($topSellingProducts->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center text-danger">No data available</td>
                        </tr>
                    @else
                        @foreach($topSellingProducts as $product)
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
                                <td>{{ $product->total_sold }}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{--danh sách sản phẩm hết hàng--}}
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">List of out of stock products</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Product Code</th>
                        <th>Images</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @if($outOfStockProducts->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center text-danger">No data available</td>
                        </tr>
                    @else
                        @foreach($outOfStockProducts as $product)
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
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                @if($outOfStockProducts->total() > 0)
                    <nav aria-label="Page navigation" style="margin-left: 12px">
                        <ul class="pagination">
                            <!-- Link tới trang đầu tiên -->
                            <li class="page-item {{ ($outOfStockProducts->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $outOfStockProducts->url(1) }}"><i class="tf-icon bx bx-chevrons-left"></i></a>
                            </li>
                            <!-- Link tới trang trước -->
                            <li class="page-item {{ ($outOfStockProducts->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $outOfStockProducts->previousPageUrl() }}"><i class="tf-icon bx bx-chevron-left"></i></a>
                            </li>
                            @if ($outOfStockProducts->total() <= 10)
                                <!-- Hiển thị trang đầu tiên -->
                                <li class="page-item active">
                                    <a class="page-link" href="{{ $outOfStockProducts->url(1) }}">1</a>
                                </li>
                            @else
                                <!-- Hiển thị các liên kết trang -->
                                @if ($outOfStockProducts->lastPage() > 1)
                                    <!-- Hiển thị trang đầu tiên -->
                                    <li class="page-item {{ ($outOfStockProducts->currentPage() == 1) ? ' active' : '' }}">
                                        <a class="page-link" href="{{ $outOfStockProducts->url(1) }}">1</a>
                                    </li>
                                    @if ($outOfStockProducts->currentPage() > 3)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    @for ($i = max(2, $outOfStockProducts->currentPage() - 1); $i <= min($outOfStockProducts->currentPage() + 1, $outOfStockProducts->lastPage() - 1); $i++)
                                        <li class="page-item {{ ($outOfStockProducts->currentPage() == $i) ? ' active' : '' }}">
                                            <a class="page-link" href="{{ $outOfStockProducts->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    @if ($outOfStockProducts->currentPage() < $outOfStockProducts->lastPage() - 2)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    <!-- Hiển thị trang cuối cùng -->
                                    <li class="page-item {{ ($outOfStockProducts->currentPage() == $outOfStockProducts->lastPage()) ? ' active' : '' }}">
                                        <a class="page-link" href="{{ $outOfStockProducts->url($outOfStockProducts->lastPage()) }}">{{ $outOfStockProducts->lastPage() }}</a>
                                    </li>
                                @endif
                            @endif
                            <!-- Link tới trang kế tiếp -->
                            <li class="page-item {{ ($outOfStockProducts->currentPage() == $outOfStockProducts->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $outOfStockProducts->nextPageUrl() }}"><i class="tf-icon bx bx-chevron-right"></i></a>
                            </li>
                            <!-- Link tới trang cuối cùng -->
                            <li class="page-item {{ ($outOfStockProducts->currentPage() == $outOfStockProducts->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $outOfStockProducts->url($outOfStockProducts->lastPage()) }}"><i class="tf-icon bx bx-chevrons-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </div>
    {{--danh sách đơn hàng pending--}}
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Pending order list</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Order code</th>
                        <th>Total amount</th>
                        <th>Payment method</th>
                        <th>Is paid</th>
                        <th>Shipping method</th>
                        <th>Created at</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @if($pendingOrders->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center text-danger">No data available</td>
                        </tr>
                    @else
                        @foreach($pendingOrders as $order)
                            <tr>
                                <td> <strong>{{$order->order_code}}</strong></td>
                                <td>${{$order->total_amount}}</td>
                                <td>{{$order->payment_method}}</td>
                                <td>
                                    @switch($order->is_paid)
                                        @case('paid')
                                            <span class="badge bg-label-success me-1">Paid</span>
                                            @break

                                        @case('unpaid')
                                            <span class="badge bg-label-danger me-1">Unpaid</span>
                                            @break
                                        @default
                                            <span class="badge bg-label-secondary me-1">Unknown</span>
                                    @endswitch
                                </td>
                                <td>{{$order->shipping_method}}</td>
                                <td>{{$order->created_at ? $order->created_at->format('d/m/Y') : 'N/A' }}</td>
                                <td>
                                    @switch($order->status)
                                        @case('pending')
                                            <span class="badge bg-label-warning me-1">Pending</span>
                                            @break

                                        @case('confirmed')
                                            <span class="badge bg-label-success me-1">Confirmed</span>
                                            @break

                                        @case('shipping')
                                            <span class="badge bg-label-info me-1">Shipping</span>
                                            @break

                                        @case('shipped')
                                            <span class="badge bg-label-primary me-1">Shipped</span>
                                            @break

                                        @case('complete')
                                            <span class="badge bg-label-success me-1">Complete</span>
                                            @break

                                        @case('cancel')
                                            <span class="badge bg-label-danger me-1">Cancel</span>
                                            @break

                                        @default
                                            <span class="badge bg-label-secondary me-1">Unknown</span>
                                    @endswitch
                                </td>
                                <td>
                                    <a href="{{ route('admin.orderDetails', $order->id) }}" class="btn btn-info">
                                        <i class="bx bx-show me-1"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                @if($pendingOrders->total() > 0)
                    <nav aria-label="Page navigation" style="margin-left: 12px">
                        <ul class="pagination">
                            <!-- Link tới trang đầu tiên -->
                            <li class="page-item {{ ($pendingOrders->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $pendingOrders->url(1) }}"><i class="tf-icon bx bx-chevrons-left"></i></a>
                            </li>
                            <!-- Link tới trang trước -->
                            <li class="page-item {{ ($pendingOrders->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $pendingOrders->previousPageUrl() }}"><i class="tf-icon bx bx-chevron-left"></i></a>
                            </li>
                            @if ($pendingOrders->total() <= 10)
                                <!-- Hiển thị trang đầu tiên -->
                                <li class="page-item active">
                                    <a class="page-link" href="{{ $pendingOrders->url(1) }}">1</a>
                                </li>
                            @else
                                <!-- Hiển thị các liên kết trang -->
                                @if ($pendingOrders->lastPage() > 1)
                                    <!-- Hiển thị trang đầu tiên -->
                                    <li class="page-item {{ ($pendingOrders->currentPage() == 1) ? ' active' : '' }}">
                                        <a class="page-link" href="{{ $pendingOrders->url(1) }}">1</a>
                                    </li>
                                    @if ($pendingOrders->currentPage() > 3)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    @for ($i = max(2, $pendingOrders->currentPage() - 1); $i <= min($pendingOrders->currentPage() + 1, $pendingOrders->lastPage() - 1); $i++)
                                        <li class="page-item {{ ($pendingOrders->currentPage() == $i) ? ' active' : '' }}">
                                            <a class="page-link" href="{{ $pendingOrders->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    @if ($pendingOrders->currentPage() < $pendingOrders->lastPage() - 2)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    <!-- Hiển thị trang cuối cùng -->
                                    <li class="page-item {{ ($pendingOrders->currentPage() == $pendingOrders->lastPage()) ? ' active' : '' }}">
                                        <a class="page-link" href="{{ $pendingOrders->url($pendingOrders->lastPage()) }}">{{ $pendingOrders->lastPage() }}</a>
                                    </li>
                                @endif
                            @endif
                            <!-- Link tới trang kế tiếp -->
                            <li class="page-item {{ ($pendingOrders->currentPage() == $pendingOrders->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $pendingOrders->nextPageUrl() }}"><i class="tf-icon bx bx-chevron-right"></i></a>
                            </li>
                            <!-- Link tới trang cuối cùng -->
                            <li class="page-item {{ ($pendingOrders->currentPage() == $pendingOrders->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $pendingOrders->url($pendingOrders->lastPage()) }}"><i class="tf-icon bx bx-chevrons-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </div>
    {{--danh sách review pending--}}
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Pending review list</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Product name</th>
                        <th>comment</th>
                        <th>Rating value</th>
                        <th>Created at</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @if($pendingReviews->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center text-danger">No data available</td>
                        </tr>
                    @else
                        @foreach($pendingReviews as $review)
                            <tr>
                                <td>{{$review->id}}</td>
                                <td>
                                    @if($review->product && $review->product->images->isNotEmpty())
                                        <img src="{{ asset($review->product->images->first()->image_path) }}" alt="Product Image" style="width: 100px; height: 100px;">
                                    @else
                                        <img src="{{ asset('path/to/default/image.png') }}" alt="Default Image" style="width: 100px; height: 100px;">
                                    @endif
                                </td>
                                <td>{{$review->product->product_name}}</td>
                                <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                                    {{$review->comment}}
                                </td>
                                <td>
                                    @for ($i = 0; $i < $review->rating_value; $i++)
                                        <i class="bx bxs-star text-warning"></i>
                                    @endfor
                                    @for ($i = $review->rating_value; $i < 5; $i++)
                                        <i class="bx bx-star text-warning"></i>
                                    @endfor
                                </td>
                                <td>{{$review->created_at ? $review->created_at->format('d/m/Y') : 'N/A' }}</td>
                                <td>
                                    @switch($review->status)
                                        @case('pending')
                                            <span class="badge bg-label-warning me-1">Pending</span>
                                            @break
                                        @case('accept')
                                            <span class="badge bg-label-success me-1">Accept</span>
                                            @break

                                        @case('reject')
                                            <span class="badge bg-label-danger me-1">Reject</span>
                                            @break

                                        @default
                                            <span class="badge bg-label-secondary me-1">Unknown</span>
                                    @endswitch
                                </td>

                                <td>
                                    @if($review->status == 'pending')
                                        <form action="{{ route('admin.updateReviewStatus', ['id' => $review->id, 'status' => 'accept']) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success">Accept</button>
                                        </form>
                                        <form action="{{ route('admin.updateReviewStatus', ['id' => $review->id, 'status' => 'reject']) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-danger">Reject</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                @if($pendingReviews->total() > 0)
                    <nav aria-label="Page navigation" style="margin-left: 12px">
                        <ul class="pagination">
                            <!-- Link tới trang đầu tiên -->
                            <li class="page-item {{ ($pendingReviews->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $pendingReviews->url(1) }}"><i class="tf-icon bx bx-chevrons-left"></i></a>
                            </li>
                            <!-- Link tới trang trước -->
                            <li class="page-item {{ ($pendingReviews->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $pendingReviews->previousPageUrl() }}"><i class="tf-icon bx bx-chevron-left"></i></a>
                            </li>
                            @if ($pendingReviews->total() <= 10)
                                <!-- Hiển thị trang đầu tiên -->
                                <li class="page-item active">
                                    <a class="page-link" href="{{ $pendingReviews->url(1) }}">1</a>
                                </li>

                            @else
                                <!-- Hiển thị các liên kết trang -->
                                @if ($pendingReviews->lastPage() > 1)
                                    <!-- Hiển thị trang đầu tiên -->
                                    <li class="page-item {{ ($pendingReviews->currentPage() == 1) ? ' active' : '' }}">
                                        <a class="page-link" href="{{ $pendingReviews->url(1) }}">1</a>
                                    </li>
                                    @if ($pendingReviews->currentPage() > 3)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    @for ($i = max(2, $pendingReviews->currentPage() - 1); $i <= min($pendingReviews->currentPage() + 1, $pendingReviews->lastPage() - 1); $i++)
                                        <li class="page-item {{ ($pendingReviews->currentPage() == $i) ? ' active' : '' }}">
                                            <a class="page-link" href="{{ $pendingReviews->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    @if ($pendingReviews->currentPage() < $pendingReviews->lastPage() - 2)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    <!-- Hiển thị trang cuối cùng -->
                                    <li class="page-item {{ ($pendingReviews->currentPage() == $pendingReviews->lastPage()) ? ' active' : '' }}">
                                        <a class="page-link" href="{{ $pendingReviews->url($pendingReviews->lastPage()) }}">{{ $pendingReviews->lastPage() }}</a>
                                    </li>
                                @endif
                            @endif
                            <!-- Link tới trang kế tiếp -->
                            <li class="page-item {{ ($pendingReviews->currentPage() == $pendingReviews->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $pendingReviews->nextPageUrl() }}"><i class="tf-icon bx bx-chevron-right"></i></a>
                            </li>
                            <!-- Link tới trang cuối cùng -->
                            <li class="page-item {{ ($pendingReviews->currentPage() == $pendingReviews->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $pendingReviews->url($pendingReviews->lastPage()) }}"><i class="tf-icon bx bx-chevrons-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </div>

@endsection


