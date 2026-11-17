@extends('admin.layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Create Blog</h4>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <h4 class="card-title">Thêm bài viết mới</h4>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal m-t-30">
                    @csrf
                    
                    <div class="form-group">
                        <label>Title (*)</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" id="content" class="form-control" rows="5">{{ old('content') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success text-white">Create Blog</button>
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
