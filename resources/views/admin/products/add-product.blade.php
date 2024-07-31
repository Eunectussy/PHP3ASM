@extends('admin.layouts.index')
@section('title')
    @parent
    Danh sách sản phẩm
@endsection
@push('style')

@endpush
@section('content')

    
<form action="{{route('admin.product.addPostProducts')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Tên</label>
        <input type="text" class="form-control" name="nameProduct" id="">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Giá</label>
        <input type="text" class="form-control" name="priceProduct" id="">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Ảnh sản phẩm</label>
        <input type="file" class="form-image" name="imageProduct" id="imageProduct" accept="image/*">
    </div>

    <button class="btn btn-success">Thêm mới</button>
</form>

@endsection
@push('script')

@endpush
