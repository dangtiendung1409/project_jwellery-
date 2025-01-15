<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class accountSettingController extends Controller
{
    public function profile(){
        // Lấy dữ liệu người dùng hiện tại
        $user = Auth::user();
        return view('admin.AccountSetting.profile', compact('user'));
    }

    public function updateProfile(Request $request) {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone_number' => 'required|string|max:15',
            'province' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'ward' => 'required|string|max:255',
            'address_detail' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Xác thực file ảnh
        ]);

        // Lấy người dùng hiện tại
        $user = Auth::user();

        // Xử lý việc tải lên ảnh đại diện
        if ($request->hasFile('thumbnail')) {
            // Xóa ảnh cũ nếu có
            if ($user->thumbnail && file_exists(public_path($user->thumbnail))) {
                unlink(public_path($user->thumbnail));
            }

            // Lưu ảnh mới
            $imageName = time() . '_' . uniqid() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('images/profile/'), $imageName);

            // Cập nhật đường dẫn ảnh trong cơ sở dữ liệu
            $user->thumbnail = 'images/profile/' . $imageName;
        }

        // Cập nhật thông tin người dùng
        $user->update([
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'province' => $request->input('province'),
            'district' => $request->input('district'),
            'ward' => $request->input('ward'),
            'address_detail' => $request->input('address_detail'),
        ]);

        Session::flash('successMessage', 'profile update successfully!');
        // Chuyển hướng người dùng về trang hồ sơ với thông báo thành công
        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }

    public function changePassword(){
        return view('admin.AccountSetting.changePassword');
    }

    public function updatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'password_current' => 'required|string',
            'password' => 'required|string|min:3|confirmed',
        ]);

        $user = Auth::user();

        // Kiểm tra mật khẩu hiện tại
        if (!Hash::check($validatedData['password_current'], $user->password)) {
            Session::flash('errorMessage', 'Current password is incorrect.');
            return redirect()->back();
        }


        $user->password = Hash::make($validatedData['password']);
        $user->save();

        Session::flash('successMessage', 'Password updated successfully!');
        return redirect()->route('admin.changePassword');
    }
}
