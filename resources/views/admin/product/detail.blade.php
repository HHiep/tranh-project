@extends('admin.layouts.indext')
@section('main_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="panel-heading">Thông tin chi tiết</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Số thứ tự</th>
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Tác giả</th>
                                        <th>Danh mục</th>
                                        <th>Giá gốc</th>
                                        <th>Giá khuyến mãi</th>
                                        <th>tổng sản phẩm</th>
                                        <th> <a class="btn badge badge-gradient-success"
                                                href="{{ route('admin.product.getproductList') }}">Back</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $products->id }}</td>
                                        <td>
                                            <img src="{{ asset($products->picture) }}" alt="">
                                        </td>
                                        <td>{{ $products->name }}</td>
                                        <td>{{ $products->author }}</td>
                                        <td>{{ $products->category_id }}</td>
                                        <td>{{ $products->original_price }}</td>
                                        <td>{{ $products->promotional_price }}</td>
                                        <td>{{ $products->amount }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="panel-heading">Ảnh chi tiết</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Hình ảnh chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="{{ asset($products->picture_detail) }}" alt="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
