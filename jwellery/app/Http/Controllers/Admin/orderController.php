<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class orderController extends Controller
{
    public function orders(Request $request)
    {
        $query = Order::query();

        // Lọc theo mã đơn hàng
        if ($request->filled('order_code')) {
            $query->where('order_code', 'like', '%' . $request->input('order_code') . '%');
        }

        // Lọc theo phương thức thanh toán
        if ($request->filled('payment_method')) {
            $query->where('payment_method', $request->input('payment_method'));
        }

        // Lọc theo trạng thái thanh toán
        if ($request->filled('is_paid')) {
            $query->where('is_paid', $request->input('is_paid'));
        }

        // Lọc theo phương thức vận chuyển
        if ($request->filled('shipping_method')) {
            $query->where('shipping_method', $request->input('shipping_method'));
        }

        // Lọc theo trạng thái đơn hàng
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        // Lọc theo ngày tạo từ ngày nào đến ngày nào
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->input('start_date'));
        }
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->input('end_date'));
        }

        $size = $request->input('size', 10);
        $orders = $query->orderByRaw("CASE WHEN status = 'pending' THEN 0 ELSE 1 END")
        ->orderBy('created_at', 'desc')
        ->paginate($size)->appends($request->all());

        return view('admin.Order.listOrder', compact('orders'));
    }
    public function orderDetails($id) {
        $order = Order::with(['orderDetails.product.images'])->findOrFail($id);

        // Lấy thông tin người dùng
        $user = $order->user;

        return view('admin.Order.orderDetails', compact('order', 'user'));
    }

    public function updateOrderStatus($id, $status) {
        $order = Order::findOrFail($id);
        $order->status = $status;
        $order->save();
        Session::flash('successMessage', 'Order update status successfully!');
        return redirect()->route('admin.orders')->with('success', 'Order status updated successfully');
    }
}
