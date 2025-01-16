@extends("admin.layout")
@section("content")
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> List Order</h4>

        <!-- Form lọc đơn hàng -->
        <form action="{{ url('admin/orders') }}" method="get" style="display: flex; align-items: center; border-radius: 5px; margin-bottom: 20px; margin-top: 10px; flex-wrap: nowrap;">
            <!-- Lọc theo mã đơn hàng -->
            <div class="input-group input-group-sm" style="margin-right: 5px;">
                <input class="form-control" type="text" name="order_code" placeholder="Order Code" style="height: 45px; font-size: 0.765625rem; padding: 4px 8px; background-color: white; border-radius: 5px; width: 120px;" />
            </div>

            <!-- Lọc theo phương thức thanh toán -->
            <div class="input-group input-group-sm" style="margin-right: 5px;">
                <select name="payment_method" class="form-control" style="height: 45px; font-size: 0.765625rem; background-color: white; border-radius: 5px; width: 150px;">
                    <option value="">Payment Method</option>
                    <option value="credit_card">Credit Card</option>
                    <option value="paypal">PayPal</option>
                    <option value="bank_transfer">Bank Transfer</option>
                </select>
            </div>

            <!-- Lọc theo trạng thái thanh toán -->
            <div class="input-group input-group-sm" style="margin-right: 5px;">
                <select name="is_paid" class="form-control" style="height: 45px; font-size: 0.765625rem; background-color: white; border-radius: 5px; width: 150px;">
                    <option value="">Payment Status</option>
                    <option value="paid">Paid</option>
                    <option value="unpaid">Unpaid</option>
                </select>
            </div>

            <!-- Lọc theo phương thức vận chuyển -->
            <div class="input-group input-group-sm" style="margin-right: 5px;">
                <select name="shipping_method" class="form-control" style="height: 45px; font-size: 0.765625rem; background-color: white; border-radius: 5px; width: 150px;">
                    <option value="">Shipping Method</option>
                    <option value="standard">Standard Shipping</option>
                    <option value="express">Express Shipping</option>
                </select>
            </div>

            <!-- Lọc theo trạng thái đơn hàng -->
            <div class="input-group input-group-sm" style="margin-right: 5px;">
                <select name="status" class="form-control" style="height: 45px; font-size: 0.765625rem; background-color: white; border-radius: 5px; width: 150px;">
                    <option value="">Order Status</option>
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="shipping">Shipping</option>
                    <option value="shipped">Shipped</option>
                    <option value="complete">Complete</option>
                    <option value="cancel">Cancel</option>
                </select>
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
                        <th>Order code</th>
                        <th>Total amount</th>
                        <th>Payment method</th>
                        <th>Is paid</th>
                        <th>Shipping method</th>
                        <th>Created at</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @if($orders->isEmpty())
                        <tr>
                            <td colspan="8" class="text-center text-danger">No data available</td>
                        </tr>
                    @else
                        @foreach($orders as $order)
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
                @if($orders->total() > 0)
                    <nav aria-label="Page navigation" style="margin-left: 12px">
                        <ul class="pagination">
                            <!-- Link tới trang đầu tiên -->
                            <li class="page-item {{ ($orders->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $orders->url(1) }}"><i class="tf-icon bx bx-chevrons-left"></i></a>
                            </li>
                            <!-- Link tới trang trước -->
                            <li class="page-item {{ ($orders->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $orders->previousPageUrl() }}"><i class="tf-icon bx bx-chevron-left"></i></a>
                            </li>
                            @if ($orders->total() <= 10)
                                <!-- Hiển thị trang đầu tiên -->
                                <li class="page-item active">
                                    <a class="page-link" href="{{ $orders->url(1) }}">1</a>
                                </li>
                            @else
                                <!-- Hiển thị các liên kết trang -->
                                @if ($orders->lastPage() > 1)
                                    <!-- Hiển thị trang đầu tiên -->
                                    <li class="page-item {{ ($orders->currentPage() == 1) ? ' active' : '' }}">
                                        <a class="page-link" href="{{ $orders->url(1) }}">1</a>
                                    </li>
                                    @if ($orders->currentPage() > 3)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    @for ($i = max(2, $orders->currentPage() - 1); $i <= min($orders->currentPage() + 1, $orders->lastPage() - 1); $i++)
                                        <li class="page-item {{ ($orders->currentPage() == $i) ? ' active' : '' }}">
                                            <a class="page-link" href="{{ $orders->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    @if ($orders->currentPage() < $orders->lastPage() - 2)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    <!-- Hiển thị trang cuối cùng -->
                                    <li class="page-item {{ ($orders->currentPage() == $orders->lastPage()) ? ' active' : '' }}">
                                        <a class="page-link" href="{{ $orders->url($orders->lastPage()) }}">{{ $orders->lastPage() }}</a>
                                    </li>
                                @endif
                            @endif
                            <!-- Link tới trang kế tiếp -->
                            <li class="page-item {{ ($orders->currentPage() == $orders->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $orders->nextPageUrl() }}"><i class="tf-icon bx bx-chevron-right"></i></a>
                            </li>
                            <!-- Link tới trang cuối cùng -->
                            <li class="page-item {{ ($orders->currentPage() == $orders->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $orders->url($orders->lastPage()) }}"><i class="tf-icon bx bx-chevrons-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                @endif
            </div>
        </div>

    </div>
@endsection
