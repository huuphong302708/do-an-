@extends('admin.layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Edit Blog</h4>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <h4 class="card-title">Chỉnh sửa bài viết #{{ $blog->id }}</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal m-t-30">
                    @csrf
        
                    <div class="form-group">
                        <label>Title (*)</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title) }}">
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                        @if($blog->image)
                            <div class="mt-2">
                                <img src="{{ asset('upload/blog/' . $blog->image) }}" width="100" class="d-block mb-1">
                                <small class="text-muted">Ảnh hiện tại: {{ $blog->image }}</small>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description', $blog->description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" id="content" class="form-control" rows="5">{{ old('content', $blog->content) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success text-white">Update Blog</button>
                    <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content', {
        filebrowserBrowseUrl: '{{ asset("ckfinder/ckfinder.html") }}',
        filebrowserImageBrowseUrl: '{{ asset("ckfinder/ckfinder.html?type=Images") }}',
        filebrowserFlashBrowseUrl: '{{ asset("ckfinder/ckfinder.html?type=Flash") }}',
        filebrowserUploadUrl: '{{ asset("ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files") }}',
        filebrowserImageUploadUrl: '{{ asset("ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images") }}',
        filebrowserFlashUploadUrl: '{{ asset("ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash") }}'
    });
</script>
@endsection
