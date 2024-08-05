@extends('admin.layouts.index')
@section('title')
    @parent
    Chỉnh sửa sản phẩm
@endsection
@push('style')

@endpush
@section('content')

    
<form action="{{route('admin.user.updatePatchUsers', $users->id)}}" method="post" >
    @method('patch')
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Tên</label>
        <input type="text" class="form-control" name="nameUser" id="" value="{{$users->name}}">
        @error('nameUser')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input type="text" class="form-control" name="emailUser" id="" value="{{$users->email}}">
        @error('emailUser')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Mật khẩu</label>
        <input type="text" class="form-control" name="password" id="" value="{{$users->password}}">
        @error('password')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Admin</label>
        <select name="role" class="form-select" id="">
            <option @if ($users->role == 1) 
                selected
                @endif value="1">Có</option>
            <option @if ($users->role == 0) 
                selected
                @endif value="0">Không</option>
        </select>
    </div>
    <button class="btn btn-success">Sửa</button>

</form>

@endsection
@push('script')

@endpush
