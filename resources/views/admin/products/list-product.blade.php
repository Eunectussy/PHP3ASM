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
                                Quản lý sản phẩm
                            </span>
                        </h3>
                        <a href="{{ route('admin.product.addProducts')}}" class="btn btn-sm fw-bold btn-primary">Thêm sản phẩm</a>
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
                                                Giá
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px text-center pe-7">
                                                Danh mục
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px text-center pe-7">
                                                Ảnh
                                            </th>
                                            <th class="p-0 pb-3 w-100px text-center">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($products as $key => $item)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->catename }}</td>
                                            <td><img src="{{ asset($item->image) }}" width="200px"></td>
                                            <td>
                                                {{-- <button type="button" class="btn btn-warning btn-delete" data-bs-id="{{ $item->id }}"
                                                data-bs-toggle="modal" data-bs-target="#deleteModel">Xóa</button> --}}
                                                <a href="{{route('admin.product.deleteProducts', $item->id)}}" class="btn btn-danger">Xóa</a>
                                                <a href="{{route('admin.product.updateProducts', $item->id)}}" class="btn btn-primary">Sửa</a>
                                                <a href="{{route('admin.product.detailProducts', $item->id)}}" class="btn btn-secondary">Chi tiết</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{ $products->links('pagination::bootstrap-5') }}
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
      <!-- Modal -->
      {{-- <div class="modal fade" id="deleteModel" tabindex="-1" aria-labelledby="deleteModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModelLabel">Cảnh báo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                    <div class="modal-body">
                        Bạn có muốn xóa không?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <form action="" method="post" id="formDelete">
                            @method('delete')
                        <button type="submit" class="btn btn-primary">Xác nhận xóa</button>
                    </form>
                    </div>

            </div>
        </div>
    </div>
 --}}

@endsection
@push('script')
{{-- <script>
    var exampleModal = document.getElementById('formDelete')
exampleModal.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget
  var recipent = button.getAttribute('data-bs-id')
  let formDelete = document.querySelector('#formDelete')
  formDelete.setAttribute('action', '{{route("admin.product.deleteProducts")}}?id=' +recipent)
})
</script> --}}
@endpush
