<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class orderController extends Controller
{
    public function orders() {
        // Lấy danh sách đơn hàng, sắp xếp theo trạng thái và ngày tạo
        $orders = Order::orderByRaw("FIELD(status, 'pending', 'confirmed', 'shipping', 'shipped','complete','cancel')")
            ->orderBy('created_at', 'desc')
            ->paginate(10); // Số lượng đơn hàng mỗi trang là 10

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
