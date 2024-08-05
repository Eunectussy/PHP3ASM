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
        @error('nameProduct')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Giá</label>
        <input type="text" class="form-control" name="priceProduct" id="">
        @error('priceProduct')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="desc" rows="3"></textarea>
        @error('desc')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Danh mục</label>
        <select name="categoryProduct" class="form-select" id="">
            @foreach ($cate as $value)
                <option value="{{ $value->id }}">{{ $value->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Ảnh sản phẩm</label>
        <input type="file" class="form-control" name="imageProduct" id="imageProduct" accept="image/*">
    </div>


    <button class="btn btn-success">Thêm mới</button>
</form>

@endsection
@push('script')

@endpush
