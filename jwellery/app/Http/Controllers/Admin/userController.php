<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function users(Request $request)
    {
        $query = User::query();

        // Lọc theo tên đầy đủ
        if ($request->filled('full_name')) {
            $query->where('full_name', 'like', '%' . $request->input('full_name') . '%');
        }

        // Lọc theo email
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }

        // Lọc theo số điện thoại
        if ($request->filled('phone_number')) {
            $query->where('phone_number', 'like', '%' . $request->input('phone_number') . '%');
        }

        // Lọc theo ngày tạo từ ngày nào đến ngày nào
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->input('start_date'));
        }
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->input('end_date'));
        }

        $size = $request->input('size', 10);
        $users = $query->paginate($size)->appends($request->all());

        return view('admin.User.listUser', compact('users'));
    }

    public function userOrders($id){
        $user = User::findOrFail($id);
        $orders = $user->orders()->paginate(10);
        return view('admin.User.listOrderUser', compact('user', 'orders'));
    }
}
