@extends('admin.layouts.index')
@section('title')
    @parent
    Chỉnh sửa sản phẩm
@endsection
@push('style')

@endpush
@section('content')

    
<form action="{{route('admin.product.updatePatchProducts', $product->id)}}" method="post" enctype="multipart/form-data">
    @method('patch')
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Tên</label>
        <input type="text" class="form-control" name="nameProduct" id="" value="{{$product->name}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Giá</label>
        <input type="text" class="form-control" name="priceProduct" id="" value="{{$product->price}}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="desc" rows="3" value="">{{$product->description}}</textarea>
      </div>
    <div class="mb-3">
        <label for="" class="form-label">Ảnh sản phẩm</label>
        <img src="/{{$product->image}}" alt="Ảnh sản phẩm" style="width: 100px">
        <input type="file" class="form-control" name="imageProduct" id="imageProduct" accept="image/*">
    </div>

    <button class="btn btn-success">Sửa</button>
</form>

@endsection
@push('script')

@endpush
