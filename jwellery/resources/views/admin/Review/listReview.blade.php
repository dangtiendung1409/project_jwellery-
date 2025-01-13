@extends("admin.layout")
@section("content")
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> List Review Product</h4>
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Table Basic</h5>
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
                    @if($reviews->isEmpty())
                        <tr>
                            <td colspan="8" class="text-center text-danger">No data available</td>
                        </tr>
                    @else
                        @foreach($reviews as $review)
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
                @if($reviews->total() > 0)
                    <nav aria-label="Page navigation" style="margin-left: 12px">
                        <ul class="pagination">
                            <!-- Link tới trang đầu tiên -->
                            <li class="page-item {{ ($reviews->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $reviews->url(1) }}"><i class="tf-icon bx bx-chevrons-left"></i></a>
                            </li>
                            <!-- Link tới trang trước -->
                            <li class="page-item {{ ($reviews->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $reviews->previousPageUrl() }}"><i class="tf-icon bx bx-chevron-left"></i></a>
                            </li>
                            @if ($reviews->total() <= 10)
                                <!-- Hiển thị trang đầu tiên -->
                                <li class="page-item active">
                                    <a class="page-link" href="{{ $reviews->url(1) }}">1</a>
                                </li>
                            @else
                                <!-- Hiển thị các liên kết trang -->
                                @if ($reviews->lastPage() > 1)
                                    <!-- Hiển thị trang đầu tiên -->
                                    <li class="page-item {{ ($reviews->currentPage() == 1) ? ' active' : '' }}">
                                        <a class="page-link" href="{{ $reviews->url(1) }}">1</a>
                                    </li>
                                    @if ($reviews->currentPage() > 3)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    @for ($i = max(2, $reviews->currentPage() - 1); $i <= min($reviews->currentPage() + 1, $reviews->lastPage() - 1); $i++)
                                        <li class="page-item {{ ($reviews->currentPage() == $i) ? ' active' : '' }}">
                                            <a class="page-link" href="{{ $reviews->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    @if ($reviews->currentPage() < $reviews->lastPage() - 2)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    <!-- Hiển thị trang cuối cùng -->
                                    <li class="page-item {{ ($reviews->currentPage() == $reviews->lastPage()) ? ' active' : '' }}">
                                        <a class="page-link" href="{{ $reviews->url($reviews->lastPage()) }}">{{ $reviews->lastPage() }}</a>
                                    </li>
                                @endif
                            @endif
                            <!-- Link tới trang kế tiếp -->
                            <li class="page-item {{ ($reviews->currentPage() == $reviews->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $reviews->nextPageUrl() }}"><i class="tf-icon bx bx-chevron-right"></i></a>
                            </li>
                            <!-- Link tới trang cuối cùng -->
                            <li class="page-item {{ ($reviews->currentPage() == $reviews->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $reviews->url($reviews->lastPage()) }}"><i class="tf-icon bx bx-chevrons-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                @endif
            </div>
        </div>

    </div>
@endsection
