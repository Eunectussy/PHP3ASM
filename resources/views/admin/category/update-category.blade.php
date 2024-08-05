@extends('admin.layouts.index')
@section('title')
    @parent
    Chỉnh sửa sản phẩm
@endsection
@push('style')

@endpush
@section('content')

    
<form action="{{route('admin.category.updatePatchCategory', $category->id)}}" method="post" >
    @method('patch')
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Tên</label>
        <input type="text" class="form-control" name="nameCate" id="name" value="{{$category->name}}">
        @error('nameCate')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button class="btn btn-success">Sửa</button>
</form>

@endsection
@push('script')

@endpush
