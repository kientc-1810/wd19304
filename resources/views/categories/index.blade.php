@extends('layouts.app')

@section('title','Danh sách danh mục')
@section('content')
    <div class="container">
        <h2>Danh sách danh mục</h2>
        <a href="" class="btn btn-primary">Thêm danh mục</a>
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
                    <td>{{$cate->status}}</td>
                    <td>
                        <a href="" class="btn btn-warning">Sửa</a>
                        <button class="btn btn-danger">Xóa</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection