@extends('user.layouts.index')
@section('title')
    @parent
    {{ $categoryId->id }}
@endsection
@push('style')
@endpush
@section('content')
    <div class="container">
            <div class="container mb-10">
                <div class="text-center mb-17">
                    <h3 class="fs-2hx text-gray-900 mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">
                        Danh mục sản phẩm {{ $categoryId->name }}</h3>
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
@endsection
@push('script')
@endpush
