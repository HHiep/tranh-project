@extends('admin.layouts.indext')
@section('main_content')
    <div id="alert">
        @if (!empty($messageNotify))
            <div class="col-8">
                <div class="ma">
                    <strong>Chúc Mừng!</strong>{{ $messageNotify }}
                </div>
            </div>
        @endif
    </div>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.product.getproductList') }}" method="GET">
                            <div class="col-12">
                                <label class="form-label">Tìm kiếm </label>
                                <input type="text" name="name" value="{{ $name }} " class=form-control
                                    placeholder="Nhập dữ liệu ">
                            </div>
                            <button class="  btn-gradient-primary" type="submit">Hoàn thành</button>
                        </form>
                        <br>
                        <div class="col-12">
                            <div class="panel-heading">
                                <H2>Danh mục sản phẩm</H2>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th>Số thứ tự</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Tên tác giả</th>
                                            <th>Danh mục</th>
                                            <th>Giá gốc</th>
                                            <th>Giá khuyến mãi</th>
                                            <th>Tổng sản phẩm</th>
                                            <th><a class="btn badge badge-gradient-success"
                                                    href="{{ route('admin.product.getadd') }}">Add</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $index => $product)
                                            @php
                                                $param = [
                                                    'id' => $product->id,
                                                ];
                                            @endphp
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    <img src="{{ asset($product->picture) }}" alt="">
                                                </td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->author }}</td>
                                                <td>{{ $product->categories_name }}</td>
                                                <td>{{ $product->original_price }}</td>
                                                <td>{{ $product->promotional_price }}</td>
                                                <td>{{ $product->amount }}</td>
                                                <td>
                                                    <a class="btn badge badge-gradient-info"
                                                        href="{{ route('admin.product.getdetail', $param) }}">Detail</a>
                                                    <a class="btn  badge badge-primary"
                                                        href="{{ route('admin.product.getupdate', $param) }}">Update</a>
                                                    <br>
                                                    <button class="btn badge badge-gradient-danger event-delete"
                                                        data-id={{ $product->id }}>Deleted</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <a class="btn badge badge-gradient-warning"
                                    href="{{ route('admin.product.getrycle') }}">Rycle</a>
                                <div class="ma1">
                                    {{ $products->links('admin.component.pagination') }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".event-delete").click(function() {
                if (confirm("Bạn thật sự muốn xóa?") == true) {
                    var id = $(this).data('id');
                    window.location.href = '/admin/product/deleted?id=' + id;
                }
            });
            $("#alert").toggle(2000);
        })
    </script>
@endsection
