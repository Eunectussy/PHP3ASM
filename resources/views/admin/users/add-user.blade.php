@extends('admin.layouts.index')
@section('title')
    @parent
    Danh sách sản phẩm
@endsection
@push('style')

@endpush
@section('content')

    
<form action="{{route('admin.user.addPostUsers')}}" method="POST" >
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Tên</label>
        <input type="text" class="form-control" name="nameUser" id="">
        @error('nameUser')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input type="text" class="form-control" name="emailUser" id="">
        @error('emailUser')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Mật khẩu</label>
        <input type="text" class="form-control" name="password" id="">
        @error('password')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button class="btn btn-success">Thêm mới</button>
</form>

@endsection
@push('script')

@endpush
