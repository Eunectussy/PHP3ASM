@extends('user.layouts.index')
@section('title')
    @parent
    trang chủ
@endsection
@push('style')
@endpush
@section('content')
    <div class="container">
        <div class="mb-n10 mb-lg-n20 z-index-2">
            <div class="container mb-10">
                <div class="text-center mb-17">
                    <h3 class="fs-2hx text-gray-900 mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">
                        Sản phẩm mới</h3>
                </div>
                <div class="mb-5">
                    <input type="text" class="form-control" placeholder="Search" id="search-product">
                    <div id="result">

                    </div>
                </div>

                <div class="row">
                    @foreach ($products as $key => $value)
                        <a href="{{route('clientDetailProduct', $value->id)}}" class="col-3">
                            <img src="/{{ $value->image }}" class="mh-125px mb-9" alt="" />
                            <div class="d-flex flex-center mb-5">
                                <div class="fs-5 fs-lg-3 fw-bold text-gray-900">{{ $value->name }}</div>
                            </div>
                            <div class="fw-semibold fs-6 fs-lg-4 text-muted">
                                {{ $value->description }}
                            </div>

                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush
