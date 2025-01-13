@extends("admin.layout")
@section("content")
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> List Order</h4>
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Table Basic</h5>
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
                            <td colspan="6" class="text-center text-danger">No data available</td>
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
