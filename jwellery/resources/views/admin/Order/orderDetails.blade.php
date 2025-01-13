@extends("admin.layout")
@section("content")
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Order Details</h4>
        <div class="card mb-4">
            <h5 class="card-header">Customer information</h5>
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img
                        src="{{ $user->thumbnail ? asset($user->thumbnail) : asset('/images/imageUserDefault.png') }}"
                        alt="user-avatar"
                        class="d-block rounded"
                        height="100"
                        width="100"
                        id="uploadedAvatar"
                    />
                    <ul class="list-unstyled mb-0">
                        <li><strong>Full Name:</strong> {{ $order->full_name }}</li>
                        <li><strong>Email:</strong> {{ $order->email }}</li>
                        <li><strong>Telephone:</strong> {{ $order->telephone }}</li>
                        <li><strong>Address:</strong> {{ $order->fullAddress }}</li>
                    </ul>
                </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
                <form id="formAccountSettings" method="POST" onsubmit="return false">
                    <div style="text-align: center"><h3>Order information</h3></div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="orderCode" class="form-label">Order Code</label>
                            <input
                                class="form-control"
                                type="text"
                                id="orderCode"
                                name="orderCode"
                                value="{{ $order->order_code }}"
                                readonly
                            />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="productName" class="form-label">Total amount</label>
                            <input
                                class="form-control"
                                type="text"
                                id="productName"
                                name="productName"
                                value="${{$order->total_amount}}"
                                readonly
                            />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="price" class="form-label">Payment method</label>
                            <input
                                class="form-control"
                                type="text"
                                id="price"
                                name="price"
                                value="{{$order->payment_method}}"
                                readonly
                            />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="qty" class="form-label">Is paid</label>
                            <input
                                class="form-control"
                                type="text"
                                id="qty"
                                name="qty"
                                value="{{$order->is_paid}}"
                                readonly
                            />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="category" class="form-label">Shipping method</label>
                            <input
                                class="form-control"
                                type="text"
                                id="category"
                                name="category"
                                value="{{$order->shipping_method}}"
                                readonly
                            />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="category" class="form-label">Status</label>
                            <input
                                class="form-control"
                                type="text"
                                id="finish_quality"
                                name="finish_quality"
                                value="{{$order->status}}"
                                readonly
                            />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="category" class="form-label">Create at</label>
                            <input
                                class="form-control"
                                type="text"
                                id="finish_quality"
                                name="finish_quality"
                                value="{{$order->created_at ? $order->created_at->format('d/m/Y') : 'N/A' }}"
                                readonly
                            />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="cancelReason" class="form-label">Cancel Reason</label>
                            <input
                                class="form-control"
                                type="text"
                                id="cancelReason"
                                name="cancelReason"
                                value="{{ $order->cancel_reason ? $order->cancel_reason : 'No' }}"
                                readonly
                            />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">List Product</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Product code</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Return status</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach ($order->orderDetails as $detail)
                        <tr>
                            <td><strong>{{ $detail->product->product_code }}</strong></td>
                            <td>
                                @if($detail->product->images->isNotEmpty())
                                    <img src="{{ asset($detail->product->images->first()->image_path) }}" alt="Product Image" style="width: 150px; height: 150px;">
                                @else
                                    <img src="{{ asset('path/to/default/image.png') }}" alt="Default Image" style="width: 150px; height: 150px;">
                                @endif
                            </td>
                            <td>{{ $detail->product->product_name }}</td>
                            <td>{{ $detail->price }}</td>
                            <td>{{ $detail->qty }}</td>
                            <td>
                                @if($detail->status == 1)
                                    <span class="badge bg-label-danger me-1">Returned</span>
                                @else
                                    <span class="badge bg-label-success me-1">Not Returned</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-start mt-4">
            @if ($order->status == 'pending')
                <form action="{{ route('admin.updateOrderStatus', ['id' => $order->id, 'status' => 'confirmed']) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success">Confirm</button>
                </form>
                <form action="{{ route('admin.updateOrderStatus', ['id' => $order->id, 'status' => 'cancel']) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-danger">Cancel</button>
                </form>
            @elseif ($order->status == 'confirmed')
                <form action="{{ route('admin.updateOrderStatus', ['id' => $order->id, 'status' => 'shipping']) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-primary">Shipping</button>
                </form>
                <a href="{{ route('admin.orders') }}" class="btn btn-warning">Back</a>
            @elseif ($order->status == 'shipping')
                <form action="{{ route('admin.updateOrderStatus', ['id' => $order->id, 'status' => 'shipped']) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-primary">Shipped</button>
                </form>
                <a href="{{ route('admin.orders') }}" class="btn btn-warning">Back</a>
            @elseif ($order->status == 'complete' || $order->status == 'cancel')
                <a href="{{ route('admin.orders') }}" class="btn btn-warning">Back</a>
            @endif
        </div>
    </div>
@endsection
