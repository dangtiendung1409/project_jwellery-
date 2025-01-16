@extends("admin.layout")
@section("content")
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> List customer</h4>
        <!-- Form lọc người dùng -->
        <form action="{{ url('admin/users') }}" method="get" style="display: flex; align-items: center; border-radius: 5px; margin-bottom: 20px; margin-top: 10px; flex-wrap: nowrap;">
            <!-- Lọc theo tên đầy đủ -->
            <div class="input-group input-group-sm" style="margin-right: 5px;">
                <input class="form-control" type="text" name="full_name" placeholder="Full Name" style="height: 45px; font-size: 0.765625rem; padding: 4px 8px; background-color: white; border-radius: 5px; width: 120px;" />
            </div>

            <!-- Lọc theo email -->
            <div class="input-group input-group-sm" style="margin-right: 5px;">
                <input class="form-control" type="text" name="email" placeholder="Email" style="height: 45px; font-size: 0.765625rem; padding: 4px 8px; background-color: white; border-radius: 5px; width: 120px;" />
            </div>

            <!-- Lọc theo số điện thoại -->
            <div class="input-group input-group-sm" style="margin-right: 5px;">
                <input class="form-control" type="text" name="phone_number" placeholder="Phone Number" style="height: 45px; font-size: 0.765625rem; padding: 4px 8px; background-color: white; border-radius: 5px; width: 120px;" />
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
                        <th>Id</th>
                        <th>Thumbnail</th>
                        <th>Full name</th>
                        <th>Email</th>
                        <th>Phone number</th>
                        <th>Address</th>
                        <th>Created at</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @if($users->isEmpty())
                        <tr>
                            <td colspan="8" class="text-center text-danger">No data available</td>
                        </tr>
                    @else
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>
                                    @if($user->thumbnail)
                                        <img src="{{ asset($user->thumbnail) }}" alt="User Image" style="width: 150px; height: 150px;">
                                    @else
                                        <img src="{{ asset('path/to/default/image.png') }}" alt="Default Image" style="width: 150px; height: 150px;">
                                    @endif
                                </td>
                                <td>{{$user->full_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone_number}}</td>
                                <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                                    {{$user->fullAddress}}
                                </td>
                                <td>{{$user->created_at ? $user->created_at->format('d/m/Y') : 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('admin.userOrders', $user->id) }}" class="btn btn-info">
                                        <i class="bx bx-cart me-1"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                @if($users->total() > 0)
                    <nav aria-label="Page navigation" style="margin-left: 12px">
                        <ul class="pagination">
                            <!-- Link tới trang đầu tiên -->
                            <li class="page-item {{ ($users->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $users->url(1) }}"><i class="tf-icon bx bx-chevrons-left"></i></a>
                            </li>
                            <!-- Link tới trang trước -->
                            <li class="page-item {{ ($users->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $users->previousPageUrl() }}"><i class="tf-icon bx bx-chevron-left"></i></a>
                            </li>
                            @if ($users->total() <= 10)
                                <!-- Hiển thị trang đầu tiên -->
                                <li class="page-item active">
                                    <a class="page-link" href="{{ $users->url(1) }}">1</a>
                                </li>
                            @else
                                <!-- Hiển thị các liên kết trang -->
                                @if ($users->lastPage() > 1)
                                    <!-- Hiển thị trang đầu tiên -->
                                    <li class="page-item {{ ($users->currentPage() == 1) ? ' active' : '' }}">
                                        <a class="page-link" href="{{ $users->url(1) }}">1</a>
                                    </li>
                                    @if ($users->currentPage() > 3)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    @for ($i = max(2, $users->currentPage() - 1); $i <= min($users->currentPage() + 1, $users->lastPage() - 1); $i++)
                                        <li class="page-item {{ ($users->currentPage() == $i) ? ' active' : '' }}">
                                            <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    @if ($users->currentPage() < $users->lastPage() - 2)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    <!-- Hiển thị trang cuối cùng -->
                                    <li class="page-item {{ ($users->currentPage() == $users->lastPage()) ? ' active' : '' }}">
                                        <a class="page-link" href="{{ $users->url($users->lastPage()) }}">{{ $users->lastPage() }}</a>
                                    </li>
                                @endif
                            @endif
                            <!-- Link tới trang kế tiếp -->
                            <li class="page-item {{ ($users->currentPage() == $users->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $users->nextPageUrl() }}"><i class="tf-icon bx bx-chevron-right"></i></a>
                            </li>
                            <!-- Link tới trang cuối cùng -->
                            <li class="page-item {{ ($users->currentPage() == $users->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $users->url($users->lastPage()) }}"><i class="tf-icon bx bx-chevrons-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </div>
@endsection
