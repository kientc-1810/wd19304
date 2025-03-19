@extends('layouts.app')

@if(session('succcess'))
    <div class="alert alert-success">
        {{ session('success')}}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error')}}
    </div>
@endif

@section('title','Danh sách danh mục')
@section('content')
    <div class="container">
        <h2>Danh sách danh mục</h2>
        <a href="{{route('categories.create')}}" class="btn btn-primary">Thêm danh mục</a>
        <form method="get" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm danh mục ..."
                value="{{request('search')}}">
                <button type="submit" class="btn btn-outline-secondary">Tìm kiếm</button>
            </div>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $cate)
                <tr>
                    <td>{{$cate->id}}</td>
                    <td>{{$cate->name}}</td>
                    <td>{{$cate->status ? "Hành động":"Tạm dừng"}}</td>
                    <td>
                        <a href="" class="btn btn-warning">Sửa</a>
                        <button class="btn btn-danger">Xóa</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories -> links() }}
@endsection