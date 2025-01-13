<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class categoryController extends Controller
{
    public function category(){
        $categories = Category::paginate(10);
        return view('admin.Category.category', compact('categories'));
    }

    public function addCategory(){
        $categories = Category::all(); // Lấy danh sách category để chọn parent
        return view('admin.Category.addCategory', compact('categories'));
    }

    public function storeCategory(Request $request){
        $request->validate([
            'category_name' => 'required|string|max:150|unique:categories,category_name',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'parent_category_id' => 'nullable|integer|exists:categories,id',
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->slug = Str::slug($request->category_name);

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('images/category/'), $imageName);
            $category->image = 'images/category/' . $imageName;
        }

        $category->parent_category_id = $request->parent_category_id;
        $category->save();

        Session::flash('successMessage', 'Category added successfully!');
        return redirect()->route('admin.category')->with('success', 'Category added successfully.');
    }
    public function editCategory($id){
        $category = Category::findOrFail($id);
        $categories = Category::all(); // Lấy danh sách category để chọn parent
        return view('admin.Category.editCategory', compact('category', 'categories'));
    }

    public function updateCategory(Request $request, $id){
        $request->validate([
            'category_name' => 'required|string|max:150|unique:categories,category_name,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'parent_category_id' => 'nullable|integer|exists:categories,id',
        ]);

        $category = Category::findOrFail($id);
        $category->category_name = $request->category_name;
        $category->slug = Str::slug($request->category_name); // Tạo slug từ tên category

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($category->image) {
                unlink(public_path($category->image));
            }
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('images/category/'), $imageName);
            $category->image = 'images/category/' . $imageName;
        }

        $category->parent_category_id = $request->parent_category_id;
        $category->save();
        Session::flash('successMessage', 'Category updated successfully!');
        return redirect()->route('admin.category')->with('success', 'Category updated successfully.');
    }
    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);

        // Xóa ảnh trong thư mục public/images nếu có
        if ($category->image) {
            unlink(public_path($category->image));
        }

        $category->delete();
        Session::flash('successMessage', 'Category deleted successfully!');

        return redirect()->route('admin.category')->with('success', 'Category deleted successfully.');
    }
}
