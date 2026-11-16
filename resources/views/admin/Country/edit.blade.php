@extends('admin.layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Edit Country</h4>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <h4 class="card-title">Chỉnh sửa quốc gia #{{ $country->id }}</h4>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.country.update', $country->id) }}" method="POST" class="form-horizontal m-t-30">
                    @csrf
                    <div class="form-group">
                        <label>Tên Quốc Gia (*)</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $country->name) }}">
                    </div>

                    <button type="submit" class="btn btn-success text-white">Update Country</button>
                    <a href="{{ route('admin.country.index') }}" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection