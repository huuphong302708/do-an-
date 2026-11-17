<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(3);
        return view('admin.blog.blog', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/blog'), $fileName);
            $data['image'] = $fileName;
        } else {
            $data['image'] = null;
        }

        Blog::create($data);

        return redirect()->route('admin.blog.index')->with('success', 'Thêm blog thành công!');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề',
        ]);

        $blog = Blog::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($blog->image && file_exists(public_path('upload/blog/' . $blog->image))) {
                unlink(public_path('upload/blog/' . $blog->image));
            }

            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/blog'), $fileName);
            $data['image'] = $fileName;
        } else {
            $data['image'] = $blog->image;
        }

        $blog->update($data);

        return redirect()->route('admin.blog.index')->with('success', 'Cập nhật blog thành công!');
    }

    public function delete($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->image && file_exists(public_path('upload/blog/' . $blog->image))) {
            unlink(public_path('upload/blog/' . $blog->image));
        }

        $blog->delete();

        return redirect()->route('admin.blog.index')->with('success', 'Xóa blog thành công!');
    }
}
