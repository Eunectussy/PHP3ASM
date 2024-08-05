@extends('admin.layouts.index')
@section('title')
    @parent
    Chi tiết sản phẩm
@endsection
@push('style')

@endpush
@section('content')

    
    <div class="mb-3">
        <label for="" class="form-label">Tên danh mục: {{$category->name}}</label>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Id: {{$category->id}}</label>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Số lượng sản phẩm: {{$productCount}}</label>
    </div>
    <a href="{{route('admin.category.listCategory')}}" class="btn btn-success">Danh sách</a>

@endsection
@push('script')

@endpush
