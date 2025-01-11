<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class blogController extends Controller
{
    public function blogs()
    {
        $blogs = Blog::paginate(10);
        return view('admin.Blog.blog',compact('blogs'));
    }

    public function addBlog()
    {
        return view('admin.Blog.addBlog');
    }

    public function storeBlog(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|string',
            'tag' => 'nullable|string', // Thêm xác thực cho thuộc tính 'tag'
        ]);

        $data = $request->only(['title', 'content', 'tag']);

        if ($request->hasFile('thumbnail')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('images/blog/'), $imageName);
            $data['thumbnail'] = 'images/blog/' . $imageName;
        }

        Blog::create($data);
        Session::flash('successMessage', 'Blog added successfully!');
        return redirect()->route('admin.blogs')->with('success', 'Blog added successfully.');
    }
    public function editBlog($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.Blog.editBlog', compact('blog'));
    }

    public function updateBlog(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|string',
            'tag' => 'nullable|string',
        ]);

        $blog = Blog::findOrFail($id);
        $data = $request->only(['title', 'content', 'tag']);

        if ($request->hasFile('thumbnail')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('images/blog/'), $imageName);
            $data['thumbnail'] = 'images/blog/' . $imageName;
        }

        $blog->update($data);
        Session::flash('successMessage', 'Blog updated successfully!');
        return redirect()->route('admin.blogs')->with('success', 'Blog updated successfully.');
    }
    public function deleteBlog($id)
    {
        $blog = Blog::findOrFail($id);

        // Xóa ảnh trong thư mục public/images nếu có
        if ($blog->thumbnail) {
            unlink(public_path($blog->thumbnail));
        }

        // Xóa category
        $blog->delete();

        // Sử dụng Session::flash để lưu thông báo
        Session::flash('successMessage', 'Blog deleted successfully!');

        return redirect()->route('admin.blogs')->with('success', 'Blog deleted successfully.');
    }
}
