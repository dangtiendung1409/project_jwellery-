<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Review;
use App\Models\ProductReturn;

class dashboardController extends Controller
{
    public function dashboard(){
        $totalRevenue = Order::where('status', 'complete')->sum('total_amount'); // tổng doanh thu của các đơn hàng có trạng thái complete
        $totalProducts = Product::count();  // tổng số lượng sản phẩm
        $totalPendingOrders = Order::where('status', 'pending')->count(); // tổng số đơn hàng có trạng thái pending
        $totalCanceledOrders = Order::where('status', 'cancel')->count();  // tổng số đơn hàng có trạng thái cancel
        $totalOutOfStockProducts = Product::where('qty', 0)->count();  // tổng số lượng sản phẩm hết hàng
        $totalCustomers = User::where('id', '!=', 1)->count();// tổng số khách hàng, trừ tài khoản có id là 1
        $totalPendingReviews = Review::where('status', 'pending')->count();// tổng số đánh giá có trạng thái pending
        $totalPendingReturns = ProductReturn::where('status', 'pending')->count(); // tổng số yêu cầu hoàn trả sản phẩm có trạng thái pending


        $outOfStockProducts = Product::where('qty', 0)->paginate(10); // danh sách sản phẩm hết hàng
        $pendingOrders = Order::where('status', 'pending')->paginate(10);  // danh sách đơn hàng có trạng thái pending
        $pendingReviews = Review::where('status', 'pending')->paginate(10);  // danh sách review có trạng thái pending
        // danh sách 10 sản phẩm bán chạy nhất
        $topSellingProducts = Product::select('products.*', \DB::raw('SUM(order_details.qty) as total_sold'))
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->where('orders.status', 'complete')
            ->where('order_details.status', 0)
            ->groupBy('products.id')
            ->orderBy('total_sold', 'desc')
            ->limit(10)
            ->get();
        return view('admin.dashboard',
            compact(
                'totalRevenue',
                'totalProducts',
                'totalPendingOrders',
                'totalCanceledOrders',
                'totalOutOfStockProducts',
                'totalCustomers',
                'totalPendingReviews',
                'totalPendingReturns',
                'outOfStockProducts',
                'pendingOrders',
                'pendingReviews',
                'topSellingProducts'
            ));
    }
}
