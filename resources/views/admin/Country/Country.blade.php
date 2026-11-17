@extends('admin.layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Quản lý Country</h4>
        </div>
        <div class="col-7 align-self-center text-right">
            <a href="{{ route('admin.country.create') }}" class="btn btn-success text-white">Add Country</a>
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
                    <h4 class="card-title">Danh sách Country</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th ># ID</th>
                                <th >Name</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($countries as $country)
                                <tr>
                                    <td>{{ $country->id }}</td>
                                    <td>{{ $country->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.country.delete', $country->id) }}" 
                                           onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" 
                                           class="btn btn-sm btn-secondary text-white">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Chưa có quốc gia nào. Hãy bấm "Add Country" để thêm.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection