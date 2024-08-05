@extends('admin.layouts.index')
@section('title')
    @parent
    Danh sách sản phẩm
@endsection
@push('style')

@endpush
@section('content')

    
<form action="{{route('admin.category.addPostCategory')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Tên</label>
        <input type="text" class="form-control" name="nameCate" id="">
        @error('nameCate')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <button class="btn btn-success">Thêm mới</button>
</form>

@endsection
@push('script')

@endpush
