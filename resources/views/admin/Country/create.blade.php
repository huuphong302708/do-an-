@extends('admin.layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Add Country</h4>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <h4 class="card-title">Thêm mới quốc gia</h4>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.country.store') }}" method="POST" class="form-horizontal m-t-30">
                    @csrf
                    <div class="form-group">
                        <label>Tên Quốc Gia (*)</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên quốc gia (ví dụ: Việt Nam)" value="{{ old('name') }}">
                    </div>

                    <button type="submit" class="btn btn-success text-white">Create Country</button>
                    <a href="{{ route('admin.country.index') }}" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection