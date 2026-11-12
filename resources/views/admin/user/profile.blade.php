<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  @extends('admin.layouts.app')

    @section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Profile Admin</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="row">
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="m-t-30"> 
                            <img src="{{ asset('admin/images/users/5.jpg') }}" class="rounded-circle" width="150" height="150" style="object-fit: cover;" />
                            
                            <h4 class="card-title m-t-10">{{ Auth::user()->name }}</h4>
                            
                            <h6 class="card-subtitle">Administrator</h6>
                        </center>
                    </div>
                    <div>
                        <hr> 
                    </div>
                    <div class="card-body"> 
                        <small class="text-muted">Email address </small>
                        <h6>{{ Auth::user()->email }}</h6> 

                        <small class="text-muted p-t-30 db">Phone</small>
                        <h6>{{ Auth::user()->phone ?? 'Chưa cập nhật' }}</h6> 

                        <small class="text-muted p-t-30 db">Address</small>
                        <h6>{{ Auth::user()->address ?? 'Chưa cập nhật' }}</h6>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="col-md-12">Full Name</label>
                                <div class="col-md-12">
                                    <input type="text" name="name" value="{{ Auth::user()->name }}" placeholder="Nhập họ và tên..." class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control form-control-line" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Password</label>
                                <div class="col-md-12">
                                    <input type="password" name="password" placeholder="Nhập mật khẩu mới nếu muốn đổi..." class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Phone No</label>
                                <div class="col-md-12">
                                    <input type="text" name="phone" value="{{ Auth::user()->phone }}" placeholder="Ví dụ: 0912345678" class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Address</label>
                                <div class="col-md-12">
                                    <input type="text" name="address" value="{{ Auth::user()->address }}" placeholder="Ví dụ: Đà Nẵng, Việt Nam" class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12">Select Country</label>
                                <div class="col-sm-12">
                                    <select class="form-control form-control-line" name="id_country">
                                        <option value="">-- Chọn quốc gia --</option>
                                        <option value="1">Việt Nam</option>
                                        <option value="2">Mỹ (USA)</option>
                                        <option value="3">Nhật Bản</option>
                                        <option value="4">Hàn Quốc</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-12">Avatar</label>
                                <div class="col-md-12">
                                    <input type="file" name="avatar" class="form-control form-control-line" accept="image/*">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endsection
</body>
</html>