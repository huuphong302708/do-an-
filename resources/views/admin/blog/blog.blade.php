@extends('admin.layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 align-self-center">
            <h4 class="page-title">Quản lý Blog</h4>
        </div>
    </div>
</div>

<div class="container-fluid">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách Blog</h4>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th># ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->id }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->description }}</td>
                                    <td>
                                        @if($blog->image)
                                            <img src="{{ asset('upload/blog/' . $blog->image) }}" alt="Blog Image" width="70" class="d-block mb-1">
                                            <small class="text-muted">{{ $blog->image }}</small>
                                        @else
                                            <span class="text-muted">Chưa có ảnh</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-sm btn-secondary text-white">Edit</a>
                                        <a href="{{ route('admin.blog.delete', $blog->id) }}" 
                                           onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" 
                                           class="btn btn-sm btn-secondary text-white">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Chưa có bài viết blog nào.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <a href="{{ route('admin.blog.create') }}" class="btn btn-success text-white">Add Blog</a>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            {{ $blogs->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
