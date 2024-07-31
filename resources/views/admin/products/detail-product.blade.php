@extends('admin.layouts.index')
@section('title')
    @parent
    Chi tiết sản phẩm
@endsection
@push('style')

@endpush
@section('content')

    
    <div class="mb-3">
        <label for="" class="form-label">Tên sản phẩm: {{$product->name}}</label>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Giá sản phẩm: {{$product->price}}</label>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Ảnh sản phẩm: </label>
        <img src="{{ asset($product->image) }}" alt="" width="200px">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Mô tả sản phẩm: {{$product->description}}</label>
    </div>
    <a href="{{route('admin.product.listProducts')}}" class="btn btn-success">Danh sách</a>

@endsection
@push('script')

@endpush
