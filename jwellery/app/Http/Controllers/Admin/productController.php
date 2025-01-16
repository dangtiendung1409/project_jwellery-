<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class productController extends Controller
{
    public function products(Request $request)
    {
        $query = Product::with(['images', 'category']);

        // Lọc theo mã sản phẩm
        if ($request->filled('product_code')) {
            $query->where('product_code', 'like', '%' . $request->input('product_code') . '%');
        }

        // Lọc theo tên sản phẩm
        if ($request->filled('product_name')) {
            $query->where('product_name', 'like', '%' . $request->input('product_name') . '%');
        }

        // Lọc theo giá
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->input('min_price'));
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->input('max_price'));
        }

        // Lọc theo ngày tạo từ ngày nào đến ngày nào
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->input('start_date'));
        }
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->input('end_date'));
        }

        $size = $request->input('size', 10);
        $products = $query->paginate($size)->appends($request->all());

        return view('admin.Product.product', compact('products'));
    }
    public function detailProduct($id){
        $product = Product::with(['images', 'category'])->findOrFail($id);
        return view('admin.Product.detailProduct', compact('product'));
    }
    public function addProduct(){
        $categories = Category::all();
        return view('admin.Product.addProduct', compact('categories'));
    }
    public function storeProduct(Request $request){
        $request->validate([
            'product_name' => 'required|string|max:150',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'qty' => 'required|integer',
            'category_id' => 'required|integer',
            'type' => 'required|string|max:255',
            'stone_type' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'material' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'finish_quality' => 'required|string|max:255',
            'images' => 'required|array|max:4', // Giới hạn số lượng ảnh tối đa là 4
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = new Product();
        $product->fill($request->only([
            'product_name',
            'price',
            'description',
            'qty',
            'category_id',
            'type',
            'stone_type',
            'color',
            'material',
            'gender',
            'finish_quality'
        ]));

        // Tạo slug từ tên sản phẩm
        $product->slug = Str::slug($request->product_name . '-' . Str::random(6));

        // Tạo product_code ngẫu nhiên và đảm bảo không trùng lặp
        do {
            $product_code = 'ADARA_' . rand(100000, 999999);
        } while (Product::where('product_code', $product_code)->exists());
        $product->product_code = $product_code;

        $product->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Đặt tên ảnh duy nhất
                $imageName = time() . '_' . uniqid() . '.' . $image->extension();
                // Di chuyển ảnh vào thư mục public/images
                $image->move(public_path('images/product/'), $imageName);

                // Lưu thông tin ảnh mới vào bảng product_images
                $product->images()->create([
                    'image_path' => 'images/product/' . $imageName,
                ]);
            }
        }
        Session::flash('successMessage', 'Product added successfully!');
        return redirect()->route('admin.products')->with('success', 'Product added successfully.');
    }
    public function editProduct($id){
        $product = Product::with('images')->findOrFail($id);
        $categories = Category::all();
        return view('admin.Product.editProduct', compact('product', 'categories'));
    }

    public function updateProduct(Request $request, $id){
        $request->validate([
            'product_name' => 'required|string|max:150',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'qty' => 'required|integer',
            'category_id' => 'required|integer',
            'type' => 'required|string|max:255',
            'stone_type' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'material' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'finish_quality' => 'required|string|max:255',
            'images' => 'array|max:4', // Giới hạn số lượng ảnh tối đa là 4
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $product->fill($request->only([
            'product_name',
            'price',
            'description',
            'qty',
            'category_id',
            'type',
            'stone_type',
            'color',
            'material',
            'gender',
            'finish_quality'
        ]));

        // Tạo slug từ tên sản phẩm
        $product->slug = Str::slug($request->product_name . '-' . Str::random(6));

        $product->save();

        if ($request->hasFile('images')) {
            // Xóa ảnh cũ
            foreach ($product->images as $image) {
                Storage::delete(public_path($image->image_path));
                $image->delete();
            }

            // Lưu ảnh mới
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->extension();
                $image->move(public_path('images'), $imageName);

                $product->images()->create([
                    'image_path' => 'images/' . $imageName,
                ]);
            }
        }

        Session::flash('successMessage', 'Product updated successfully!');
        return redirect()->route('admin.products')->with('success', 'Product updated successfully.');
    }
    public function deleteProduct($id)
    {
        $product = Product::with('images')->findOrFail($id);

        // Xóa ảnh trong thư mục public/images
        foreach ($product->images as $image) {
            Storage::delete(public_path($image->image_path));
            $image->delete();
        }

        // Xóa sản phẩm
        $product->delete();

        // Sử dụng Session::flash để lưu thông báo
        Session::flash('successMessage', 'Product deleted successfully!');

        return redirect()->route('admin.products')->with('success', 'Product deleted successfully.');
    }
}
