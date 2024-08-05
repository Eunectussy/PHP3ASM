@extends('admin.layouts.index')
@section('title')
    @parent
    Danh sách sản phẩm
@endsection
@push('style')

@endpush
@section('content')

<div class="d-flex">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="col-xl-12 mb-5 mb-xl-10">
            <div class="card card-flush h-xl-100">
                <div class="card-header pt-5 w-100">
                    <div class="d-flex justify-content-between mb-10 w-100">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">
                                Quản lý danh mục
                            </span>
                        </h3>
                        <a href="{{ route('admin.category.addCategory')}}" class="btn btn-sm fw-bold btn-primary">Thêm danh mục</a>
                    </div>
                </div>

                <div class="card-body pt-2">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_stats_widget_16_tab_1">
                            <div class="table-responsive">
                                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                    <thead>
                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                            <th class="p-0 pb-3 min-w-100px text-center">
                                                Stt
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px text-center">
                                                Tên
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px text-center pe-13">
                                                Id
                                            </th>
                                            <th class="p-0 pb-3 w-100px text-center">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($cate as $key => $item)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->id }}</td>
                                            <td>
                                                <a href="{{route('admin.category.deleteCategory', $item->id)}}" class="btn btn-danger">Xóa</a>
                                                <a href="{{route('admin.category.updateCategory', $item->id)}}" class="btn btn-primary">Sửa</a>
                                                <a href="{{route('admin.category.detailCategory', $item->id)}}" class="btn btn-secondary">Chi tiết</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{ $cate->links('pagination::bootstrap-5') }}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('script')

@endpush
