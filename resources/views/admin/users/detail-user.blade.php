@extends('admin.layouts.index')
@section('title')
    @parent
    Chi tiết sản phẩm
@endsection
@push('style')

@endpush
@section('content')

    
    <div class="mb-3">
        <label for="" class="form-label">Tên : {{$users->name}}</label>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Email: {{$users->email}}</label>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Mật khẩu: {{$users->password}}</label>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Admin: 
            @if ( $users->role == 1 )
                Có
                @else
                Không
            @endif
        </label>
    </div>
    <a href="{{route('admin.user.listUsers')}}" class="btn btn-success">Danh sách</a>

@endsection
@push('script')

@endpush
